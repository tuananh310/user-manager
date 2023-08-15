<?php

namespace App\Http\Controllers\Admin;

use App\Common\StringHelpers;
use App\Enums\GenderEnum;
use App\Http\Controllers\Controller;
use App\Repositories\PositionRepository;
use App\Repositories\UserRepository;
use Exception;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
    private $positionRepo;
    private $userRepo;

    public function __construct(PositionRepository $positionRepo, UserRepository $userRepo)
    {
        $this->positionRepo = $positionRepo;
        $this->userRepo = $userRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = $this->positionRepo->all();
        return view('position.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = StringHelpers::getSelectOptions($this->positionRepo->all());
        $users = StringHelpers::getSelectOptions($this->userRepo->all());
        return view('position.create', compact('users', 'positions'));
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

            $validator = Validator::make($input, $this->positionRepo->validateCreate());
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $this->positionRepo->create($input);
            return redirect()->route('admin.position.index')->with('success', 'Thành công');
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
            $data = $this->positionRepo->find($id);
            $parents = StringHelpers::getSelectOptions($this->positionRepo->getExcept($id), $data->parent_id);
            $users = StringHelpers::getSelectOptions($this->userRepo->all(), $data->manager_by);
            if ($data) {
                $genders = StringHelpers::getSelectEnumOptions(GenderEnum::cases(), $data->gender);
                return view('position.edit', compact('data', 'users', 'parents'));
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
            $data = $this->positionRepo->find($id);
            $validator = Validator::make($input, $this->positionRepo->validateUpdate($id));
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $res = $data->update($input);
            return redirect()->route('admin.position.index')->with('success', 'Thành công');
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
            $this->positionRepo->destroy($id);
            return redirect()->route('admin.position.index')->with('success', 'Xóa thành công');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }
}
