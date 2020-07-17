<?php namespace App\Http\Controllers;

use App\Insumos;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StockController extends Controller
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

        $stock = Stock::get()->toArray();
        return response()->json(['status' => 'success', 'result' => $stock]);

    }

    public function reporte(Request $request){

        $stock = Stock::groupBy('nombreInsumos')->selectRaw('nombreInsumos, sum(ingresoInsumos) as ingreso_total,  sum(salidaInsumos) as salida_total')->get()->toArray();

        return response()->json(['status' => 'success', 'result' => $stock]);

    }

    public function store(Request $request){

        $this->validate($request,[
            'nombreInsumos' => 'required',
            'ingresoInsumos' => 'required',
            'salidaInsumos' => 'required',
        ]);

        $insumos = Insumos::where('nombreInsumos',$request->nombreInsumos)->get()->first();

        if($insumos){

            $stock = new Stock();
            $stock->nombreInsumos = $request->nombreInsumos;
            $stock->ingresoInsumos = $request->ingresoInsumos;
            $stock->salidaInsumos = $request->salidaInsumos;

            if($stock->save()){
                return response()->json([
                    'status' => 'success',
                    'result' => null
                ]);
            }
        }

        return response()->json([
            'status' => 'fail',
            'result' => []
        ]);

    }

}
