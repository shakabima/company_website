<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::orderBy('created_at', 'desc')->paginate(6);
        return view('admin.portofolio.index', compact('portofolios'));
    }

    public function create()
    {
        return view('admin.portofolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'client' => 'nullable|string',
            'category' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'description', 'client', 'category']);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/portofolio'), $imageName);
            $data['image'] = $imageName;
        }

        Portofolio::create($data);

        return redirect()->route('admin.portofolio')->with('success', 'Portofolio berhasil ditambahkan!');
    }

    public function show($id)
    {
        $portofolio = Portofolio::findOrFail($id);
        return view('admin.portofolio.show', compact('portofolio'));
    }

    public function edit($id)
    {
        $portofolio = Portofolio::findOrFail($id);
        return view('admin.portofolio.edit', compact('portofolio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'client' => 'nullable|string',
            'category' => 'nullable|string',
        ]);

        $portofolio = Portofolio::findOrFail($id);
        $data = $request->only(['title', 'description', 'client', 'category']);

        if ($request->hasFile('image')) {
            if ($portofolio->image && file_exists(public_path('uploads/portofolio/' . $portofolio->image))) {
                unlink(public_path('uploads/portofolio/' . $portofolio->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/portofolio'), $imageName);
            $data['image'] = $imageName;
        }

        $portofolio->update($data);

        return redirect()->route('admin.portofolio')->with('success', 'Portofolio berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $portofolio = Portofolio::findOrFail($id);

        if ($portofolio->image && file_exists(public_path('uploads/portofolio/' . $portofolio->image))) {
            unlink(public_path('uploads/portofolio/' . $portofolio->image));
        }

        $portofolio->delete();

        return redirect()->route('admin.portofolio')->with('success', 'Portofolio berhasil dihapus!');
    }
}