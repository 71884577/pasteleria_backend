<?php namespace App\Http\Controllers;

use App\Insumo;
use App\Insumos;
use App\Produccion;
use App\Receta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InsumosController extends Controller
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

        $insumos = Insumos::get()->toArray();
        return response()->json(['status' => 'success', 'result' => $insumos]);

    }

    public function store(Request $request){

        $this->validate($request,[
            'nombreInsumos' => 'required',
        ]);

        $insumos_count = Insumos::where('nombreInsumos',$request->nombreInsumos)->get()->count();

        if($insumos_count === 0){

            $insumos = new Insumos();

            $insumos->nombreInsumos = $request->nombreInsumos;

            if($insumos->save()){
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

    public function update(Request $request, $id){

        $this->validate($request,[
            'nombreInsumos' => 'required',
        ]);

        $insumos= Insumos::find($id);

        if($insumos){

            $insumos->nombreInsumos = $request->nombreInsumos;

            if($insumos->save()){
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

    public function remove(Request $request, $id){

        if(Insumos::destroy($id)){
            return response()->json([
                'status' => 'success',
                'result' => null
            ]);

        }

        return response()->json([
            'status' => 'failed',
            'result' => null
        ]);

    }

}
