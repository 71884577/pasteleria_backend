<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receta extends Model {

    use SoftDeletes;
    protected $primaryKey = 'idReceta';

    protected $table = 'receta';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function insumos(){
        return $this->hasMany('App\Insumo','idReceta');
    }

}
