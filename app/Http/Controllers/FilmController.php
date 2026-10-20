<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    // Menampilkan daftar film
    public function index()
    {
        $films = Film::all();
        return view('admin.films.index', compact('films'));
    }

    // Menampilkan form tambah film
    public function create()
    {
        return view('admin.films.create');
    }

    // Menyimpan film baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul_film' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Jika mengupload poster
        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        Film::create($data);

        return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan!');
    }

    // Menampilkan form edit film
    public function edit(Film $film)
    {
        return view('admin.films.edit', compact('film'));
    }

    // Memperbarui data film
    public function update(Request $request, Film $film)
    {
        $request->validate([
            'judul_film' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('poster')) {
            // Hapus poster lama jika ada
            if ($film->poster) {
                Storage::disk('public')->delete($film->poster);
            }
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $film->update($data);

        return redirect()->route('films.index')->with('success', 'Film berhasil diperbarui!');
    }

    // Menghapus film
    public function destroy(Film $film)
    {
        if ($film->poster) {
            Storage::disk('public')->delete($film->poster);
        }
        
        $film->delete();

        return redirect()->route('films.index')->with('success', 'Film berhasil dihapus!');
    }
}