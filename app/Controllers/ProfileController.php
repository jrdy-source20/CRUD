<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    private function usuario()
    {
        $id = session()->get('user_id');
        return $id ? (new UserModel())->find($id) : null;
    }

    public function index()
    {
        $user = $this->usuario();
        if (! $user) return redirect()->to('/login');

        return view('profile/index', ['user' => $user]);
    }

    public function confirm()
    {
        if (! $this->usuario()) return redirect()->to('/login');

        return view('profile/confirm');
    }

    public function checkPassword()
    {
        $user = $this->usuario();
        if (! $user) return redirect()->to('/login');

        if (! password_verify($this->request->getPost('password'), $user['password'])) {
            return redirect()->back()->with('error', 'Contraseña incorrecta.');
        }

        session()->set('profile_ok', true);

        return redirect()->to('/profile/edit');
    }

    public function edit()
    {
        $user = $this->usuario();
        if (! $user) return redirect()->to('/login');
        if (! session()->get('profile_ok')) return redirect()->to('/profile/confirm');

        return view('profile/edit', ['user' => $user]);
    }

    public function update()
    {
        $user = $this->usuario();
        if (! $user) return redirect()->to('/login');
        if (! session()->get('profile_ok')) return redirect()->to('/profile/confirm');

        $id = $user['id'];

        $reglas = [
            'name'  => 'required|min_length[3]|max_length[100]',
            'email' => "required|valid_email|is_unique[users.email,id,$id]",
        ];

        if (! $this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
        }

        $nombre = $this->request->getPost('name');

        (new UserModel())->update($id, [
            'name'  => $nombre,
            'email' => $this->request->getPost('email'),
        ]);

        session()->set('name', $nombre);
        session()->remove('profile_ok');

        return redirect()->to('/profile')->with('success', 'Perfil actualizado.');
    }

    public function password()
    {
        if (! $this->usuario()) return redirect()->to('/login');

        return view('profile/password');
    }

    public function updatePassword()
    {
        $user = $this->usuario();
        if (! $user) return redirect()->to('/login');

        $reglas = [
            'current'  => 'required',
            'password' => 'required|min_length[6]',
            'repeat'   => 'required|matches[password]',
        ];

        if (! $this->validate($reglas)) {
            return redirect()->back()->with('error', implode(' ', $this->validator->getErrors()));
        }

        if (! password_verify($this->request->getPost('current'), $user['password'])) {
            return redirect()->back()->with('error', 'La contraseña actual es incorrecta.');
        }

        (new UserModel())->update($user['id'], [
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/profile')->with('success', 'Contraseña actualizada.');
    }

    public function image()
    {
        if (! $this->usuario()) return redirect()->to('/login');

        return view('profile/image');
    }

    public function saveImage()
    {
        $user = $this->usuario();
        if (! $user) return redirect()->to('/login');

        $reglas = [
            'profile_image' => 'uploaded[profile_image]|is_image[profile_image]|max_size[profile_image,2048]',
        ];

        if (! $this->validate($reglas)) {
            return redirect()->back()->with('error', 'Elige una imagen válida de máximo 2 MB.');
        }

        $archivo = $this->request->getFile('profile_image');
        $nombre  = $archivo->getRandomName();
        $directorio = FCPATH . 'uploads/profiles';
        if (! is_dir($directorio) && ! mkdir($directorio, 0755, true) && ! is_dir($directorio)) {
            return redirect()->back()->with('error', 'No se pudo guardar la imagen.');
        }

        if (! $archivo->move($directorio, $nombre)) {
            return redirect()->back()->with('error', 'No se pudo guardar la imagen.');
        }

        if ($user['profile_image']) {
            @unlink(FCPATH . 'uploads/profiles/' . $user['profile_image']);
        }

        (new UserModel())->update($user['id'], ['profile_image' => $nombre]);

        return redirect()->to('/profile')->with('success', 'Imagen actualizada.');
    }

    public function confirmDelete()
    {
        if (! $this->usuario()) return redirect()->to('/login');

        return view('profile/delete_image');
    }

    public function deleteImage()
    {
        $user = $this->usuario();
        if (! $user) return redirect()->to('/login');

        if ($user['profile_image']) {
            @unlink(FCPATH . 'uploads/profiles/' . $user['profile_image']);
        }

        (new UserModel())->update($user['id'], ['profile_image' => null]);

        return redirect()->to('/profile')->with('success', 'Imagen eliminada.');
    }
}