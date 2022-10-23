<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Site
 *
 * @property $id
 * @property $nombre
 * @property $codigo
 * @property $region
 * @property $direccion
 * @property $oym
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Equipo[] $equipos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Site extends Model
{

    static $rules = [
		'nombre' => 'required',
		'codigo' => 'required',
        'region' => 'required',
		'direccion' => 'required',
		'oym' => 'required',
		//'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','codigo','direccion','region','oym','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipos()
    {
        return $this->hasMany('App\Models\Equipo', 'sitio_id', 'id');
    }


}
