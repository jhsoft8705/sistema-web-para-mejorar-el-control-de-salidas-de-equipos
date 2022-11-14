<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleEntrada
 *
 * @property $id
 * @property $entrada_id
 * @property $equipo_id
 * @property $cantidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Entrada $entrada
 * @property Equipo $equipo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleEntrada extends Model
{
    
    static $rules = [
		'entrada_id' => 'required',
		'equipo_id' => 'required',
		'cantidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['entrada_id','equipo_id','cantidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function entrada()
    {
        return $this->hasOne('App\Models\Entrada', 'id', 'entrada_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'equipo_id');
    }
    

}
