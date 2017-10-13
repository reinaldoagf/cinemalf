<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Gender;
class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path='gender';
    public function index()
    {
        //
        $genders=Gender::paginate(6);
        return view($this->path.'.index',compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('gender.create');

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
        try{              
                $gender=new Gender($request->all());
                $gender->save();
                return redirect()->route($this->path.'.index')->with('message','store');
            return redirect()->route('gender.create')->with('message','password');
        }catch(Exeption $e){
            return "Faltal error - ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $gender = Gender::findOrFail($id);
        return view($this->path.'.edit', compact('gender'));
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
        //
        try{            
            $gender= Gender::findOrFail($id); 
            $gender->update($request->all());
            return redirect()->route('gender.index')->with('message','update');
        }catch(Exeption $e){
            return "Faltal error - ".$e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{      
             //User::destroy($id);

            $gender= Gender::findOrFail($id);
            $gender->delete();

            return redirect()->route('gender.index')->with('message','destroy');
        }catch(Exeption $e){
            return "Faltal error - ".$e->getMessage();
        }
        //
    }
}
