@extends('layouts.app')
@section('content')
<style>
  body {font-family: Arial;}

  /* Style the tab */
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
</style>

  <body>
      <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                  <h2>Los resultados de tus partidos.. {{auth()->user()->user_psp}} </h2>
              </div>
          </div>
      </div>

    <div class="tab">
      <button class="tablinks" onclick="openType(event, 'misres')" id="defaultOpen">mis resultados</button>
      <button class="tablinks" onclick="openType(event, 'rivales')"> resultados rivales</button>
      <button class="tablinks" onclick="openType(event, 'resumen')">resumen</button>
    </div>

    <div id="misres" class="tabcontent">
          @php ($y = 0)
          @foreach ($resultados_certificados_enviados as $key => $solicitud)
            @if($y == 0)
              <div class='row'>
            @endif
            <div class="col-sm">
                <div class="card">
                  <div class="card-header">
                    <img src="//placehold.it/200" alt="" class='imgRedonda' style="float:left">
                    <h4>{{ $rivales_certificados_enviados[$loop->iteration]->name }}</h4>
                    <h7>cel: {{ $rivales_certificados_enviados[$loop->iteration]->phone }}</h7>
                    <h6>{{ $rivales_certificados_enviados[$loop->iteration]->email }}</h6>
                  </div>
                  <div class="card-body">
                      <h4>{{ $solicitud->modo_partido}}</h4>
                      <p >IDPSP RIVAL: {{ $rivales_certificados_enviados[$loop->iteration]->user_psp }}</p>
                      <p >CREDITOS EN APUESTA: {{ $solicitud->credito_apuesta }}</p>
                      <p >CONFIRMACION DEL RIVAL: {{ $solicitud->confirmado}}</p>
                      <p >ESTADO DEL JUEGO: {{ $solicitud->status_game}}</p>
                      <p >RESULTADO: {{ $solicitud->resultado_final }}</p>
                      <p >FECHA LIMITE: {{ $solicitud->fecha_fin}}</p>
                      <div style="display: inline;">
                          <a href="#" class="btn btn-success">mensaje</a>
                      </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
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


    <div id="rivales" class="tabcontent">

    </div>

    <div id="resumen" class="tabcontent">
      <h3>Tokyo</h3>
      <p>Tokyo is the capital of Japan.</p>
    </div>

    <script>
      function openType(evt, type) {
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
@endsection