@extends('layouts.app')
@section('content')
<head>
<style>
.imagePreview {
    width:150%;
    height: 180px;
    background-position: center center;
    background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
    background-color:#fff;
    background-size: cover;
    background-repeat:no-repeat;
    display: inline-block;
    box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<div class="container">
        <div class="modal-header">
                <h1>Cargar resultado del partido. <label for="comentxt">{{$partido->id}}</label></h1>
        </div>
        <form method="POST" action="/result-validation" enctype="multipart/form-data"  autocomplete="off">
            @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <br/>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="partido_id" value="{{$partido->id}}">
                    <div class="row">
                            <div class="form-group {{ $errors->has('gol1') ? 'has-error' : '' }}">
                                    <img class='imgRedonda' src="/storage/avatars/{{ Auth::user()->user_img_pr }}" style="float:left"/>
                                    <div class="col-md-8">
                                        <input type="number"   min="0" oninput="validity.valid||(value='');" id="gol1" name="gol1" class="form-control" placeholder="tus goles">
                                    </div>
                                <span class="text-danger">{{ $errors->first('gol1') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('gol2') ? 'has-error' : '' }}">
                                    <img class='imgRedonda' src="/storage/avatars/{{$rival->user_img_pr}}" style="float:center"/>
                                    <div class="col-md-8">
                                        <input type="number"  min="0" oninput="validity.valid||(value='');" id="gol1" name="gol2" class="form-control" placeholder="rival goles">
                                    </div>
                                <span class="text-danger">{{ $errors->first('gol2') }}</span>
                            </div>
                    </div>

                    <div class="form-group {{ $errors->has('resultimg') ? 'has-error' : '' }}">
                        <label for="resultimg">Foto del resultado</label>
                        <div class="container">
                            <div class="row">
                                 <div class="col-sm-2 imgUp">
                                     <div class="imagePreview"></div>
                                         <label class="btn btn-primary">
										    Upload<input type="file" id="resultimg" name="resultimg" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
				                         </label>
                                    </div>
                                </div><!-- col-2 -->
                            </div><!-- row -->
                        </div><!-- container -->
                        <small id="fileHelp" class="form-text text-muted">Debe ser una imagen clara del marcador con el resultado final del juego monstrando la cantidad de goles de ambos equipos.</small>
                        <span class="text-danger">{{ $errors->first('resultimg') }}</span>
                    </div>
                    <br>
                    <div class="form-group {{ $errors->has('comentxt') ? 'has-error' : '' }}">
                        <textarea class="form-control" id="comentxt" name="comentxt" rows="3"></textarea>
                        <span class="text-danger">{{ $errors->first('comentxt') }}</span>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-success" type = 'submit' value = "ENVIAR"/>
                    </div>
        </form>
</div>
<script>
    $(function() {
        $(document).on("change",".uploadFile", function()
        {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test( files[0].type)){ // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file
                reader.onloadend = function(){ // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                }
            }
        });
    });
</script>
@endsection

