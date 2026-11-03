<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amigo extends Model
{
    use HasFactory;
    protected $table = 'persona';

    protected $fillable = [
        'per_cod',
        'per_nom',
        'per_appm',
        'per_prof',
        'per_telf',
        'per_cel',
        'per_email',
        'per_dir',
        'per_fnac',
        'per_lnac',
        'per_foto',
        'per_est',
        'per_create',
        'per_update'
    ];
    protected $primaryKey = 'per_cod';

    public $timestamps = false;
    public static function find($ci)
    {
        return static::where('per_cod', $ci)->first();
    }
}
