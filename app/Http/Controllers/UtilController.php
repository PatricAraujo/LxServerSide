<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function LoadWelcome()
    {
        return view('welcome');
    }
    public function LoadHome()
    {
        //dados que no futuro vem da base de dados
        $courseName = 'SD';
        $students = ['Patric', 'Nuno', 'André', 'Gabriel'];

        //array associativo
        $contactInfo = [
            'name' => 'Bruno',
            'contact' => 'Bruno@cesae.pt'
        ];
        // dd($contactInfo);
        // var_dump($contactInfo);

        $cesaeInfo = [
            'name'=> 'Cesae',
            'address' => 'Rua do cesae',
            'email' =>'cesae@cesae.pt'
            ];
        // var_dump($cesaeInfo);

        return view('home', compact('courseName', 'students', 'contactInfo','cesaeInfo'));

        // return view('home', [
        //     'courseName' => $courseName,
        //     'students' => $students
        // ]);
    }
    public function LoadFallback()
    {
        return view('utils.fallback');
    }
}
