<?php

namespace App\Controllers;

class ImageController extends BaseController
{
    public function upload()
    {
        $uploadPath = rtrim(FCPATH, '/\\') . '/uploads';

        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        if ($this->request->getMethod() === 'get') {
            return view('images/upload');
        }

        $file = $this->request->getFile('file');

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move($uploadPath, $fileName);

            return redirect()->to('/images')
                             ->with('message', 'Imagen subida correctamente.');
        }

        // Sin mensaje de error
        return redirect()->back();
    }

    public function list()
    {
        $uploadPath = rtrim(FCPATH, '/\\') . '/uploads';

        $files = [];

        if (is_dir($uploadPath)) {
            $files = array_values(array_filter(scandir($uploadPath), static function ($file) use ($uploadPath) {
                $path = $uploadPath . '/' . $file;

                return is_file($path);
            }));
        }

        return view('images/list', ['files' => $files]);
    }

    public function delete($filename)
    {
        $uploadPath = rtrim(FCPATH, '/\\') . '/uploads';
        $safeFilename = basename($filename);
        $path = $uploadPath . '/' . $safeFilename;

        if (is_file($path)) {
            unlink($path);
            return redirect()->to('/images')->with('message', 'Imagen eliminada correctamente.');
        }

        return redirect()->to('/images')->with('error', 'El archivo no existe.');
    }
}
