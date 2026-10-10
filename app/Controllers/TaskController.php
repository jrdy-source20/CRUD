<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data = [
            'tasks' => $taskModel->orderBy('created_at', 'DESC')->findAll(),
        ];

        return view('tasks/index', $data);
    }

    public function new()
    {
        return view('tasks/new');
    }

    public function create()
    {
        $reglas = [
            'description' => 'required|min_length[3]|max_length[255]',
        ];

        if (! $this->validate($reglas)) {
            return redirect()->back()->withInput()
                ->with('error', 'La descripción es obligatoria (mínimo 3 caracteres).');
        }

        $taskModel = new TaskModel();
        $taskModel->insert([
            'description' => $this->request->getPost('description'),
            'user_id'     => session()->get('user_id') ?? 1,
        ]);

        return redirect()->to('/tasks')->with('success', 'Tarea creada correctamente.');
    }
}