<?php

namespace App\Http\Controllers\admin;

use Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMsedePost;
use App\Msede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class msedescontroller extends Controller
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
        $sedes=Msede::orderBy('id','desc')->get();
       
        return view('admin.sedes.index',['sedes'=>$sedes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sedes.create',['sede'=> new Msede()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMsedePost $request)
    {            
        //$sede = Msede::create($request->validated());
        $sede=(new Msede)->fill($request->validated());

            if($request->hasFile('logo')){
                $sede->logo = $request->file('logo')->store('public');
            }

        $sede->save();   

        Session::flash('success','Sede creada con éxito!');

        return back();
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Msede $sede)
    {         
        return view('admin.sedes.show',['sede'=>$sede]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Msede $sede)
    {
        return view('admin.sedes.edit',['sede'=>$sede]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMsedePost $request, Msede $sede)
    {
                
        if($request->hasFile('logo')){
            
            if(Storage::exists($sede->logo)){
                //dd($sede->logo);
                Storage::delete($sede->logo);
            }
            $sede->fill($request->validated());
            $sede->logo = $request->file('logo')->store('public');
        }else{
            $sede->fill($request->validated());
        }
        
        $sede->update();   

        Session::flash('success','Sede actualizada con éxito!');

        return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Msede $sede)
    {
        $sede->delete();
        
        Session::flash('success','Sede eliminada con éxito!');

        return back();
    }
}
