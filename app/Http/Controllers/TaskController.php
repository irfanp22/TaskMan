<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Auth\Events\Lockout;

class TaskController extends Controller
{
    
    public function index(){
        $data = Task::where('user_id', Auth::id())->get();
        return view('dashboard')->with('data', $data);
    }

    public function store(Request $request){
        $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string', 'max:255'],
        ]);
        $judul = $request->judul;
        $desc = $request->desc;
        $data = [
            'judul' => $judul,
            'deskripsi' => $desc,
            'status_id' => 2,
            'user_id' => Auth::id(),
        ];
        $cek = Task::create($data);
        if($cek) return redirect()->route('dashboard');
        return redirect()->route('tambah');
    }

    public function edit($id){
        $data = Task::find($id);
        return view('edit')->with('data', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string', 'max:255'],
        ]);
        $judul = $request->judul;
        $desc = $request->desc;
        $data = [
            'judul' => $judul,
            'deskripsi' => $desc,
        ];
        $edit = Task::find($id);
        $cek = $edit->update($data);
        if($cek) return redirect()->route('dashboard');
        return redirect()->route('edit', ['id' => $id]);
    }
    public function hapus($id){
        $cek = Task::find($id)->delete();
        if($cek) return back();
        return redirect()->route('dashboard');
    }

    public function incomplete(){
        $data = Task::where('status_id', 2)->where('user_id', Auth::id())->get();
        return view('incomplete')->with('data', $data);
    }
    public function completed(){
        $data = Task::where('status_id', 1)->where('user_id', Auth::id())->get();
        return view('completed')->with('data', $data);
    }

    public function status($id){
        $data = Task::find($id);
        $stat = $data->status_id;
        $cek = ($stat == 1) ? $data->update(['status_id' => 2]) : $data->update(['status_id' => 1]);
        if ($cek) {
            return back();
        }
        return redirect()->route('dashboard');
    }

}
