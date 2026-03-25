<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'published_at' => 'required|date',
        ]);

        $data = $request->only(['title', 'content', 'published_at']);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/news'), $imageName);
            $data['image'] = $imageName;
        }

        try {
            News::create($data);
            return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal simpan berita: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan berita. Silakan coba lagi.');
        }
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'published_at' => 'required|date',
        ]);

        $data = $request->only(['title', 'content', 'published_at']);

        if ($request->hasFile('image')) {
            if ($news->image && file_exists(public_path('uploads/news/' . $news->image))) {
                unlink(public_path('uploads/news/' . $news->image));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/news'), $imageName);
            $data['image'] = $imageName;
        }

        try {
            $news->update($data);
            return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Gagal update berita: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui berita. Silakan coba lagi.');
        }
    }

    public function destroy(News $news)
    {
        if ($news->image && file_exists(public_path('uploads/news/' . $news->image))) {
            unlink(public_path('uploads/news/' . $news->image));
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }
}