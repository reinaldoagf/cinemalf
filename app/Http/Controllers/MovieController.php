<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Movie;
use Cinema\Gender;
use Session;
use Redirect;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path='movie';
    public function __construct(){
        $this->middleware('manualauth');
    }
    public function index()
    {
        //
        $movies=Movie::paginate(6);
        // $genders=[];
        // foreach($movies as $movie){
        //      $gender=Gender::find($movie->genre_id);
        //      array_push($genders,$gender);
        //      //intercambiando valor de id en peliculas, por el nombre vinculado a este id (no afecta la base de datos, es solo a efectos de la vista)
        //      // $movie->genre_id=$gender->genre;
        // }
        // $data=array('status' =>'ok' ,'movies'=>$movies);
        // return $data;
        return view($this->path.'.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $genders= Gender::pluck('genre','id');
        // return "json:".$genders;
        if (sizeof($genders) <> 0) {
            return view($this->path.'.create',compact("genders"));
        }
        Session::flash('message-error-genders','Debe existir al menos un genero registrado.');
        return Redirect::to('/gender/create');
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
        try{              
                $movie=new Movie($request->all());
                $movie->save();
                return redirect()->route($this->path.'.index')->with('message','store');
           
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
         $movie = Movie::findOrFail($id);
        return view($this->path.'.edit', compact('movie'));
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
            $movie= Movie::findOrFail($id); 
            $movie->update($request->all());
            return redirect()->route('movie.index')->with('message','update');
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
        //
        //
        try{      
             //User::destroy($id);

            $movie= Movie::findOrFail($id);
            $movie->delete();

            return redirect()->route('movie.index')->with('message','destroy');
        }catch(Exeption $e){
            return "Faltal error - ".$e->getMessage();
        }
    }
    public function getMovieJson($name){

        $movie= Movie::where('name', '=', $name)->firstOrFail();
        $movie=array("cast" => $movie->cast, "direction" => $movie->direction, "duration" => $movie->duration);
        return json_encode($movie);
        //return Response::json($user);
    }
    public function getMoviesJson(){

        $movies=Movie::All();
        if(count($movies) == 0){
            $response = array('resultado' => 'vacio', 'data' => $movies);
        } else {
            $response = array('resultado' => 'ok', 'data' => $movies);
        }
        // $user=array("email" => $user->email, "typeofuser" => $user->typeofuser);
        
        return json_encode($response);
        //return Response::json($user);
    }
}
