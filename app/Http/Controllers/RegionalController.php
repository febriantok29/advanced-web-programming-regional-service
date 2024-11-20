<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\Regional;

class RegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regionals = Regional::all();
        return view('master.regional.index', compact('regionals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.regional.create');
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
            'name' => 'string|required',
            'code' => 'required|unique:m_regionals',
            'description' => 'nullable',
        ]);

        $regional = new Regional();
        $regional->name = $validatedData['name'];
        $regional->code = $validatedData['code'];
        $regional->description = $validatedData['description'];
        $regional->save();

        return redirect()->route('regionals.index')->with('success', 'Regional created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regional = Regional::find($id);
        return view('master.regional.show', compact('regional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regional = Regional::find($id);
        return view('master.regional.edit', compact('regional'));
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
            'name' => 'string|required',
            'code' => 'required|unique:m_regionals,code,' . $id,
            'description' => 'nullable',
        ]);

        $regional = Regional::find($id);
        $regional->name = $validatedData['name'];
        $regional->code = $validatedData['code'];
        $regional->description = $validatedData['description'];
        $regional->save();

        return redirect()->route('regionals.index')->with('success', 'Regional updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Regional::destroy($id);
        return redirect()->route('regionals.index')->with('success', 'Regional deleted successfully.');
    }
}
