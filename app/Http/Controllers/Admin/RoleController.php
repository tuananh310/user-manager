<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    private $roleRepo;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = $this->roleRepo->all();
        return view('role.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routeGroups = $this->getRoutesByGroup();
        return view('role.create', compact('routeGroups'));
    }

    function getRoutesByGroup()
    {
        $routeGroups = [];

        $routesCollection = Route::getRoutes();
        $prefix = 'admin.';

        foreach ($routesCollection as $route) {
            $routeName = $route->getName();

            if ($routeName && strpos($routeName, $prefix) === 0 && $routeName != 'admin.index' && $routeName != 'admin.403') {
                $groupKey = explode('.', $routeName, 3);
                $groupKey = isset($groupKey[1]) ? $prefix . $groupKey[1] . '.index' : null;

                if ($groupKey) {
                    $routeGroups[$groupKey][] = $routeName;
                }
            }
        }
        return $routeGroups;
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
            $input = $request->except('selected_routes');
            $input['permissions'] = implode(",", $request->selected_routes);

            $role = $this->roleRepo->create($input);
            return redirect()->route('admin.role.index')->with('sucess', 'Tạo mới thành công');
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
        $data = $this->roleRepo->find($id);
        $routeGroups = $this->getRoutesByGroup();
        $permisions = [];
        if ($data->permissions) {
            $permisions = explode(',', $data->permissions);
            $permisions = array_unique($permisions);
        }
        return view('role.edit', compact('data', 'permisions', 'routeGroups'));
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
            $input = $request->except('selected_routes');
            $input['permissions'] = implode(",", $request->selected_routes);
            $role = $this->roleRepo->update($input, $id);
            return redirect()->route('admin.role.index')->with('success', 'Cập nhật thành công');
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
        $this->roleRepo->delete($id);
        return redirect()->route('admin.role.index')->with('success', 'Xóa thành công');
    }
}
