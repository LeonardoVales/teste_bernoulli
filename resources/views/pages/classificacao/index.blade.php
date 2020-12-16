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
                <button type="button" class="btn btn-success">Success</button>                
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

            let req = new XMLHttpRequest();

            req.open("GET", "http://localhost:8000/api/v1/lista-classificacao", true);

            req.send();

            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    const response = req.responseText;
                    
                    createRow('Cruzeiro', 1, 5, 10, 1, 0, 9, 15, 6);

                }
            }   


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

    }
    




    





</script>