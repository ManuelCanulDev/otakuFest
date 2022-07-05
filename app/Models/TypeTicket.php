<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TypeTicket
 *
 * @property $id
 * @property $nombre_ticket
 * @property $costo_ticket
 * @property $cuantos_ticket
 * @property $fecha_vencimiento_ticket
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Ticket[] $tickets
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypeTicket extends Model
{
    use SoftDeletes;

    static $rules = [
		'nombre_ticket' => 'required',
		'costo_ticket' => 'required',
		'cuantos_ticket' => 'required',
		'fecha_vencimiento_ticket' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_ticket','costo_ticket','cuantos_ticket','fecha_vencimiento_ticket'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'type_ticket_id', 'id');
    }
    

}
