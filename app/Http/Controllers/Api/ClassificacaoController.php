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

    /**
     * Lista a tabela de classificação
     *
     */
    public function index()
    {    
        $listaClassificacao = $this->classificacao->getListaClassificacao();
        
        return response()->json($listaClassificacao);
    }
}
