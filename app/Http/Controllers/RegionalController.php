<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\Regional;

class RegionalController extends Controller
{
    public function index()
    {
        $regionals = Regional::all();
        return view('master.regional.index', compact('regionals'));
    }

    public function create()
    {
        return view('master.regional.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:master_regionals,code',
            'description' => 'nullable|string',
        ]);

        Regional::create($request->only('name', 'code', 'description'));

        return redirect()->route('regionals.index')->with('success', 'Regional berhasil ditambahkan.');
    }

    public function edit(Regional $regional)
    {
        return view('master.regional.edit', compact('regional'));
    }

    public function update(Request $request, Regional $regional)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => "required|string|max:50|unique:master_regionals,code,{$regional->id}",
            'description' => 'nullable|string',
        ]);

        $regional->update($request->only('name', 'code', 'description'));

        return redirect()->route('regionals.index')->with('success', 'Regional berhasil diperbarui.');
    }

    public function destroy(Regional $regional)
    {
        $regional->delete();
        return redirect()->route('regionals.index')->with('success', 'Regional berhasil dihapus.');
    }
}
