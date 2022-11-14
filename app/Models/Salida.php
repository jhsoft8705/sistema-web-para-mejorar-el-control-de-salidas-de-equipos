<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Salida
 *
 * @property $id
 * @property $equipo_id
 * @property $consignado_id
 * @property $alias
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Consignado $consignado
 * @property Equipo $equipo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Salida extends Model
{
    
    static $rules = [
		'equipo_id' => 'required',
		'consignado_id' => 'required',
		'alias' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['equipo_id','consignado_id','alias','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function consignado()
    {
        return $this->hasOne('App\Models\Consignado', 'id', 'consignado_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'equipo_id');
    }
    

}
