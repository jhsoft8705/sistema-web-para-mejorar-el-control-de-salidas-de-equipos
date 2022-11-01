<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Equipo
 *
 * @property $id
 * @property $sitio_id
 * @property $codigo
 * @property $alias
 * @property $descripcion
 * @property $serie
 * @property $condicion
 * @property $unidad_medida
 * @property $cantidad
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Site $site
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Equipo extends Model
{

    static $rules = [
		//'sitio_id' => 'required',
        'codigo' => 'required',
        'alias' => 'required',
		'descripcion' => 'required',
		'serie' => 'required',
		'condicion' => 'required',
		'unidad_medida' => 'required',
		'cantidad' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sitio_id','codigo','alias','descripcion','serie','condicion','unidad_medida','cantidad','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function site()
    {
        return $this->hasOne('App\Models\Site', 'id', 'sitio_id');
    }


}
