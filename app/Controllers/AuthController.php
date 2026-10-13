<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function signup()
    {
        return view('auth/signup');
    }

    public function register()
    {
        $reglas = [
            'name'     => 'required|min_length[3]|max_length[100]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'repeat'   => 'required|matches[password]',
        ];

        if (! $this->validate($reglas)) {
            return redirect()->back()->withInput()
                ->with('error', implode(' ', $this->validator->getErrors()));
        }

        $userModel = new UserModel();
        $esPrimero = $userModel->countAllResults() == 0;

        $userModel->insert([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'active'   => 1,
            'is_admin' => $esPrimero ? 1 : 0,
        ]);

        return redirect()->to('/login')->with('success', 'Registro exitoso. Ya puedes iniciar sesión.');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function attempt()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (! $user || ! password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Correo o contraseña incorrectos.');
        }

        if ($user['active'] != 1) {
            return redirect()->back()->withInput()->with('error', 'Tu cuenta no está activa.');
        }

        session()->set([
            'user_id'  => $user['id'],
            'name'     => $user['name'],
            'is_admin' => $user['is_admin'],
        ]);

        return redirect()->to('/tasks')->with('success', 'Inicio de sesión exitoso.');
    }

    public function logout()
    {
        session()->remove(['user_id', 'name', 'is_admin']);

        return redirect()->to('/login')->with('success', 'Sesión finalizada con éxito.');
    }
}