<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $item_id
 * @property int $rol_id
 * @property string $created_at
 * @property string $updated_at
 * @property Item $item
 * @property Rol $rol
 */
class ItemRol extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'item_rol';

    /**
     * @var array
     */

    protected $keyType = 'integer';
    
    protected $fillable = ['item_id', 'rol_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this->belongsTo('App\Models\Rol');
    }
}
