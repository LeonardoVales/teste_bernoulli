@extends('layouts.app')

@section('title')
    Classificação Série A
@endsection

@section('content')
    
    <div class="container" style="margin-top: 50px;">

        <div class="row">

            <div class="col-6">
                <h3>Tabela Classificação Série A</h3>
            </div>

            <div class="col-6" style="text-align: right;">                
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalConfronto">
                    Inserir confronto
                </button>                
            </div>

            <div class="modal fade" id="modalConfronto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confronto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <h6 style="text-align: center;">Time da casa</h6>

                        <form action="" class="form-inline" id="inputs_form">
                            <div class="form-group">
                                <div class="row justify-content-center">
                                    
                                    <div class="col-6">
                                        <label for="time_casa_id">Time (*)</label>
                                        <select class="form-control" id="time_casa_id">
                                                <option value=""></option>
                                            @foreach ($times as $time)
                                                <option value="{{$time->id}}">{{$time->nome_time}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-3">
                                        <label for="qtd_gols_time_casa">Gols (*)</label>
                                        <input  class="form-control" 
                                                type="text" 
                                                name="qtd_gols_time_casa" 
                                                id="qtd_gols_time_casa" 
                                                onkeypress="return apenasNumeros(event)"
                                                value="0">
                                    </div>

                                    <div class="col-3">
                                        <label for="qdt_gols_contra_time_casa">Gols contra</label>
                                        <input class="form-control" 
                                               type="text" 
                                               name="qdt_gols_contra_time_casa" 
                                               id="qdt_gols_contra_time_casa" 
                                               onkeypress="return apenasNumeros(event)"
                                               value="0">
                                    </div>
                                    
                                </div>

                                <div class="row justify-content-center" style="margin-top: 10;">
                                    <div class="col-6">
                                        <label for="cartoes_amarelo_time_casa">Cartões Amarelo (*)</label>
                                        <input class="form-control" 
                                               type="text" 
                                               name="cartoes_amarelo_time_casa" 
                                               id="cartoes_amarelo_time_casa" 
                                               onkeypress="return apenasNumeros(event)"
                                               value="0">
                                    </div>

                                    <div class="col-6">
                                        <label for="cartoes_vermelho_time_casa">Cartões Vermelho (*)</label>
                                        <input class="form-control" 
                                               type="text" 
                                               name="cartoes_vermelho_time_casa" 
                                               id="cartoes_vermelho_time_casa" 
                                               onkeypress="return apenasNumeros(event)"
                                               value="0">
                                    </div>
                                </div>

                                <div class="row justify-content-center" style="margin-top: 15px;">
                                    <div class="col-12">
                                        <h5 style="text-align: center;">X</h5>
                                    </div>                                    
                                </div>

                                <h6 style="text-align: center;">Time visitante</h6>

                                <div class="row justify-content-center">                                    
                                    <div class="col-6">
                                        <label for="time_visitante_id">Time (*)</label>
                                        <select class="form-control" id="time_visitante_id">
                                                <option value=""></option>
                                            @foreach ($times as $time)
                                                <option value="{{$time->id}}">{{$time->nome_time}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-3">
                                        <label for="qtd_gols_time_visitante">Gols (*)</label>
                                        <input class="form-control" 
                                               type="text" 
                                               name="qtd_gols_time_visitante" 
                                               id="qtd_gols_time_visitante" 
                                               onkeypress="return apenasNumeros(event)"
                                               value="0">
                                    </div>

                                    <div class="col-3">
                                        <label for="qdt_gols_contra_time_visitante">Gols contra</label>
                                        <input class="form-control" 
                                               type="text" 
                                               name="qdt_gols_contra_time_visitante" 
                                               id="qdt_gols_contra_time_visitante" 
                                               onkeypress="return apenasNumeros(event)"
                                               value="0">
                                    </div>                                    
                                </div>

                                <div class="row justify-content-center" style="margin-top: 10;">
                                    <div class="col-6">
                                        <label for="cartoes_amarelo_time_visitante">Cartões Amarelo (*)</label>
                                        <input class="form-control" 
                                               type="text" 
                                               name="cartoes_amarelo_time_visitante" 
                                               id="cartoes_amarelo_time_visitante" 
                                               onkeypress="return apenasNumeros(event)"
                                               value="0">
                                    </div>

                                    <div class="col-6">
                                        <label for="cartoes_vermelho_time_visitante">Cartões Vermelho (*)</label>
                                        <input class="form-control" 
                                               type="text" 
                                               name="cartoes_vermelho_time_visitante" 
                                               id="cartoes_vermelho_time_visitante" 
                                               onkeypress="return apenasNumeros(event)"
                                               value="0">
                                    </div>
                                </div>
                            </div>
                        </form>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="close_modal" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" onclick="insertConfronto()" class="btn btn-primary">Salvar</button>
                    </div>
                    </div>
                </div>            
            </div>

            <div class="row" style="margin-top: 10px;">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-left">Posição</th>
                                <th>PTS</th>
                                <th>J</th>
                                <th>V</th>
                                <th>E</th>
                                <th>D</th>
                                <th>GP</th>
                                <th>GC</th>
                                <th>SG</th>
                            </tr>
                        </thead>
                        <tbody id="tableTbody">

                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        
    </div>


@endsection



<script>

    window.onload = function() {

        var baseUrl = 'http://localhost:8000';

        /**
         * Função que insere um novo confronto
         */
        window.insertConfronto = function () {

            if (validaCampos()) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Atenção',
                    text: 'Preencha todos os campos',                    
                });

                return;
            }
            
            const time_casa_id               = document.getElementById('time_casa_id').value;
            const qtd_gols_time_casa         = document.getElementById('qtd_gols_time_casa').value;
            const qdt_gols_contra_time_casa  = document.getElementById('qdt_gols_contra_time_casa').value;
            const cartoes_amarelo_time_casa  = document.getElementById('cartoes_amarelo_time_casa').value;
            const cartoes_vermelho_time_casa = document.getElementById('cartoes_vermelho_time_casa').value;

            const time_visitante_id               = document.getElementById('time_visitante_id').value;
            const qtd_gols_time_visitante         = document.getElementById('qtd_gols_time_visitante').value;
            const qdt_gols_contra_time_visitante  = document.getElementById('qdt_gols_contra_time_visitante').value;
            const cartoes_amarelo_time_visitante  = document.getElementById('cartoes_amarelo_time_visitante').value;
            const cartoes_vermelho_time_visitante = document.getElementById('cartoes_vermelho_time_visitante').value;

            if (time_casa_id === '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Atenção',
                    text: 'Selecione o time da casa',                    
                });

                return;
            }

            if (time_visitante_id === '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Atenção',
                    text: 'Selecione o time visitante',                    
                });

                return;
            }

            if (time_casa_id === time_visitante_id) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Atenção',
                    text: 'Selecione times diferentes para o confronto',                    
                });

                return;
            }

            const dados = new URLSearchParams({
                time_casa_id               : time_casa_id,
                qtd_gols_time_casa         : qtd_gols_time_casa,
                qdt_gols_contra_time_casa  : qdt_gols_contra_time_casa,
                cartoes_amarelo_time_casa  : cartoes_amarelo_time_casa,
                cartoes_vermelho_time_casa : cartoes_vermelho_time_casa,

                time_visitante_id               : time_visitante_id,
                qtd_gols_time_visitante         : qtd_gols_time_visitante,
                qdt_gols_contra_time_visitante  : qdt_gols_contra_time_visitante,
                cartoes_amarelo_time_visitante  : cartoes_amarelo_time_visitante,
                cartoes_vermelho_time_visitante : cartoes_vermelho_time_visitante,
            });
            
            let req = new XMLHttpRequest();
            
            req.open("POST", `${baseUrl}/api/v1/save-confronto`, true);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // Faz a requisição
            req.send(dados.toString());

            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {

                    document.getElementById('close_modal').click(); //Fecha o Modal
                    destroyContentTbody(); //Destroi o conteúdo da tabela
                    handleTableClassificacao(); //Regria a tabela atualizada

                    document.getElementById('time_casa_id').value = '';
                    document.getElementById('qtd_gols_time_casa').value = 0;
                    document.getElementById('qdt_gols_contra_time_casa').value = 0;
                    document.getElementById('cartoes_amarelo_time_casa').value = 0;
                    document.getElementById('cartoes_vermelho_time_casa').value = 0;

                    document.getElementById('time_visitante_id').value = '';
                    document.getElementById('qtd_gols_time_visitante').value = 0;
                    document.getElementById('qdt_gols_contra_time_visitante').value = 0;
                    document.getElementById('cartoes_amarelo_time_visitante').value = 0;
                    document.getElementById('cartoes_vermelho_time_visitante').value = 0;
                }
            }            
        }

        /**
        * Função que valida os inputs
        */
        const validaCampos = function() {
            const inputs = document.getElementById('inputs_form').querySelectorAll('input');

            inputs.forEach(function (input) {
                if (input.value === '') {
                    return false;
                }
            });

            return true;


        }

        /**
         * Função que permite o input receber apenas números na digitação
         */
        window.apenasNumeros = function (e) {
            const charCode = e.charCode ? e.charCode : e.keyCode;

            if (charCode != 8 && charCode != 9) {
                        
                if (charCode < 48 || charCode > 57) {
                    return false;
                }
            }
        }

        /**
         * Função que destroi o conteúdo tbody da tabela
         */
        const destroyContentTbody = function() {
            const tbody = document.getElementById('tableTbody');

            let childs = tbody.lastElementChild; //pega o último elemento criado

            while (childs) {
                tbody.removeChild(childs); //remove o elemento
                childs = tbody.lastElementChild; // pega novamente o último elemento
            }
            
        }
    
        /**
         * Função que cria a tabela de classificação
         */
        const handleTableClassificacao = function () {
            let req = new XMLHttpRequest();

            // req.open("GET", "http://localhost:8000/api/v1/lista-classificacao", true);
            req.open("GET", `${baseUrl}/api/v1/lista-classificacao`, true);
            //faz a requisição
            req.send();

            req.onreadystatechange = function() {
                
                if (req.readyState == 4 && req.status == 200) {
                    const response = JSON.parse(req.responseText);
                    if (Object.entries(response).lenght != 0) {

                        /**
                        * Percorre o objeto da tabela classificação chamando a função createRow para cada item
                        */
                        Object.entries(response).forEach(([key, value]) => {                            
                            createRow(
                                value.time.nome_time, 
                                value.pontos, 
                                value.quantidade_jogos, 
                                value.quantidade_vitorias, 
                                value.quantidade_empates, 
                                value.quantidade_derrotas, 
                                value.gols_pro, 
                                value.gols_contra, 
                                value.saldo_gols
                            );
                        });
                    }   

                }
            }
        }


        /**
            * Função que cria dinamicamente o conteúdo do tbody da tabela.
            */
        const createRow = function(time, pts, j, v, e, d, gp, gc, sg) {

            const tbody = document.getElementById('tableTbody');
            const tr = document.createElement('tr');

            const thTime = document.createElement('th');
            thTime.innerHTML = time;

            const tdPts = document.createElement('td');
            tdPts.innerHTML = pts;

            const tdJ = document.createElement('td');
            tdJ.innerHTML = j;

            const tdV = document.createElement('td');
            tdV.innerHTML = v;

            const tdE = document.createElement('td');
            tdE.innerHTML = e;

            const tdD = document.createElement('td');
            tdD.innerHTML = d;

            const tdGp = document.createElement('td');
            tdGp.innerHTML = gp;

            const tdGC = document.createElement('td');
            tdGC.innerHTML = gc;

            const tdSG = document.createElement('td');
            tdSG.innerHTML = sg;

            tr.appendChild(thTime);
            tr.appendChild(tdPts);
            tr.appendChild(tdJ);
            tr.appendChild(tdV);
            tr.appendChild(tdE);
            tr.appendChild(tdD);
            tr.appendChild(tdGp);
            tr.appendChild(tdGC);
            tr.appendChild(tdSG);

            tbody.appendChild(tr);

        }   

        //Cria o tbody da tabela de classificação
        handleTableClassificacao();      

    }

</script>