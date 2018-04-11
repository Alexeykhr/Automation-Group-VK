<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $fillable = [
        'id', 'name', 'description', 'screen_name', 'photo_100', 'members_count',
        'is_closed', 'deactivated',
    ];

    /* |----------------------------------------------------------------------------
     * | Relationship
     * |----------------------------------------------------------------------------
     * |
     */

    public function tokens()
    {
        return $this->hasMany(GroupToken::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function cron()
    {
        return $this->hasMany(Cron::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
