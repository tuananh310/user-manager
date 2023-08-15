<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = 'position';
    protected $guarded = [];
    public function parent()
    {
        return $this->belongsTo(Position::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Position::class, 'parent_id');
    }

    public function approves()
    {
        return $this->hasMany('App\Models\Approve', 'approve_1', 'id');
    }

    public function manager()
    {
        return $this->belongsTo('App\Models\User', 'manager_by', 'id');
    }
}
