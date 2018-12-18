<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partido;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Spatie\Permission\Models\Role;
use Validator;
use Auth;

class PlayerController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getGamesPlayer(){
        //$conect = User::where('status','disponible')->get();
        //mis partidos = id 1
        $data = Partido::where('id_player_1',auth()->user()->id)->where('confirmado','false')->get();
        $rivales  = array();//rivales id = 2
        $c = 1;
        foreach ($data as $doparti) {
            $usr= User::findOrFail($doparti->id_player_2);
            $rivales[$c] = $usr;
            $c++;
        }
        //partidos solicitados = id 2
        $solicitudes = Partido::where('id_player_2',auth()->user()->id)->where('confirmado','false')->get();
        $rivsolicitudes  = array();//rivales id = 1
        $e = 1;
        foreach ($solicitudes as $doparti) {
            $usr= User::findOrFail($doparti->id_player_1);
            $rivsolicitudes[$e] = $usr;
            $e++;
        }

        $resultados_pendientes_enviados = Partido::where('confirmado', 'true')
                                                 ->where('status_game','false')
                                                 ->where('id_player_1',auth()->user()->id)->get();
        $x = 1;
        $rivales_pendientes_enviados  = array();
        foreach ($resultados_pendientes_enviados as $doparti) {
            $usr= User::findOrFail($doparti->id_player_2);
            $rivales_pendientes_enviados[$x] = $usr;
            $x++;
        }
        return view('players.partidos-player',compact('data','rivales','solicitudes','rivsolicitudes','resultados_pendientes_enviados','rivales_pendientes_enviados'));
    }

}
