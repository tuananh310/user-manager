<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.info.index');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'company_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'country' => 'required',
        ]);

        $data = request()->all();

        Customer::create($data);

        return view('customer.info.success');
    }

    public function list()
    {
        // $records = Customer::all();
        $rowPerPage = request()->rowPerPage ?? 1;
        $data = Customer::query()->orderBy('id', 'asc');
        if (request()->name != null) {
            $data = $data->where('name', 'like', '%' . trim(request()->name) . '%');
        }
        if (request()->company_name != null) {
            $data = $data->where('company_name', 'like', '%' . trim(request()->company_name) . '%');
        }
        if (request()->phone != null) {
            $data = $data->where('phone', 'like', '%' . trim(request()->phone) . '%');
        }
        if (request()->email != null) {
            $data = $data->where('email', 'like', '%' . trim(request()->email) . '%');
        }
        $data = $data->paginate($rowPerPage);
        $to = $data->currentPage() * $data->perPage();
        $data->from = $to - $data->perPage() + 1;
        $data->to = $data->total() < $to ? $data->total() : $to;

        return view('customer.list.index', compact('data'));
    }

    public function export()
    {
        $customers = Customer::all();
        return  (new FastExcel($customers))->download('Customer List.xlsx');
    }
}
