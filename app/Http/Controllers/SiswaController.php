<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Siswa::with('kelas')->get();
        return view('siswa.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes = Kelas::all();
        return view('siswa.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        Siswa::create($validated);
        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        //
        $siswa = Siswa::findOrFail($id);
        $kelas = kelas::all();
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($validated);
        return redirect()->route('siswa.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function destroy($id)
    {
        //
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('siswas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function listByClass()
    {
        //
        $kelass = Kelas::with('siswa')->get();
        return view('siswa.byClass', compact('kelas'));
    }
}
