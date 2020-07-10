<?php namespace App\Http\Controllers;

use App\Insumo;
use App\Insumos;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RecetaController extends Controller
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

        $recetas = Receta::with('insumos')->get()->toArray();
        return response()->json(['status' => 'success', 'result' => $recetas]);

    }

    public function store(Request $request){

        $this->validate($request,[
            'nombreReceta' => 'required',
            'insumos' => 'required'
        ]);

        $band = true;

        DB::transaction(function () use ($request, &$band) {

            $receta = new Receta();

            $receta->nombreReceta = $request->nombreReceta;

            if($request->has('tipReceta') && $request->tipReceta != ""){
                $receta->tipReceta = $request->tipReceta;
            }

            if($request->has('desReceta') && $request->desReceta != ""){
                $receta->desReceta = $request->desReceta;
            }

            if($receta->save()){

                foreach ($request->insumos as $insumo){

                    if($insumo['nombreInsumo']!=""){

                        $insumos_count = Insumos::where('nombreInsumos',$insumo['nombreInsumo'])->get()->count();

                        if($insumos_count === 0){
                            $insumos = new Insumos();
                            $insumos->nombreInsumos = $insumo['nombreInsumo'];
                            $insumos->save();
                        }

                        $nuevo_insumo = new Insumo();

                        $nuevo_insumo->nombreInsumo = $insumo['nombreInsumo'];

                        if($insumo['marcInsumo'] != ""){
                            $nuevo_insumo->marcInsumo = $insumo['marcInsumo'];
                        }

                        if($insumo['fvInsumo'] != ""){
                            $nuevo_insumo->fvInsumo =  $insumo['fvInsumo'];
                        }

                        if($insumo['precInsumo'] != ""){
                            $nuevo_insumo->precInsumo =  $insumo['precInsumo'];
                        }

                        if($insumo['stock'] != ""){
                            $nuevo_insumo->stock =  $insumo['stock'];
                        }

                        if( $insumo['stockPromedio'] != ""){
                            $nuevo_insumo->stockPromedio =  $insumo['stockPromedio'];
                        }

                        if($insumo['stockMinimo'] != ""){
                            $nuevo_insumo->stockMinimo =  $insumo['stockMinimo'];
                        }

                        if($insumo['desInsumo'] != ""){
                            $nuevo_insumo->desInsumo =  $insumo['desInsumo'];
                        }

                        if($insumo['catInsumo'] != ""){
                            $nuevo_insumo->catInsumo =  $insumo['catInsumo'];
                        }

                        if($insumo['cantInsumo'] != ""){
                            $nuevo_insumo->cantInsumo =  $insumo['cantInsumo'];
                        }else{
                            $nuevo_insumo->cantInsumo = 0;
                        }

                        if($insumo['umInsumo'] != ""){
                            $nuevo_insumo->umInsumo =  $insumo['umInsumo'];
                        }else{
                            $nuevo_insumo->umInsumo = "unidad";
                        }

                        $nuevo_insumo->idReceta = $receta->idReceta;

                        if (!$nuevo_insumo->save()) {
                            $band = false;
                            DB::rollBack();
                        }

                    }
                }
            }
        });

        if ($band) {
            return response()->json([
                'status' => 'success',
                'result' => null
            ]);
        }

        return response()->json([
            'status' => 'fail',
            'result' => null
        ]);

    }

    public function update(Request $request,$id){

        $this->validate($request,[
            'nombreReceta' => 'required',
            'insumos' => 'required',
        ]);

        $band = true;

        DB::transaction(function () use ($request,$id, &$band) {

            $receta = Receta::find($id);

            if($receta){
                $receta->nombreReceta = $request->nombreReceta;

                if($request->has('tipReceta') && $request->tipReceta != ""){
                    $receta->tipReceta = $request->tipReceta;
                }

                if($request->has('desReceta') && $request->desReceta != ""){
                    $receta->desReceta = $request->desReceta;
                }

                if($receta->save()){

                    Insumo::where('idReceta',$id)->forceDelete();

                    foreach ($request->insumos as $insumo){

                        if($insumo['nombreInsumo']!=""){

                            $insumos_count = Insumos::where('nombreInsumos',$insumo['nombreInsumo'])->get()->count();

                            if($insumos_count === 0){
                                $insumos = new Insumos();
                                $insumos->nombreInsumos = $insumo['nombreInsumo'];
                                $insumos->save();
                            }

                            $nuevo_insumo = new Insumo();

                            $nuevo_insumo->nombreInsumo = $insumo['nombreInsumo'];

                            if($insumo['marcInsumo'] != ""){
                                $nuevo_insumo->marcInsumo = $insumo['marcInsumo'];
                            }

                            if($insumo['fvInsumo'] != ""){
                                $nuevo_insumo->fvInsumo =  $insumo['fvInsumo'];
                            }

                            if($insumo['precInsumo'] != ""){
                                $nuevo_insumo->precInsumo =  $insumo['precInsumo'];
                            }

                            if($insumo['stock'] != ""){
                                $nuevo_insumo->stock =  $insumo['stock'];
                            }

                            if( $insumo['stockPromedio'] != ""){
                                $nuevo_insumo->stockPromedio =  $insumo['stockPromedio'];
                            }

                            if($insumo['stockMinimo'] != ""){
                                $nuevo_insumo->stockMinimo =  $insumo['stockMinimo'];
                            }

                            if($insumo['desInsumo'] != ""){
                                $nuevo_insumo->desInsumo =  $insumo['desInsumo'];
                            }

                            if($insumo['catInsumo'] != ""){
                                $nuevo_insumo->catInsumo =  $insumo['catInsumo'];
                            }

                            if($insumo['cantInsumo'] != ""){
                                $nuevo_insumo->cantInsumo =  $insumo['cantInsumo'];
                            }else{
                                $nuevo_insumo->cantInsumo = 0;
                            }

                            if($insumo['umInsumo'] != ""){
                                $nuevo_insumo->umInsumo =  $insumo['umInsumo'];
                            }else{
                                $nuevo_insumo->umInsumo = "unidad";
                            }

                            $nuevo_insumo->idReceta = $receta->idReceta;

                            if (!$nuevo_insumo->save()) {
                                $band = false;
                                DB::rollBack();
                            }

                        }
                    }

                }
            }

        });

        if ($band) {
            return response()->json([
                'status' => 'success',
                'result' => null
            ]);
        }

        return response()->json([
            'status' => 'fail',
            'result' => null
        ]);

    }

    public function remove($id){

        if(Receta::destroy($id)){
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
