<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Consignado
 *
 * @property $id
 * @property $tipo_documento
 * @property $documento
 * @property $nombres
 * @property $apellidos
 * @property $telefono
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Salida[] $salidas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Consignado extends Model
{
    
    static $rules = [
		'tipo_documento' => 'required',
		'documento' => 'required',
		'nombres' => 'required',
		'apellidos' => 'required',
		'telefono' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_documento','documento','nombres','apellidos','telefono','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salidas()
    {
        return $this->hasMany('App\Models\Salida', 'consignado_id', 'id');
    }
    

}
