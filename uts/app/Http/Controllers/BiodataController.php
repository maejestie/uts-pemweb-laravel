<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BiodataController extends Controller
{
    /**
     * Menampilkan halaman utama biodata (sesuai referensi).
     */
    public function index()
    {
        $biodatas = Biodata::all();
        return view('biodata.index', compact('biodatas'));
    }

    /**
     * Form tambah biodata.
     */
    public function create()
    {
        return view('biodata.create');
    }

    /**
     * Simpan data biodata baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'peran' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $data = $request->only(['nama', 'nim', 'peran', 'deskripsi']);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['foto'] = $imageName;
        }

        Biodata::create($data);

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil ditambahkan.');
    }

    /**
     * Form edit biodata.
     */
    public function edit($id)
    {
        $biodata = Biodata::findOrFail($id);
        return view('biodata.edit', compact('biodata'));
    }

    /**
     * Perbarui data biodata.
     */
    public function update(Request $request, $id)
    {
        $biodata = Biodata::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'peran' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $data = $request->only(['nama', 'nim', 'peran', 'deskripsi']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($biodata->foto && File::exists(public_path('images/' . $biodata->foto))) {
                File::delete(public_path('images/' . $biodata->foto));
            }

            $image = $request->file('foto');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['foto'] = $imageName;
        }

        $biodata->update($data);

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil diperbarui.');
    }

    /**
     * Hapus data biodata.
     */
    public function destroy($id)
    {
        $biodata = Biodata::findOrFail($id);

        if ($biodata->foto && File::exists(public_path('images/' . $biodata->foto))) {
            File::delete(public_path('images/' . $biodata->foto));
        }

        $biodata->delete();

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil dihapus.');
    }
}
