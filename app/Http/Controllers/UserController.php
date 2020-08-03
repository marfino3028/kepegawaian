<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use DB;
use App\User;
use Validator,File,Redirect,Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ar_user = DB::table('users')->get();
        //"SELECT * FROM kategori"
        return view('user.index', compact('ar_user') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
       /* $validator = Validator::make(request()->all(),[
           
            'name'=>'required',
            'email'=>'required',
            'email'=>'required|email',
            'role'=>'required',
            
            
            
         ],[
             'name.required'=>'Nama wajib diisi',
             'email.required'=>'email wajib diisi',
             'email.email'=>'email harus berformat email',
             'role.required'=> 'Role wajib diisi',
             ])->validate();*/

       //2.proses upload,dicek pas input ada upload file/tidak
        
         DB::table('users')->insert(
        [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'role' => $request->role,
            'foto'=>$request->foto,
        ]
        );
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //e
        $ar_user = DB::table('users')
        ->select('users.*')
        ->where('users.id', '=', $id)
        ->get();
        
        return view('user.show', compact('ar_user') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
         
        $data = user::where('id', $id)->get();
        return view('user/form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        /*$validator = Validator::make(request()->all(),[
           
            'name'=>'required',
            'email'=>'nullable|email',
            'role'=>'required',
            
            
            
         ],[
             'name.required'=>'Nama wajib diisi',
             'email.email'=>'email harus berformat email',
             'role.required'=> 'Role wajib diisi',
             ])->validate();*/

        //2.proses upload,dicek pas input ada upload file/tidak
       
        DB::table('users')->where('id',$id)->update(
        [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'foto'=>$request->foto,

        ]
        );
        return redirect('/user');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('users')->where('id',$id)->delete();
        return redirect('/user');
    }
}
