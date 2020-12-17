@extends('layouts.app')

@section('title')
    Classificação Série A
@endsection

@section('content')
    
    @php
        dd($times);
    @endphp
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
                        
                        <form class="form-inline">
                            
                                <div class="form-group">                                    
                                        <div class="col-4">
                                            <label for="time_casa">Time da casa</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            </select>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-2">
                                        <input class="form-control" type="text" name="gols" id="gols" value="0">
                                    </div>                                               
                                </div>
                     
                            <div class="form-group">
                                <div class="col-4">
                                    <label for="time_casa">Time da casa</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    </select>
                                </div>
                            </div>   
                            
                            <div class="form-group">
                                    <div class="col-2">
                                        <input class="form-control" type="text" name="gols" id="gols" value="0">
                                    </div>                                               
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Salvar</button>
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


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

    window.onload = function() {
    
        const handleTableClassificacao = function () {
            let req = new XMLHttpRequest();

            req.open("GET", "http://localhost:8000/api/v1/lista-classificacao", true);

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

        handleTableClassificacao();      

    }

</script>