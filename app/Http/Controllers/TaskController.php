<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    //
    private function getAllTasks()
    {

        $tasksDB = Task::join('users', 'tasks.user_id', '=', 'users.id')
            ->select(
                'tasks.id',
                'tasks.name',
                'tasks.status',
                'tasks.due_at',
                'tasks.user_id',
                'users.name as user_name'
            )
            // ->select('tasks.*', 'users.name as user_name')
            ->orderBy('tasks.id', 'asc')
            ->get();

        //chama pela variavel do Model
        Task::STATUS_COMPLETED;
        Task::STATUS_NOTDONE;

        return $tasksDB;
    }
    public function LoadTasks()
    {
        $tasksDB = $this->getAllTasks();

        // dd($tasksDB);
        return view('tasks.all_tasks', compact('tasksDB'));
    }

    //rota -> function delete -> chamar na blade
    public function DeleteTask(int $id)
    {
        //posso fazer um pedaço de código que por exemplo atribui as tarefas do user a outro user
        Task::where('id', $id)->delete();

        return back();
    }

    public function UpdateTask(int $id)
    {

        $taskInfo = Task::join('users', 'tasks.user_id', '=', 'users.id')
            ->select(
                'tasks.id',
                'tasks.name',
                'tasks.status',
                'tasks.due_at',
                'tasks.user_id',
                'users.name as user_name'
            )
            // ->select('tasks.*', 'users.name as user_name')
            ->orderBy('tasks.id', 'asc')
            ->first(); //chamar só um obj
        // dd($userInfo);
        return view('tasks.update', compact('taskInfo'));
    }

    public function CreateTasks()
    {
        $usersBD = User::select('id', 'name')
            ->get();

        // dd($tasksDB);
        return view('tasks.create', compact('usersBD'));
    }

    public function StoreTask(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        // Inserção na tabela
        Task::insert([
            'name' => $request->name,
            'description' => $request->description,
            'due_at' => $request->due_at,
            'status' => 0,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('tasks.all')->with('message', 'Tarefa adicionada com sucesso!');
    }
}
