<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string|max:20',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                'bio' => 'nullable',
            ]);

            $data = $request->only(['name', 'position', 'email', 'phone', 'bio']);

            if ($request->hasFile('photo')) {
                $imageName = time() . '_' . $request->file('photo')->getClientOriginalName();
                $request->file('photo')->move(public_path('uploads/employees'), $imageName);
                $data['photo'] = $imageName;
            }

            Employee::create($data);

            return redirect()->route('admin.employees.index')->with('success', 'Karyawan berhasil ditambahkan.');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Akan muncul jika ada error
        }
    }

    public function edit(Employee $employee)
    {
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string|max:20',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                'bio' => 'nullable',
            ]);

            $data = $request->only(['name', 'position', 'email', 'phone', 'bio']);

            if ($request->hasFile('photo')) {
                if ($employee->photo && file_exists(public_path('uploads/employees/' . $employee->photo))) {
                    unlink(public_path('uploads/employees/' . $employee->photo));
                }

                $imageName = time() . '_' . $request->file('photo')->getClientOriginalName();
                $request->file('photo')->move(public_path('uploads/employees'), $imageName);
                $data['photo'] = $imageName;
            }

            $employee->update($data);

            return redirect()->route('admin.employees.index')->with('success', 'Karyawan berhasil diperbarui.');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Akan muncul jika ada error
        }
    }

    public function destroy(Employee $employee)
    {
        try {
            if ($employee->photo && file_exists(public_path('uploads/employees/' . $employee->photo))) {
                unlink(public_path('uploads/employees/' . $employee->photo));
            }

            $employee->delete();

            return redirect()->route('admin.employees.index')->with('success', 'Karyawan berhasil dihapus.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}