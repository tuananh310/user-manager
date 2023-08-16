<?php

namespace App\Http\Controllers\Admin;

use App\Common\StringHelpers;
use App\Enums\GenderEnum;
use App\Http\Controllers\Controller;
use App\Repositories\DepartmentRepository;
use App\Repositories\PositionRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Exception;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepo;
    private $departmentRepo;
    private $positionRepo;
    private $roleRepo;

    public function __construct(RoleRepository $roleRepo, UserRepository $userRepo, DepartmentRepository $departmentRepo, PositionRepository $positionRepo)
    {
        $this->userRepo = $userRepo;
        $this->departmentRepo = $departmentRepo;
        $this->positionRepo = $positionRepo;
        $this->roleRepo = $roleRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = $this->userRepo->all();
        return view('user.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = StringHelpers::getSelectOptions($this->departmentRepo->all());
        $positions = StringHelpers::getSelectOptions($this->positionRepo->all());
        $roles = StringHelpers::getSelectOptions($this->roleRepo->all());
        $genders = StringHelpers::getSelectEnumOptions(GenderEnum::cases());
        return view('user.create', compact('genders', 'positions', 'departments', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $input['role_id'] = implode(",", $input['role_id']);
            $validator = Validator::make($input, $this->userRepo->validateCreate());
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $this->userRepo->create($input);
            return redirect()->route('admin.user.index')->with('success', 'Thành công');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = $this->userRepo->find($id);
            if ($data) {
                $departments = StringHelpers::getSelectOptions($this->departmentRepo->all(), $data->department_id);
                $positions = StringHelpers::getSelectOptions($this->positionRepo->all(), $data->position_id);
                $genders = StringHelpers::getSelectEnumOptions(GenderEnum::cases(), $data->gender);
                $roles = StringHelpers::getSelectOptions($this->roleRepo->all(), explode(',', $data->role_id));
                return view('user.edit', compact('data', 'genders', 'departments', 'positions', 'roles'));
            }
            return back()->with("error", "Không tìm thấy dữ liệu");
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $input = $request->all();
            $input['role_id'] = implode(",", $input['role_id']);
            $data = $this->userRepo->find($id);
            $validator = Validator::make($input, $this->userRepo->validateUpdate($id));
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $res = $data->update($input);
            return redirect()->route('admin.user.index')->with('success', 'Thành công');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->userRepo->destroy($id);
            return redirect()->route('admin.user.index')->with('success', 'Xóa thành công');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }
}
