<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\XmasGift;
use Illuminate\Http\Request;

class XmasGiftController extends Controller
{
    //teste pra ver se veio os itens certos
    private function giftsFromDB()
    {
        //puxa do models User
        $giftDB = XmasGift::select('id', 'name', 'estimated_value', 'spent_value', 'user_id')
            // ->where('name', 'sara')
            //get - traz sempre um array
            ->get();
        //first - traz o primeiro que encontra
        // ->first();

        return $giftDB;
    }

    //Chamar todos as prendas
    public function LoadGift()
    {
        $giftDB = XmasGift::join('users', 'xmas_gifts.user_id', '=', 'users.id')
            ->select(
                'xmas_gifts.id',
                'xmas_gifts.name',
                'xmas_gifts.estimated_value',
                'xmas_gifts.spent_value',
                'users.name as user_name'
            )
            ->get();
        return view('xmas.all_giftxmas', compact('giftDB'));
    }

    //Deletar
    public function DeleteGift(int $id)
    {

        XmasGift::where('id', $id)->delete();

        return back();
    }

    //Chamar a blade update
    public function UpdateGift(int $id)
    {

        $giftInfo = XmasGift::join('users', 'xmas_gifts.user_id', '=', 'users.id')
            ->select(
                'xmas_gifts.id',
                'xmas_gifts.name',
                'xmas_gifts.estimated_value',
                'xmas_gifts.spent_value',
                'xmas_gifts.user_id',
                'users.name as user_name'
            )
            // ->orderBy('xmas_gifts.id')
            ->where('xmas_gifts.id', $id)
            ->first(); //chamar só um obj
        // dd($userInfo);


        return view('xmas.update', compact('giftInfo'));
    }

    //Chamar a blade create
    public function CreateGift()
    {
        $usersBD = User::select('id', 'name')
            ->get();

        // dd($tasksDB);
        return view('xmas.create', compact('usersBD'));
    }

    //GRAVAR no BD
    public function StoreGift(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'estimated_value' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
        ]);

        XmasGift::insert([
            'name' => $request->name,
            'estimated_value' => $request->estimated_value,
            'spent_value' => $request->spent_value,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('xmas.all_giftxmas')->with('message', 'Prenda adicionada com sucesso!');
    }

    //UPDATE
    public function UpdateGiftForm(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'estimated_value' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
        ]);

        XmasGift::where('id', $request->id)->update([
            'name' => $request->name,
            'estimated_value' => $request->estimated_value,
            'spent_value' => $request->spent_value,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('xmas.all_giftxmas')->with('message', 'Prenda atualizada com sucesso!');
    }
}
