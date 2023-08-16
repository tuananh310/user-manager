<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $table = 'candidate';
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }
    public function receive()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }
    public function households()
    {
        return $this->belongsTo(Provinces::class, 'household', 'id');
    }
    public function addresses()
    {
        return $this->belongsTo(Provinces::class, 'address', 'id');
    }
    public function interviewer()
    {
        return $this->belongsTo(User::class, 'interviewer', 'id');
    }
    public function interviewer1()
    {
        return $this->belongsTo(User::class, 'interviewer1', 'id');
    }
    public function interviewer2()
    {
        return $this->belongsTo(User::class, 'interviewer2', 'id');
    }
    public function interviewer3()
    {
        return $this->belongsTo(User::class, 'interviewer3', 'id');
    }
    public function interviewer0()
    {
        return $this->belongsTo(User::class, 'interviewer0', 'id');
    }
}
