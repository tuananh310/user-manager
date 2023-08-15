<?php

namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;

class UserRepository extends AbstractRepository
{

    public function __construct(\Illuminate\Container\Container $app)
    {
        parent::__construct($app);
    }

    public function model()
    {
        return 'App\Models\User';
    }

    public function validateCreate()
    {
        return $rules = [
            'name' => 'required',
            'email' => 'email|required|unique:user',
            'gender' => 'required',
            'birthday' => 'required|before:today|after:01/01/1990',
            'username' => 'required|unique:user',
            'password' => 'required|min:6|max:32',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'department_id' => 'required',
            'position_id' => 'required',
        ];
    }
    public function validateUpdate($id)
    {
        return $rules = [
            'name' => 'required',
            'email' => 'email|required|unique:user,email,' . $id . ',id',
            'username' => 'required|unique:user,username,' . $id . ',id',
            'gender' => 'required',
            'birthday' => 'required|before:today',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'department_id' => 'required',
            'position_id' => 'required',
        ];
    }

    public function validateChangePassword()
    {
        return $rules = [
            'password' => 'required|min:6|max:32',
            're_password' => 'required|min:6|max:32|same:password',
        ];
    }

    public function getDictionary($attribute, $array = array('*'), $columns = array('*'))
    {
        $data = $this->model->whereIn($attribute, $array)->get($columns)->getDictionary();
        return collect($array)->map(function ($id) use ($data) {
            return $data->get($id)->toArray();
        })->all();
    }

    function getAllUser()
    {
        $users = $this->model->all();
        return $users;
    }
}
