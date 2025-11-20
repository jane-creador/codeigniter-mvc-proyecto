<?php
namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $m = new UserModel();
        $data['users'] = $m->orderBy('id','DESC')->findAll();
        return view('User/all', $data);
    }

    public function add()
    {
        $m = new UserModel();
        $m->insert([
            'name'     => $this->request->getPost('name'),
            'login'    => $this->request->getPost('login'),
            'password' => $this->request->getPost('password'),
        ]);
        return redirect()->to('/user');
    }

    public function edit($id)
    {
    $m = new \App\Models\UserModel();

    // Si vienen datos del form, actualiza
    if ($this->request->getPost('name') !== null && $this->request->getPost('login') !== null) {
        $m->update($id, [
            'name'     => $this->request->getPost('name'),
            'login'    => $this->request->getPost('login'),
            'password' => $this->request->getPost('password'),
        ]);
        return redirect()->to('/user');
    }

    // Si no, muestra el formulario
    $u = $m->find($id);
    if (!$u) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
    return view('User/edit', ['u' => $u]);
    }


    public function delete($id)
    {
        (new UserModel())->delete($id);
        return redirect()->to('/user');
    }
 
     public function login()
{
    $session = session();

    // Si el formulario fue enviado (POST)
    if ($this->request->getMethod() === 'post') {
        $login    = trim($this->request->getPost('login'));
        $password = $this->request->getPost('password'); // no lo usamos, pero puede quedarse

        // Versión más simple: si escribió algo en "login", lo damos por válido
        if ($login !== '') {
            // Guardar datos mínimos en la SESIÓN
            $session->set([
                'user_name' => $login,
                'isLoggedIn'=> true,
            ]);

            // Guardar una COOKIE sencilla con el login
            setcookie('remember_login', $login, time() + 60*60*24*7, "/");

            // Después de login, lo mandamos a PUBLICATION
            return redirect()->to('/publication');
        }

    
    }

    // GET normal o POST vacío → solo mostramos el login
    return view('User/login');
}



}
