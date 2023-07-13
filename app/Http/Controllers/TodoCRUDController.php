<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoCRUDController extends Controller
{
    /**
     * Menampilkan daftar resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['todos'] = Todo::orderBy('id', 'desc')->paginate(5);
        return view('todos.index', $data);
    }
    /**
     * Perlihatkan formulir untuk membuat resource baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }
    /**
     * Simpan resource yang baru dibuat di penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_todo' => 'required',
            'tanggal_todo' => 'required'
        ]);
        $todo = new Todo;
        $todo->nama_todo = $request->nama_todo;
        $todo->tanggal_todo = $request->tanggal_todo;
        $todo->save();
        return redirect()->route('todos.index')
            ->with('sukses', 'Todo has been created successfully.');
    }
    /**
     * Menampilkan resource yang ditentukan.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }
    /**
     * Tampilkan formulir untuk mengedit resource yang ditentukan.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_todo' => 'required',
            'tanggal_todo' => 'required'
        ]);
        $todo = Todo::find($id);
        $todo->nama_todo = $request->nama_todo;
        $todo->tanggal_todo = $request->tanggal_todo;
        $todo->save();
        return redirect()->route('todos.index')
            ->with('sukses', 'Todo has been created successfully.');
    }
    /**
     * Hapus resource yang ditentukan dari penyimpanan.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')
            ->with('sukses', 'Todo has been deleted successfully');
    }
}
