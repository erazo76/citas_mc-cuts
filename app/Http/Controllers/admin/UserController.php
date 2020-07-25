<?php

namespace App\Http\Controllers\admin;

use Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserPut;
use App\Http\Requests\StoreUserPost;
use App\Msede;
use App\Mrole;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth','rol.admin']);
    } 

    public function index()
    {
        $users=User::orderBy('id','desc')->get();
      //  $sedes=Msede::pluck('id','nombre');
        return view('admin.users.index',['users'=>$users/*,'sedes'=>$sedes*/]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sedes=Msede::pluck('id','nombre');
        $roles=Mrole::pluck('id','nombre');
        return view('admin.users.create',['user'=> new User(),'sedes'=>$sedes,'roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request)
    {
       //$user= User::create($request->validated());

        $user=(new User)->fill([            
            'name' => $request['name'],
            'telefono' => $request['telefono'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'msedes_id' => $request['msedes_id'],
            'mroles_id' => $request['mroles_id'],
            'descripcion' => $request['descripcion'],
            'imagen' => $request['imagen'],
        ]);

            if($request->hasFile('imagen')){
                $user->imagen = $request->file('imagen')->store('public');
            }

        $user->save(); 
        Session::flash('success','Usuario creado con éxito!');    
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {   $sedes=Msede::pluck('id','nombre');
        $roles=Mrole::pluck('id','nombre');
        return view('admin.users.show',['user'=>$user,'sedes'=>$sedes,'roles'=>$roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $sedes=Msede::pluck('id','nombre');
        $roles=Mrole::pluck('id','nombre');
       // dd($sedes);
         return view('admin.users.edit',['user'=>$user,'sedes'=>$sedes,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPut $request, User $user)
    {
        
        if($request->hasFile('imagen')){

            if(Storage::exists($user->imagen)){
                //dd($sede->logo);
                Storage::delete($user->imagen);
            } 
            $user->fill([            
                'name' => $request['name'],
                'telefono' => $request['telefono'],
                'email' => $request['email'],
                'msedes_id' => $request['msedes_id'],
                'mroles_id' => $request['mroles_id'],
                'descripcion' => $request['descripcion'],
                'imagen' => $request['imagen'],
            ]);
            $user->imagen = $request->file('imagen')->store('public');
        }else{
            $user->fill($request->validated());
        }

        $user->update();
        Session::flash('success','Usuario actualizado con éxito!');    
        return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('success','Usuario eliminado con éxito!');    
        return back();
     
    }
}
