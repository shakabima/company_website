<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $profiles = CompanyProfile::all();
        return view('admin.company-profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.company-profiles.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        // Simpan data
        CompanyProfile::create($validated);

        return redirect()->route('admin.company-profiles.index')->with('success', 'Profil perusahaan berhasil ditambahkan.');
    }

    public function edit(CompanyProfile $companyProfile)
    {
        return view('admin.company-profiles.edit', compact('companyProfile'));
    }

    public function update(Request $request, CompanyProfile $companyProfile)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $companyProfile->update($validated);

        return redirect()->route('admin.company-profiles.index')->with('success', 'Profil perusahaan berhasil diperbarui.');
    }

    public function destroy(CompanyProfile $companyProfile)
    {
        $companyProfile->delete();
        return redirect()->route('admin.company-profiles.index')->with('success', 'Profil perusahaan berhasil dihapus.');
    }
}
