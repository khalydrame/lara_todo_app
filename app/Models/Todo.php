<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Todo
 *
 * @property $id
 * @property $user_id
 * @property $title
 * @property $description
 * @property $completed
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Todo extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
                'user_id',
                'title',
                'description',
                'completed',
                'priority',
            ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

}
