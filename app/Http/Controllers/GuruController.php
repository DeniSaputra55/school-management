<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kelas;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teachers = Guru::with('kelas')->get();
        return view('guru.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes = Kelas::all();
        return view('guru.create', compact('classes'));
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

        Guru::create($validated);
        return redirect()->route('guru.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $teacher = Guru::findOrFail($id);
        $classes = Kelas::all();
        return view('guru.edit', compact('teacher', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $teacher = Guru::findOrFail($id);
        $teacher->update($validated);
        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $teacher = Guru::findOrFail($id);
        $teacher->delete();
        return redirect()->route('guru.index');
    }
    // Menampilkan daftar guru berdasarkan kelas
    public function listByClass()
    {
        $classes = Kelas::with('guru')->get();
        return view('guru.byClass', compact('classes'));
    }
}
