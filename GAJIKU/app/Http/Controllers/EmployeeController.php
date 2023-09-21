<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "title" => "Data Employee",
            "employee" => Employee::with('user', 'divisi')->get(),
        ];

        return view('contents.employees.employee', $data);
    }

    public function create()
    {
        $users = User::all();
        $divisions = Divisi::all();
        return view('contents.employees.create', [
            "title" => "Employee Create",
            "users" => $users,
            "divisi" => $divisions,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "photo" => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            "alamat" => 'required|max:255|min:5',
            "no_hp" => 'nullable|string|max:20',
            "gaji_pokok" => 'nullable|numeric|min:0',
            "id_users" => 'required',
            "id_divisis" => 'required',
        ]);

        if($request->hasFile('photo'))
        {
            $destination_path = 'public/images/employees';
            $photo = $request->file('photo');
            $photo_name = $photo->getClientOriginalName();
            $path = $request->file('photo')->storeAs($destination_path, $photo_name);

            $validatedData['photo'] = $photo_name;
        }

        Employee::create($validatedData);

        return redirect('/employee')->with('success', 'Berhasil menambah data.');
    }

    public function show($id)
    {
        return view('contents.employees.detail', [
            "title" => "Employee Detail",
            "employees" => Employee::find($id),
        ]);
    }

    public function edit($id)
    {
        $users = User::all();
        $divisions = Divisi::all();
        $data = [
            "title" => "Edit Employee",
            "employees" => Employee::find($id),
            "users" => $users,
            "divisi" => $divisions,
        ];

        return view('contents.employees.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $employee = Employee::find($id);

        $validatedData = $request->validate([
            "photo" => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            "alamat" => 'required|max:255|min:5',
            "no_hp" => 'nullable|string|max:20',
            "gaji_pokok" => 'nullable|numeric|min:0',
            "id_users" => 'required',
            "id_divisis" => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $destination_path = 'public/images/employees';
            $photo = $request->file('photo');
            $photo_name = $photo->getClientOriginalName();
            $path = $request->file('photo')->storeAs($destination_path, $photo_name);

            $validatedData['photo'] = $photo_name;
        }

        $employee->update($validatedData);
        return redirect('/employee')->with('success', 'Berhasil mengubah data.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect('/employee')->with('success', 'Karyawan berhasil dihapus.');
    }
}
