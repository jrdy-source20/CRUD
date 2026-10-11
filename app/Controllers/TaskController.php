<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    private $tasks;

    public function __construct()
    {
        $this->tasks = new TaskModel();
    }

    private function requiereSesion()
    {
        return session()->get('user_id')
            ? null
            : redirect()->to('/login')->with('error', 'Debes iniciar sesión.');
    }

    private function buscarTarea(int $id)
    {
        $task = $this->tasks->find($id);

        if (!$task || (!session()->get('is_admin') && $task['user_id'] != session()->get('user_id'))) {
            return null;
        }

        return $task;
    }

    public function index()
    {
        if ($r = $this->requiereSesion()) return $r;

        $q = $this->request->getGet('q');

        if (!session()->get('is_admin')) {
            $this->tasks->where('user_id', session()->get('user_id'));
        }

        if ($q) $this->tasks->like('description', $q);

        return view('tasks/index', [
            'tasks' => $this->tasks->orderBy('created_at', 'DESC')->findAll(),
            'q' => $q
        ]);
    }

    public function new()
    {
        if ($r = $this->requiereSesion()) return $r;

        return view('tasks/new');
    }

    public function create()
    {
        if ($r = $this->requiereSesion()) return $r;

        if (!$this->validate(['description' => 'required|min_length[3]|max_length[255]'])) {
            return redirect()->back()->withInput()->with('error', 'La descripción debe tener más información.');
        }

        $this->tasks->insert([
            'description' => $this->request->getPost('description'),
            'user_id' => session()->get('user_id')
        ]);

        return redirect()->to('/tasks')->with('success', 'Tarea creada correctamente.');
    }

    public function edit(int $id)
    {
        if ($r = $this->requiereSesion()) return $r;

        if (!$task = $this->buscarTarea($id)) {
            return redirect()->to('/tasks')->with('error', 'Tarea no encontrada.');
        }

        return view('tasks/edit', ['task' => $task]);
    }

    public function update(int $id)
    {
        if ($r = $this->requiereSesion()) return $r;

        if (!$this->buscarTarea($id)) {
            return redirect()->to('/tasks')->with('error', 'Tarea no encontrada.');
        }

        if (!$this->validate(['description' => 'required|min_length[3]|max_length[255]'])) {
            return redirect()->back()->withInput()->with('error', 'La descripción debe tener más información');
        }

        $this->tasks->update($id, [
            'description' => $this->request->getPost('description')
        ]);

        return redirect()->to('/tasks')->with('success', 'Tarea actualizada');
    }

    public function delete(int $id)
    {
        if ($r = $this->requiereSesion()) return $r;

        if (!$this->buscarTarea($id)) {
            return redirect()->to('/tasks')->with('error', 'Tarea no encontrada.');
        }

        $this->tasks->delete($id);

        return redirect()->to('/tasks')->with('success', 'Tarea eliminada correctamente.');
    }
}