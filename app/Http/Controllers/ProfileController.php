<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator,File,Redirect,Response;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $ar_profile = DB::table('users')->get();
  
        return view('profile.index', compact('ar_profile') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $ar_profile = DB::table('users')
        ->select('users.*')
        ->where('users.id', '=', $id)
        ->get();
        
        return view('profile.show', compact('ar_profile') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = User::where('id', $id)->get();
        return view('profile/form_edit',compact('data'));
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
          $validator = Validator::make(request()->all(),[
           
            'name'=>'required',
            'email'=>'required',
            'email'=>'required|email',
            
         ],[
             'name.required'=>'Nama wajib diisi',
             'email.required'=>'email wajib diisi',
             'email.email'=>'email harus berformat email',  
             ])->validate();

          //2.proses upload,dicek pas input ada upload file/tidak
        // if(!empty($request->foto)){
        //     /*
        //     $request->validate([
        //         'foto' => 'image|mimes:jpg,jpeg,png,giff|max:2048',
        //     ]);
        //     */
        //     //$fileName = $request->nip.'.'.$request->foto->extension();
        //     $fileName = $request->name.'.jpg';   
        //     $request->foto->move(public_path('img'), $fileName);
        // }else{
        //     $fileName = '';
        // }
        
        DB::table('users')->where('id',$id)->update(
        [
            'name' => $request->name,
            'email' => $request->email,
            'foto' => $request->foto,

        ]
        );
        return redirect('/profile'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
