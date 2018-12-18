<?php

namespace App\Http\Controllers;

use App\Partido;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Validator;
use Auth;

class PartidoController extends Controller
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


    public function confirmar_partido($idpartido)
    {
    	/*$partido = Partido::where('id','idpartido')
    					  ->where('confirmado','false')
    					  ->get();*/
    	$partido = Partido::findOrFail($idpartido);
    	$partido->confirmado = Partido::PARTIDO_CONFIRMADO;
    	$partido->save();
    	return redirect()->route('player-games');
    }

    public function new_game($idrival)
    {
        $rival = User::findOrFail($idrival);
        return view('players.nuevo-partido',compact('rival'));
    }

    public function armarPartido($user_id_1, $user_id_2,$modo_juego,$creditos)
    {


            $partido = new Partido;
            $partido->id_player_1 = $user_id_1;
            $partido->id_player_2 = $user_id_2;
            if($modo_juego == 'apuesta')
            {
                $partido->modo_partido = Partido::PARTIDO_APUESTA;
                $partido->credito_apuesta = $creditos;
            }
            if($modo_juego == 'gratis')
            {
                $partido->modo_partido = Partido::PARTIDO_GRATIS;
                $partido->credito_apuesta = 0;
            }
            $partido->status_game = Partido::PARTIDO_NO_VERIFICADO;
            $partido->confirmado = Partido::PARTIDO_NO_CONFIRMADO;
            $partido->fecha_inicio = Carbon::now();

            $partido->save();
            return redirect()->route('player-games');

    }
}
