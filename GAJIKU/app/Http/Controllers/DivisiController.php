<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "title" => "Data Divisi",
            "divisions" => Divisi::all(),
        ];

        return view('contents.divisions.divisi', $data);
    }

    public function create()
    {
        return view('contents.divisions.create', [
            "title" => "Divisions Create",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama_divisi" => 'required|max:255|min:3',
        ]);


        Divisi::create($validatedData);

        return redirect('/divisions')->with('success', 'Berhasil menambah data.');
    }

    public function show(Divisi $divisi)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            "title" => "Edit Employee",
            "divisions" => Divisi::find($id),

        ];

        return view('contents.divisions.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $divisions = Divisi::find($id);

        $validatedData = $request->validate([
            "nama_divisi" => 'required|max:255|min:3',
        ]);

        $divisions->update($validatedData);
        return redirect('/divisions')->with('success', 'Berhasil mengubah data.');
    }


    public function destroy($id)
    {
        $divisions = Divisi::findOrFail($id);

        $divisions->delete();

        return redirect('/divisions')->with('success', 'Divisi berhasil dihapus.');
    }
}
