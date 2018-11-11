<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 * @property string $created_at
 * @property string $updated_at
 * @property ItemRol[] $itemRols
 * @property RolUsuario[] $rolUsuarios
 */
class Rol extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'rol';

    /**
     * @var array
     */
    protected $keyType = 'integer';
    
    protected $fillable = ['nombre', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itemRols()
    {
        return $this->hasMany('App\Models\ItemRol');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rolUsuarios()
    {
        return $this->hasMany('App\Models\RolUsuario');
    }
}
