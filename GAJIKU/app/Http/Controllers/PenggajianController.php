<?php

namespace App\Http\Controllers;

use App\Models\Penggajian;
use App\Models\Divisi;
use App\Models\Employee;
use App\Models\User;
use App\Models\Tunjangan;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Data Gaji",
            "penggajians" => Penggajian::with('employee', 'tunjangan')->get(),
        ];

        return view('contents.penggajians.penggajian', $data);
    }

    public function create()
    {
        $tunjangans = Tunjangan::all();
        $tunjangans = tunjangan::all();
        $employees = Employee::all();
        $users = User::all();
        $divisions = Divisi::all();

        return view('contents.penggajians.create', [
            "title" => "Create Gaji",
            "employee" => $employees,
            "tunjangan" => $tunjangans,
            "divisi" => $divisions,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $validatedData = $request->validate([
        //     "potongan" => 'nullable|numeric|min:0',
        //     "id_employees" => 'required',
        //     "id_tunjangans" => 'required',
        // ]);

        
        Penggajian::create(
        ["potongan" => $request->potongan,
        "id_employees" => $request->id_employees,
        "id_tunjangans" => $request->id_tunjangans,
        "id_divisis" => $request->id_divisis,

    ]);

        return redirect('/penggajians')->with('success', 'Berhasil menambah data.');
    }

    public function edit($id)
    {
        $data = [
            "title" => "Edit Employee",
            "penggajians" => penggajian::find($id),

        ];

        return view('contents.penggajians.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $penggajians = penggajian::find($id);

        $validatedData = $request->validate([
            "id_employees" => 'required|max:255|min:3',
            "id_divisis" => 'required|max:255|min:3',
            "gaji_pokok" => 'nullable|numeric|min:0'
        ]);

        $penggajians->update($validatedData);
        return redirect('/penggajians')->with('success', 'Berhasil mengubah data.');
    }

    public function destroy($id)
    {
        $penggajians = penggajian::findOrFail($id);

        $penggajians->delete();

        return redirect('/penggajians')->with('success', 'Data Gaji berhasil dihapus.');
    }
}