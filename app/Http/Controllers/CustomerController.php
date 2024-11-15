<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = DB::table('master_customers')
            ->select('master_customers.*', 'master_regionals.name as region_name')
            ->leftJoin('master_regionals', 'master_customers.region_id', '=', 'master_regionals.id')
            ->get();

        return view('master.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('master.customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'username' => 'required|string|max:50|unique:master_customers,username',
            'region_id' => 'required|exists:master_regionals,id',
        ]);

        Customer::create($request->only('name', 'date_of_birth', 'username', 'region_id'));

        return redirect()->route('customers.index')->with('success', 'Customer berhasil ditambahkan.');
    }
}
