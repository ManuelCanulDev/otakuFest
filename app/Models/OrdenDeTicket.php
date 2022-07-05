<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrdenDeTicket
 *
 * @property $id
 * @property $user_id
 * @property $telefono_orden
 * @property $correo_orden
 * @property $token
 * @property $uid
 * @property $fecha_vencimiento_orden
 * @property $costo_total_orden
 * @property $pagado
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrdenDeTicket extends Model
{
    use SoftDeletes;

    static $rules = [
		'user_id' => 'required',
		'telefono_orden' => 'required',
		'correo_orden' => 'required',
		'token' => 'required',
		'uid' => 'required',
		'fecha_vencimiento_orden' => 'required',
		'costo_total_orden' => 'required',
		'pagado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','telefono_orden','correo_orden','token','uid','fecha_vencimiento_orden','costo_total_orden','pagado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
