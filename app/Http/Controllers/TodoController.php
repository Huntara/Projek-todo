<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function create()
    {
        return view('task');
    }

    public function registerAccount(Request $request)
    {   
        // dd($request->all());
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:dns',
            'username' => 'required|min:4',
            'password' => 'required|min:4',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/')->with('success', 'Berhasil menambahkan akun! silahkan login');
    }

    public function auth(Request $request)
    {
        $login=$request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',

        ],[
            'username.exists' => 'username ini belum tersedia',
            'username.required' => 'User name harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        if(Auth::attempt($login)){
            return redirect()->route('home')->with('logsuccess', 'gfgfg');
        }

        return back()->with('gagal','Salah Input');
    }

    public function logout()
    {
        //menghapus hostory login 
        Auth::logout();
        //mengarahkan ke halaman login 
        return redirect('/');
    }

    public function home()
    {
        // ambil data dari table todos dengan model todo
        // all() fungsinya untuk mengambil semua data di table
        $id = Todo::where('user_id', '=', Auth::user()->id)->get();
        // kirim data yang sudah diambil ke file blade / ke file yang menampilkan halaman
        // kirim melalui compact()
        // isi compact sesuai dengan nama variable
        return view('home', compact('id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:5',
        ]);

        Todo::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('home')->with('added','todo berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::where('id', $id)->first();
        return view('edit', compact('todo'));
    }

    public function complated()
    {
        return view('home.complated');
    }

    public function updateComplated($id)
    {
        Todo::where('id', $id)->update([
            'status' => 1,
            'done_time' => \Carbon\Carbon::now(),
        ]);
        return redirect()->back()->with('Done', 'Todo telah selesai dikerjakan!');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:5',
        ]);

        Todo::where('id', $id)->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);
        return redirect('/home')->with('successUpdate', 'Data todo berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('home')->with('deleted','Todo berhasil dihapus');
    }
}
