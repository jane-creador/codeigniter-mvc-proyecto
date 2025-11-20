<?php
namespace App\Controllers;

use App\Models\PublicationModel;

class Publication extends BaseController
{
    public function index()
    {
        $m = new PublicationModel();
        $data['posts'] = $m->orderBy('id','DESC')->findAll();
        return view('Publication/all', $data);
    }

    public function add()
    {
        $m = new PublicationModel();
        if ($this->request->getMethod()==='post' && $this->validate(['content'=>'required'])) {
            $m->save([
                'user_id' => $this->request->getPost('user_id') ?: null,
                'content' => $this->request->getPost('content'),
            ]);
        }
        return redirect()->to('/publication');
    }
}
