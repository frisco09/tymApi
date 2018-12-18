@extends('layouts.app')
@section('content')
<div class="container-fluid">

</div>
<div class="inner">
    <div class="row">
        <h1><span class="badge badge-secondary">NUEVO PARTIDO</span></h1>
        <a id="reclamo" class="btn btn-danger btn-lg"  href="">reclamo!</a><BR>
    </div>
    <div class="row">
        <div class="col">
            <img class='imgRedonda' src="/storage/avatars/{{  Auth::user()->user_img_pr }}" style="float:center"/>
            <h2>{{ Auth::user()->user_psp }}</h2>
        </div>
        <div class="col">
            <img class='imgRedonda' src="/storage/avatars/{{$rival->user_img_pr}}" style="float:center"/>
            <h2>{{$rival->user_psp}}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form>
                <div class="form-group">
                    <label for="credito">
                        <h3><span class="badge badge-info">tus creditos: {{ Auth::user()->credito }}</span></h3>
                    </label>
                    <input name="num_credito" id="credito"type="number"  max="{{Auth::user()->credito}}" min="0" oninput="validity.valid||(value='');" name="credito" class="form-control" placeholder="tus creditos: ..">
                    <div class="pull-right" style="display: inline-block; float: right; margin-bottom:5px;margin-top: 12px;">
                        <a class="btn btn-success btn-lg"  href="{{route('armar-partido',['user_id_1'=>auth()->user()->id,'user_id_2'=>$rival->id,'modo_juego'=>'apuesta','creditos'=>200])}}">envia solicitud de juego</a><BR>
                    </div>
                </div>
            </form>
        </div>
        <div class="col">
            <form>
                <div class="form-group">
                    <h3><span class="badge badge-dark">correo: {{ $rival->email }}</span></h3>
                    <h3><span class="badge badge-dark">celular: {{ $rival->phone }}</span></h3>
                    <h3><span class="badge badge-dark">sus creditos: {{ $rival->credito }}</span></h3>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <br>
            <br>
                <form>
                    <div class="inner">
                        <div class="form-group">
                            <label for="free">
                                <h3><span class="badge badge-secondary"> armar un partido sin apostar! </span></h3>
                            </label>
                        </div>
                            <a type="button" class="btn btn-warning btn-block" id="free" href="{{route('armar-partido',['user_id_1'=>auth()->user()->id,'user_id_2'=>$rival->id,'modo_juego'=>'gratis','creditos'=>0])}}">jugar gratis</a><BR>
                        <br>
                    </div>
                </form>

        </div>
    </div>
</div>
@endsection