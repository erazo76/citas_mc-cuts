<?php

namespace App\Http\Controllers\admin;

use Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMservicioPost;
use App\Msede;
use App\Mservicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class mservicioscontroller extends Controller
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
        $servicios=Mservicio::orderBy('id','desc')->get();
      //  $sedes=Msede::pluck('id','nombre');
        return view('admin.servicios.index',['servicios'=>$servicios/*,'sedes'=>$sedes*/]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sedes=Msede::pluck('id','nombre');
        return view('admin.servicios.create',['servicio'=> new Mservicio(),'sedes'=>$sedes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMservicioPost $request)
    {
       //$servicio= Mservicio::create($request->validated());
        $servicio=(new Mservicio)->fill($request->validated());

            if($request->hasFile('imagen')){
                $servicio->imagen = $request->file('imagen')->store('public');
            }

        $servicio->save(); 
        Session::flash('success','Servicio creado con éxito!');    
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mservicio  $mservicio
     * @return \Illuminate\Http\Response
     */
    public function show(Mservicio $servicio)
    {   $sedes=Msede::pluck('id','nombre');
        return view('admin.servicios.show',['servicio'=>$servicio,'sedes'=>$sedes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mservicio  $mservicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Mservicio $servicio)
    {
        $sedes=Msede::pluck('id','nombre');
       // dd($sedes);
         return view('admin.servicios.edit',['servicio'=>$servicio,'sedes'=>$sedes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMservicioPost $request, Mservicio $servicio)
    {
        
        if($request->hasFile('imagen')){

            if(Storage::exists($servicio->imagen)){
                //dd($sede->logo);
                Storage::delete($servicio->imagen);
            } 
            $servicio->fill($request->validated());
            $servicio->imagen = $request->file('imagen')->store('public');
        }else{
            $servicio->fill($request->validated());
        }

        $servicio->update();
        Session::flash('success','Servicio actualizado con éxito!');    
        return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mservicio $servicio)
    {
        $servicio->delete();
        Session::flash('success','Servicio eliminado con éxito!');    
        return back();
     
    }
}
