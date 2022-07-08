<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 *
 * @property $id
 * @property $type_ticket_id
 * @property $user_id
 * @property $nombres
 * @property $apellidos
 * @property $telefono
 * @property $correo
 * @property $asistio
 * @property $pagado
 * @property $token
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property TypeTicket $typeTicket
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ticket extends Model
{

    static $rules = [
		'type_ticket_id' => 'required',
		'user_id' => 'required',
		'nombres' => 'required',
		'apellidos' => 'required',
		'telefono' => 'required',
		'correo' => 'required',
		'asistio' => 'required',
		'pagado' => 'required',
		'token' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['type_ticket_id','user_id','nombres','apellidos','telefono','correo','asistio','pagado','token','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeTicket()
    {
        return $this->hasOne('App\Models\TypeTicket', 'id', 'type_ticket_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function orden()
    {
        return $this->hasOne('App\Models\OrdenDeTicket', 'id', 'orden_id');
    }
}
