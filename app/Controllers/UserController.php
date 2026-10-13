<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    private function noAdmin()
    {
        return session()->get('is_admin')
            ? null
            : redirect()->to('/')->with('error', 'Sin permiso de administrador');
    }

    public function index()
    {
        if ($r = $this->noAdmin()) return $r;

        $model = new UserModel();

        return view('users/index', [
            'users' => $model->orderBy('created_at', 'DESC')->paginate(5),
            'pager' => $model->pager
        ]);
    }

    public function show(int $id)
    {
        if ($r = $this->noAdmin()) return $r;

        $user = (new UserModel())->find($id);

        if (!$user) return redirect()->to('/users')->with('error', 'Usuario no encontrado.');

        return view('users/show', ['user' => $user]);
    }

    public function new()
    {
        if ($r = $this->noAdmin()) return $r;

        return view('users/new');
    }

    public function create()
    {
        if ($r = $this->noAdmin()) return $r;

        $reglas = [
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'repeat' => 'required|matches[password]'
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()
                ->with('error', implode(' ', $this->validator->getErrors()));
        }

        (new UserModel())->insert([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'active' => 1,
            'is_admin' => 0
        ]);

        return redirect()->to('/users')->with('success', 'Usuario creado.');
    }

    public function edit(int $id)
    {
        if ($r = $this->noAdmin()) return $r;

        $user = (new UserModel())->find($id);

        if (!$user) return redirect()->to('/users')->with('error', 'Usuario no encontrado.');

        return view('users/edit', ['user' => $user]);
    }

    public function update(int $id)
    {
        if ($r = $this->noAdmin()) return $r;

        $model = new UserModel();

        if (!$model->find($id)) {
            return redirect()->to('/users')->with('error', 'Usuario no encontrado.');
        }

        $reglas = [
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => "required|valid_email|is_unique[users.email,id,$id]",
            'password' => 'permit_empty|min_length[6]',
            'repeat' => 'matches[password]'
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()
                ->with('error', implode(' ', $this->validator->getErrors()));
        }

        $datos = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'active' => $this->request->getPost('active') ? 1 : 0,
            'is_admin' => $this->request->getPost('is_admin') ? 1 : 0
        ];

        if ($this->request->getPost('password')) {
            $datos['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $model->update($id, $datos);

        return redirect()->to('/users')->with('success', 'Usuario actualizado.');
    }

    public function delete(int $id)
    {
        if ($r = $this->noAdmin()) return $r;

        if ($id == session()->get('user_id')) {
            return redirect()->to('/users')->with('error', 'No puedes eliminarte a ti mismo.');
        }

        (new UserModel())->delete($id);

        return redirect()->to('/users')->with('success', 'Usuario eliminado.');
    }
}