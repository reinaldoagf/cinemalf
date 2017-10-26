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
    // ========APLICANDO MIDDLEWARE manualauth PARA TODAS LAS ACCIONES DEL CONTROLADOR
    public function __construct(){
        $this->middleware('manualauth');
    }
    public function index(Request $request)
    {
        // =================CARGANDO TABLA DE GENEROS REGISTRADOS (AJAX)
         if ($request->ajax()) {
            $genders = Gender::all();
            return response()->json($genders);
        }
        return view($this->path.'.index');
        // =================CARGANDO TABLA DE GENEROS REGISTRADOS (Sin Request $request)
        // $genders=Gender::paginate(6);
        // return view($this->path.'.index',compact('genders'));
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
        //==============REGISTANDO GENERO (AJAX)
        if ($request->ajax()) {
            # code...
            Gender::create(request()->all());
            return response()->json([
                "mensaje" => $request->all()
                ]);
        }
        //==============REGISTANDO GENERO
        // try{              
        //         $gender=new Gender($request->all());
        //         $gender->save();
        //         return redirect()->route($this->path.'.index')->with('message','store');
        //     return redirect()->route('gender.create')->with('message','password');
        // }catch(Exeption $e){
        //     return "Faltal error - ".$e->getMessage();
        // }
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
         //==============EDITAR GENERO (AJAX)
        $gender=Gender::findOrFail($id);
        return response()->json($gender);
        //==============EDITAR GENERO
        // $gender = Gender::findOrFail($id);
        // return view($this->path.'.edit', compact('gender'));
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
        //==============ACTUALIZANDO GENERO (AJAX)
        $gender= Gender::findOrFail($id); 
        $gender->update($request->all());
        return response()->json(["Mensaje"=>"listo"]);
        //==============ACTUALIZANDO GENERO
        // try{            
        //     $gender= Gender::findOrFail($id); 
        //     $gender->update($request->all());
        //     return redirect()->route('gender.index')->with('message','update');
        // }catch(Exeption $e){
        //     return "Faltal error - ".$e->getMessage();
        // }
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
    public function getGenderJson($name){

        $gender= Gender::where('genre', '=', $name)->firstOrFail();
        $gender=array("id" => $gender->id);
        return json_encode($gender);
        //return Response::json($user);
    }
    public function getGendersJson(){

        $genders=Gender::All();
        if(count($genders) == 0){
            $response = array('resultado' => 'vacio', 'data' => $genders);
        } else {
            $response = array('resultado' => 'ok', 'data' => $genders);
        }
        // $user=array("email" => $user->email, "typeofuser" => $user->typeofuser);
        
        return json_encode($response);
        //return Response::json($user);
    }
}
