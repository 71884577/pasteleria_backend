<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insumos extends Model {

    use SoftDeletes;

    protected $primaryKey = 'idInsumos';

    protected $table = 'insumos';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];


}
