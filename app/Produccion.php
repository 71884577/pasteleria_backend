<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produccion extends Model {

    use SoftDeletes;

    protected $primaryKey = 'idProduccion';

    protected $table = 'produccion';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function user(){
        return $this->belongsTo('App\User','id_user');
    }

    public function receta(){
        return $this->belongsTo('App\Receta','idReceta');
    }
}
