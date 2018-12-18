<!-- 
    .sidebar {
    margin-top: 25px;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
  }

  .sidebar a {
    display: block;
    color: black;
    padding: 16px;
    text-decoration: none;
  }
  
  .sidebar a.active {
    background-color: #4CAF50;
    color: white;
  }

  .sidebar a:hover:not(.active) {
    background-color: #555;
    color: white;
  }

  div.content {
    margin-left: 200px;
    padding: 1px 16px;
    height: 1000px;
  }

  @media screen and (max-width: 700px) {
    .sidebar {
      width: 100%;
      height: auto;
      position: relative;
    }
    .sidebar a {float: left;}
    div.content {margin-left: 0;}
  }

  @media screen and (max-width: 400px) {
    .sidebar a {
      text-align: center;
      float: none;
    }
  }
-->


<div class="sidebar">
  <a href="{{ url('/home') }}">CHAT</a>
  <a onclick="location.href='{{route("player-games")}}';">MIS  PARTIDOS</a>
  <a onclick="location.href='{{route("result-list")}}';">RESULTADOS</a>
  <a onclick="location.href='{{route("creditos-blade")}}';">CREDITOS</a>
  <a onclick="location.href='{{route("perfil")}}';">CUENTA</a>
</div>