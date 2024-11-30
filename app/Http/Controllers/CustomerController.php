<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\Customer;
use App\Models\Master\Regional;
use Barryvdh\DomPDF\Facade\Pdf;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::with('regional')->get();
        return view('master.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regionals = Regional::all();
        return view('master.customer.create', compact('regionals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'regional_id' => 'required|exists:m_regionals,id',
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        Customer::create($validatedData);
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::with('regional')->findOrFail($id);
        $regionals = Regional::all();
        return view('master.customer.show', compact('customer', 'regionals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $regionals = Regional::all();
        return view('master.customer.edit', compact('customer', 'regionals'));
    }

    public function generatePDF($id)
    {
        $customer = Customer::with('regional')->findOrFail($id);
        $pdf = Pdf::loadView('master.customer.pdf', compact('customer'));

        $now = date('Y-m-d_H:i:s');
        $fileName = $now . '_' . $customer->name . '.pdf';

        return $pdf->download($fileName);
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
        $validatedData = $request->validate([
            'regional_id' => 'required|exists:m_regionals,id',
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($validatedData);
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
