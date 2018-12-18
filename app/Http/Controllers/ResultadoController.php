<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;
use Auth;

use App\User;
use App\Partido;
use App\Resultado;

class ResultadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function certification_blade($idpartido)
    {
        $partido = Partido::findOrFail($idpartido);
        $rival = User::findOrFail($partido->id_player_2);
        return view('results.cargar-resultado',compact('partido','rival'));
    }

    public function formValidationResult(Request $request)
    {
        if((!empty($request))){
                $this->validate($request,[
                        'comentxt' => 'required|min:5|max:35',
                        'gol1' => 'required|numeric|min:0',
                        'gol2' => 'required|numeric|min:0',
                        'resultimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:40000',
                    ],[
                        'comentxt.required' => ' The box comment field is required.',
                        'gol1.required' => ' The your goals is required.',
                        'gol1.min' => ' The your goals is >= 0.',
                        'gol2.required' => 'The user goals is required',
                    ]);

                    $resultado = new Resultado;
                    $resultado->comentario = $request->comentxt;
                    $resultado->goles_user_1 = $request->gol1;
                    $resultado->goles_user_2 = $request->gol2;
                    $resultado->id_player_load = auth()->user()->id;
                    $resultado->estado_partido = Resultado::RESULTADO_NO_VERIFICADO;

                    $resultimgname = Auth::user()->user_psp.'_resultado'.time().'.'.request()->resultimg->getClientOriginalExtension();
                    $request->resultimg->storeAs('resultados',$resultimgname);
                    $resultado->img_resultado = $resultimgname;
                    $resultado->save();

                    $partido = Partido::findOrFail($request->partido_id);
                    $partido->id_resultado = $resultado->id;
                    $partido->status_game = 'true';
                    $partido->save();

                    //toast()->success('se agrego el resultado con exito, espera a que la administracion lo verifique.', 'Resultado enviado..');
                    return redirect()->route('player-games');
        }
        else
        {

            toast()->warning('debes escribir los datos!');
            return redirect()->route('create-users');
        }
    }

    public function index_result()
    {
    	$resultados_pendientes_enviados = Partido::where('confirmado', 'true')
    											 ->where('status_game','false')
    											 ->where('id_player_1',auth()->user()->id)->get();
    	$c = 1;
    	$rivales_pendientes_enviados  = array();
        foreach ($resultados_pendientes_enviados as $doparti) {
            $usr= User::findOrFail($doparti->id_player_2);
            $rivales_pendientes_enviados[$c] = $usr;
            $c++;
        }

        $resultados_pendientes_solicitados = Partido::where('confirmado', 'true')
                                                    ->where('status_game','false')
                                                    ->where('id_player_2',auth()->user()->id)->get();
    	$d = 1;
    	$rivales_pendientes_solicitados  = array();
        foreach ($resultados_pendientes_solicitados as $doparti) {
            $usr= User::findOrFail($doparti->id_player_1);
            $rivales_pendientes_solicitados[$c] = $usr;
            $c++;
        }

        $resultados_certificados_enviados = Partido::where('confirmado', 'true')
                                                 ->where('status_game','true')
                                                 ->where('id_player_1',auth()->user()->id)->get();
        $e = 1;
        $rivales_certificados_enviados  = array();
        foreach ($resultados_certificados_enviados as $doparti) {
            $usr= User::findOrFail($doparti->id_player_2);
            $rivales_certificados_enviados[$e] = $usr;
            $e++;
        }
    	return view('results.resultado-player',compact('resultados_pendientes_enviados','resultados_pendientes_solicitados',
    														'rivales_pendientes_enviados','rivales_pendientes_solicitados',
                                                            'resultados_certificados_enviados','rivales_certificados_enviados'));
    }
}
