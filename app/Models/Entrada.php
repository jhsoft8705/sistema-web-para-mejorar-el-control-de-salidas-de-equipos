<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entrada
 *
 * @property $id
 * @property $nombre
 * @property $user_id
 * @property $site_id
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleEntrada[] $detalleEntradas
 * @property Site $site
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Entrada extends Model
{

    static $rules = [
		'user_id' => 'required',
		'site_id' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','user_id','site_id','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleEntradas()
    {
        return $this->hasMany('App\Models\DetalleEntrada', 'entrada_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function site()
    {
        return $this->hasOne('App\Models\Site', 'id', 'site_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
 


}
