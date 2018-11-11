<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $item_id
 * @property string $item
 * @property string $ruta
 * @property string $icono
 * @property string $created_at
 * @property string $updated_at
 * @property Item $item
 * @property ItemRol[] $itemRols
 */
class Item extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'item';

    /**
     * @var array
     */

    protected $keyType = 'integer';
    
    protected $fillable = ['item_id', 'item', 'ruta', 'icono', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itemRols()
    {
        return $this->hasMany('App\Models\ItemRol');
    }
}
