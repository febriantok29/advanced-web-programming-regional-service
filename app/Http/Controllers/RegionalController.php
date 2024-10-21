<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class RegionalController extends Controller
{
    public function index()
    {
        $regionals = DB::table('master_regionals')->get();
        return response()->json($regionals, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'regional_name' => 'required|string|max:255|unique:master_regionals,regional_name',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'pesan' => 'Validasi gagal',
                'kesalahan' => $validator->errors(),
            ], 422);
        }

        $id = DB::table('master_regionals')->insertGetId([
            'regional_name' => $request->regional_name,
        ]);

        return response()->json([
            'pesan' => 'Data berhasil ditambahkan',
            'id' => $id,
            'regional_name' => $request->regional_name,
        ], 201);
    }

    public function show($id)
    {
        $regional = DB::table('master_regionals')->find($id);

        if (!$regional) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
            ], 404);
        }

        return response()->json($regional, 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'regional_name' => [
                'required', 'string', 'max:255',
                Rule::unique('master_regionals', 'regional_name')->ignore($id),
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'pesan' => 'Validasi gagal',
                'kesalahan' => $validator->errors(),
            ], 422);
        }

        $affected = DB::table('master_regionals')
            ->where('id', $id)
            ->update(['regional_name' => $request->regional_name]);

        if ($affected === 0) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan atau tidak ada perubahan',
            ], 404);
        }

        return response()->json(['pesan' => 'Data berhasil diperbarui'], 200);
    }

    public function destroy($id)
    {
        $regional = DB::table('master_regionals')->find($id);

        if (!$regional) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
            ], 404);
        }

        DB::table('master_regionals')->where('id', $id)->delete();

        return response()->json([
            'pesan' => 'Data berhasil dihapus',
        ], 200);
    }

    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'pesan' => 'Validasi gagal',
                'kesalahan' => $validator->errors(),
            ], 422);
        }

        $file = $request->file('file');
        $data = array_map('str_getcsv', file($file->getRealPath()));

        foreach ($data as $row) {
            $validator = Validator::make([
                'regional_name' => $row[0] ?? '',
            ], [
                'regional_name' => 'required|string|max:255|unique:master_regionals,regional_name',
            ]);

            if ($validator->fails()) {
                continue; // Lewati baris dengan data yang tidak valid
            }

            DB::table('master_regionals')->insert([
                'regional_name' => $row[0],
            ]);
        }

        return response()->json([
            'pesan' => 'Import data selesai',
        ], 200);
    }
}

