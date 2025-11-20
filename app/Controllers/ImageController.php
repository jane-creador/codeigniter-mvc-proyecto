<?php

namespace App\Controllers;

class ImageController extends BaseController
{
    public function upload()
    {
        if ($this->request->getMethod() === 'get') {
            return view('images/upload');
        }

        $file = $this->request->getFile('file');

        if ($file && $file->isValid()) {
            $file->move(WRITEPATH . '../public/uploads');

            return redirect()->to('/images')->with('message', 'Imagen subida correctamente.');
        }

        return redirect()->back()->with('error', 'No se seleccionó ningún archivo.');
    }

    public function list()
    {
        helper('filesystem');

        $files = directory_map(FCPATH . 'uploads', 1);

        return view('images/list', ['files' => $files]);
    }

    public function delete($filename)
    {
        $path = FCPATH . 'uploads/' . $filename;

        if (is_file($path)) {
            unlink($path);
            return redirect()->to('/images')->with('message', 'Imagen eliminada correctamente.');
        }

        return redirect()->to('/images')->with('error', 'El archivo no existe.');
    }
}
