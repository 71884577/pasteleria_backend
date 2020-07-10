<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insumo extends Model {

    use SoftDeletes;

    protected $primaryKey = 'idInsumo';

    protected $table = 'insumo';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function receta(){
        return $this->belongsTo('App\Receta','idReceta');
    }
}
