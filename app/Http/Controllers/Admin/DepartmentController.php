<?php

namespace App\Http\Controllers\Admin;

use App\Common\StringHelpers;
use App\Enums\GenderEnum;
use App\Http\Controllers\Controller;
use App\Repositories\DepartmentRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Exception;
use Validator;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private $departmentRepo;
    private $userRepo;

    public function __construct(DepartmentRepository $departmentRepo, UserRepository $userRepo)
    {
        $this->departmentRepo = $departmentRepo;
        $this->userRepo = $userRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = $this->departmentRepo->all();
        return view('department.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $departments = StringHelpers::getSelectOptions($this->departmentRepo->all());
        $users = StringHelpers::getSelectOptions($this->userRepo->all());
        $genders = StringHelpers::getSelectEnumOptions(GenderEnum::cases());
        return view('department.create', compact('genders', 'users', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try {
        $input = $request->all();

        $validator = Validator::make($input, $this->departmentRepo->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->departmentRepo->create($input);
        return redirect()->route('admin.department.index')->with('success', 'Thành công');
        // } catch (Exception $ex) {
        //     return back()->withError($ex->getMessage())->withInput();
        // }
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
            $data = $this->departmentRepo->find($id);
            $parents = StringHelpers::getSelectOptions($this->departmentRepo->getExcept($id), $data->parent_id);
            $users = StringHelpers::getSelectOptions($this->userRepo->all(), $data->manager_by);
            if ($data) {
                $genders = StringHelpers::getSelectEnumOptions(GenderEnum::cases(), $data->gender);
                return view('department.edit', compact('data', 'users', 'parents'));
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
            $data = $this->departmentRepo->find($id);
            $validator = Validator::make($input, $this->departmentRepo->validateUpdate($id));
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $res = $data->update($input);
            return redirect()->route('admin.department.index')->with('success', 'Thành công');
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
            $this->departmentRepo->destroy($id);
            return redirect()->route('admin.department.index')->with('success', 'Xóa thành công');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }
}
