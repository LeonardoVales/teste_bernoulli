<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;

class ClassificacaoController extends Controller
{
    public function index() 
    {
        $times = Time::all();

        return view('pages.classificacao.index', compact('times'));
    }
}
