<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\DB;

class CandidateRepository extends AbstractRepository
{

    public function __construct(\Illuminate\Container\Container $app)
    {
        parent::__construct($app);
    }

    public function model()
    {
        return 'App\Models\Candidate';
    }

    public function validateCreate()
    {
        return $rules = [
            'name' => 'required',
            'user_uid' => 'unique:candidate',
            'birthday' => 'required|before:today',
            'department_id' => 'required',
            'position_id' => 'required',
            'received_time' => 'required',
            'source_id' => 'required',
            'receiver_id' => 'required',
            'relationship_note' => 'required',
            'gender' => 'required',
            'email' => 'email|required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'household' => 'required',
            'address' => 'required',
            'address_detail' => 'required',
            'level' => 'required',
            'branch' => 'required',
            'major' => 'required',
            'training_place' => 'required',
            'request_form_id' => 'required',
        ];
    }
    public function validateUpdate($id)
    {
        return $rules = [
            'name' => 'required',
            'user_uid' => 'unique:candidate,user_uid,' . $id . ',id',
            'birthday' => 'required|before:today',
            'department_id' => 'required',
            'position_id' => 'required',
            'received_time' => 'required',
            'source_id' => 'required',
            'receiver_id' => 'required',
            'relationship_note' => 'required',
            'gender' => 'required',
            'email' => 'email|required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'household' => 'required',
            'address' => 'required',
            'address_detail' => 'required',
            'level' => 'required',
            'branch' => 'required',
            'major' => 'required',
            'training_place' => 'required',
            'request_form_id' => 'required',
        ];
    }
    public function countByStatus()
    {
        return $this->model->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status');
    }

}