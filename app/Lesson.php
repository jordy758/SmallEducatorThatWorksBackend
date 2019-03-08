<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $play_list_id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property PlayList $playList
 */
class Lesson extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['play_list_id', 'name', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function playList()
    {
        return $this->belongsTo('App\PlayList');
    }
}
