@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {font-family: Arial;}

          .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
          }

          /* Style the buttons inside the tab */
          .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
          }

          /* Change background color of buttons on hover */
          .tab button:hover {
            background-color: #ddd;
          }

          /* Create an active/current tablink class */
          .tab button.active {
            background-color: #ccc;
          }

          /* Style the tab content */
          .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
          }
        .imgRedonda {
          margin-right: 10px;
          width:75px;
          height:75px;
          border-radius:160px;
          border:3px solid #666;
        }
        .card-header {
          padding: 0.75rem 1.25rem;
          margin-bottom: 0;
          background-color:#1f1f1f;
          border-bottom: 1px solid rgba(0, 0, 0, 0.125);
          color:#ff2b00;
        }
    </style>
  </head>
  <body>
    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'enviadas')" id="defaultOpen">solicitudes enviadas <span class="badge badge-light">{{sizeof($data)}}</span></button>
      <button class="tablinks" onclick="openCity(event, 'recibidas')">solicitudes pendientes <span class="badge badge-light">{{sizeof($solicitudes)}}</span></button>
      <button class="tablinks" onclick="openCity(event, 'resumen')">certificacion de juegos <span class="badge badge-light">{{sizeof($resultados_pendientes_enviados)}}</span></button>
    </div>

  <div id="enviadas" class="tabcontent">
    <h3>SOLICITUDES DE JUEGO ENVIADAS</h3>
    <p>..Espera a que el rival reciba y confirme el juego..</p>
            @php ($i = 0)
            @foreach ($data as $key => $partido)
            @if($i == 0)
              <div class='row'>
            @endif
            <div class="col-sm">
              <div class="card">
                  <div class="card-header">
                    <img class='imgRedonda' src="/storage/avatars/{{ $rivales[$loop->iteration]->user_img_pr }}" style="float:left"/>
                    <h4>{{ $rivales[$loop->iteration]->name }}</h4>
                    <h7>cel: {{ $rivales[$loop->iteration]->phone }}</h7>
                    <h6>{{ $rivales[$loop->iteration]->email }}</h6>
                  </div>
                    <div class="card-body">
                      <h2><span  class="badge badge-light">{{ $partido->modo_partido}}</span></h2>
                      <h2><span  class="badge badge-light">IDPSP RIVAL: {{$rivales[$loop->iteration]->user_psp }}</span></h2>
                      @if($partido->modo_partido == 'Partido Por Apuesta')
                        <h2><span  class="badge badge-warning">CREDITOS EN APUESTA: {{ $partido->credito_apuesta }}</span></h2>
                      @else
                      <h3><span  class="badge badge-warning">este partido no consume creditos</span></h3>
                      @endif
                      @if($partido->confirmado)
                        <h3><span  class="badge badge-danger">ESPERA LA CONFIRMACION DEL RIVAL</span></h3>
                      @endif
                      <p >FECHA LIMITE: {{ $partido->fecha_fin}}</p>
                      <div style="display: inline;">
                        <a href="#" class="btn btn-danger">cancelar</a>
                        <a href="#" class="btn btn-primary">apuesta</a>
                        <a href="#" class="btn btn-success">mensaje</a>
                      </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">creado el: {{$partido->updated_at}}</small>
                    </div>
              </div>
            </div>
            @php ($i++)
            @if($i == 3 || $loop->last)
              </div>
              @php ($i = 0)
            @endif
            @endforeach 
  </div>

  <div id="recibidas" class="tabcontent">
    <h3>SOLICTUDES DE JUEGO RECIBIDAS</h3>
    <p>..Partidos pendientes .. cargar resultados ..</p>
          @php ($y = 0)
          @foreach ($solicitudes as $key => $solicitud)
            @if($y == 0)
              <div class='row'>
            @endif
            <div class="col-sm">
                <div class="card">
                  <div class="card-header">
                    <img class='imgRedonda' src="/storage/avatars/{{ $rivsolicitudes[$loop->iteration]->user_img_pr }}" style="float:left"/>
                    <h4>{{ $rivsolicitudes[$loop->iteration]->name }}</h4>
                    <h7>cel: {{ $rivsolicitudes[$loop->iteration]->phone }}</h7>
                    <h6>{{ $rivsolicitudes[$loop->iteration]->email }}</h6>
                  </div>
                  <div class="card-body">
                      <h2><span  class="badge badge-light">{{ $solicitud->modo_partido}}</span></h2>
                      <h2><span  class="badge badge-light">IDPSP RIVAL: {{$rivsolicitudes[$loop->iteration]->user_psp }}</span></h2>
                      @if($solicitud->modo_partido == 'Partido Por Apuesta')
                        <h2><span  class="badge badge-warning">CREDITOS EN APUESTA: {{ $solicitud->credito_apuesta }}</span></h2>
                      @else
                      <h2><span  class="badge badge-warning">este partido no consume creditos</span></h2>
                      @endif
                      @if($solicitud->confirmado)
                        <h2><span  class="badge badge-primary">CONFIRMA LA SOLICITUD RIVAL</span></h>
                      @endif
                      <p >FECHA LIMITE: {{ $solicitud->fecha_fin}}</p>
                      <div style="display: inline;">
                          <a href="#" class="btn btn-danger">cancelar</a>
                          <a href="{{ route('confirmar-partido', $solicitud->id) }}" class="btn btn-primary">confirmar</a>
                      </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">creado el: {{ $solicitud->fecha_inicio}}</small>
                    </div>
                </div>
            </div>
            @php ($y++)
            @if($y == 3 || $loop->last)
              </div>
              @php ($y = 0)
            @endif
            @endforeach 
  </div>

  <div id="resumen" class="tabcontent">
    <h3>RESUMEN DE PARTIDOS JUGADOS</h3>
    <p>partido - resultado - detalle</p>
          @php ($x = 0)
          @foreach ($resultados_pendientes_enviados as $key => $solicitud)
            @if($x == 0)
              <div class='row'>
            @endif
            <div class="col-sm">
                <div class="card">
                  <div class="card-header">
                    <img class='imgRedonda' src="/storage/avatars/{{ $rivales_pendientes_enviados[$loop->iteration]->user_img_pr }}" style="float:left"/>
                    <h4>{{ $rivales_pendientes_enviados[$loop->iteration]->name }}</h4>
                    <h7>cel: {{ $rivales_pendientes_enviados[$loop->iteration]->phone }}</h7>
                    <h6>{{ $rivales_pendientes_enviados[$loop->iteration]->email }}</h6>
                  </div>
                  <div class="card-body">
                      <h2><span  class="badge badge-light">{{ $solicitud->modo_partido}}</span></h2>
                      <h2><span  class="badge badge-light">IDPSP RIVAL: {{ $rivales_pendientes_enviados[$loop->iteration]->user_psp }}</span></h2>
                      @if($solicitud->modo_partido == 'Partido Por Apuesta')
                        <p >CREDITOS EN APUESTA: {{ $solicitud->credito_apuesta }}</p>
                      @else
                      <p >este partido no consume creditos</p>
                      @endif
                      @if($solicitud->confirmado)
                        <h1><span  class="badge badge-success">El rival confirmo la solicitud</span></h1>
                        <h3><span  class="badge badge-warning">subi el resultado para validar el partido</span></h3>
                      @endif
                      <p >FECHA LIMITE: {{ $solicitud->fecha_fin}}</p>
                      <div style="display: inline;">
                          <a href="{{ route('certificar-result', $solicitud->id) }}" class="btn btn-primary">certificar</a>
                          <a href="#" class="btn btn-success">mensaje</a>
                      </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">creado el: {{$solicitud->updated_at}}</small>
                    </div>
                </div>
            </div>
            @php ($x++)
            @if($x == 3 || $loop->last)
              </div>
              @php ($x = 0)
            @endif
            @endforeach 
  </div>

  <script>
      function openCity(evt, type) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(type).style.display = "block";
          evt.currentTarget.className += " active";
      }

      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
  </script>
  </body>

</html> 
@endsection

