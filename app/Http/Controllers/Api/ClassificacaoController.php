<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Classificacao;

class ClassificacaoController extends Controller
{

    protected $classificacao;

    public function __construct()
    {
        $this->classificacao = new Classificacao;
    }

    public function index()
    {
        $listaClassificacao = $this->classificacao->get();

        return response()->json($listaClassificacao);
    }
}
