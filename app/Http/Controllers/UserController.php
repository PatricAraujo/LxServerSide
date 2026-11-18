<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\XmasGift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private function LoadUsersWDB()
    {
        $usersWithoutDB = [
            ['id' => 1, 'name' => 'Sara', 'email' => 'sara@gmail.com'],
            ['id' => 2, 'name' => 'Bruno', 'email' => 'Bruno'],
            ['id' => 3, 'name' => 'Marco', 'email' => 'Marco@gmail.com'],
            ['id' => 4, 'name' => 'António', 'email' => 'António@gmail.com']
        ];
        return $usersWithoutDB;
    }

    private function userFromDB()
    {
        //puxa do models User
        $usersDB = User::select('id', 'name', 'address', 'email', 'nif');
            // ->where('name', 'sara')
            //get - traz sempre um array
        $searchPar = request()->query('search')?request()->query('search'):null;

        $query = User::select('id','name', 'address', 'email','nif');

        if ($searchPar) {
        $query->where('name', 'LIKE', "%{$searchPar}%")
        ->orWhere('email', 'LIKE', "%{$searchPar}%");
    }

        $usersDB=$query->get();

        //first - traz o primeiro que encontra
        // ->first();
        return $usersDB;
    }

    //chama a blade all users
    public function LoadAllUser()
    {
        $usersDB = $this->userFromDB();
        $usersWDB = $this->LoadUsersWDB();

        // dd($usersDB);
        return view('users.allUsers', compact('usersWDB', 'usersDB'));
    }

    //rota -> function delete -> chamar na blade
    public function DeleteUser(int $id)
    {
        //posso fazer um pedaço de código que por exemplo atribui as tarefas do user a outro user
        Task::where('user_id', $id)->delete();

        XmasGift::where('user_id', $id)->delete();

        User::where('id', $id)->delete();

        return back();
    }

    //mostra os dados do user selecionado na view
    public function UpdateUser(int $id)
    {

        $userInfo = User::where('id', $id)
            ->select('name', 'email', 'id', 'address', 'nif')
            ->first(); //chamar só um obj
        // dd($userInfo);
        return view('users.update', compact('userInfo'));
    }


    //gravar
    public function StoreUser(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'min:8|required',

        ]);

        //depois de validados, inserir na bd
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'nif' => $request->nif
        ]);
        return redirect()->route('users.all')->with('message', 'Utilizador adicionado com sucesso!');
    }

    //update
    public function UpdateForm(Request $request)
    {
        $request->validate([
        'name'    => 'required|max:50',
        'address' => 'nullable|string',
        'nif'     => 'nullable|string',
    ]);

    User::where('id', $request->id)->update([
        'name'    => $request->name,
        'address' => $request->address,
        'nif'     => $request->nif,
    ]);

        return redirect()->route('users.all')->with('message', 'user actualizado com sucesso!');
    }

    //chama blade create
    public function LoadCreateUser()
    {
        $usersWDB = $this->LoadUsersWDB();
        return view('users.create');
    }
}
