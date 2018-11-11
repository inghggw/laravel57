<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $rol_id
 * @property integer $usuario_id
 * @property string $created_at
 * @property string $updated_at
 * @property Rol $rol
 * @property Usuario $usuario
 */
class RolUsuario extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $keyType = 'integer';
    
    protected $table = 'rol_usuario';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['rol_id', 'usuario_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this->belongsTo('App\Models\Rol');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario');
    }
}
