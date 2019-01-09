<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;//Agregar
use Illuminate\Contracts\Auth\MustVerifyEmail;//Agregar
use Illuminate\Foundation\Auth\User as Authenticatable;//Agregar

/**
 * @property integer $id
 * @property boolean $estado_id
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $correo
 * @property string $password
 * @property string $fecha_nacimiento
 * @property string $created_at
 * @property string $updated_at
 * @property Estado $estado
 * @property RolUsuario[] $rolUsuarios
 */
class Usuario extends Authenticatable //Agregar
{
    use Notifiable;//Agregar

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'usuario';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['estado_id', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'correo', 'password', 'fecha_nacimiento', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo('App\Models\Estado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rolUsuarios()
    {
        return $this->hasMany('App\Models\RolUsuario');
    }
}
