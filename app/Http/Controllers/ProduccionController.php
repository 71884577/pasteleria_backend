<?php namespace App\Http\Controllers;

use App\Insumo;
use App\Produccion;
use App\Receta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProduccionController extends Controller
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

    public function all(Request $request){

        $produccion = Produccion::with('user')->with('receta')->get()->toArray();
        return response()->json(['status' => 'success', 'result' => $produccion]);

    }

    public function store(Request $request){

        $this->validate($request,[
            'cantidad' => 'required',
            'receta' => 'required',
            'insumo' => 'required',
            'peso' => 'required',
        ]);


        $receta = Receta::where('nombreReceta',$request->receta)->get()->first();

        if($receta){

            $produccion = new Produccion();
            $produccion->cantProduccion = $request->cantidad;
            $produccion->fecha = Carbon::now()->format('Y-m-d');
            $produccion->peso = $request->peso;
            $produccion->nombreInsumo = $request->insumo;
            $produccion->idReceta = $receta->idReceta;
            $produccion->id_user = $request->user()->id;

            if ($produccion->save()) {
                return response()->json([
                    'status' => 'success',
                    'result' => []
                ]);
            }

        }

        return response()->json([
            'status' => 'fail',
            'result' => []
        ]);

    }

}
