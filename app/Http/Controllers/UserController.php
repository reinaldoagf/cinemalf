<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;
use Cinema\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path='user';
    public function __construct(){
        $this->middleware('manualauth');
    }
    public function index()
    {
        //
        //$users=User::All();
        //Para mostrar los registros que han sido eliminados 'deleted_at'
        // $users=User::onlyTrashed()->paginate(6);
        
        $users=User::paginate(6);
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        //        return "Registrado satisfctoriamente";
        try{            
            if ($request['password']==$request['repeatPassword']) {
                $user=new User($request->all());
                //$user->password=bcrypt($request['password']);
                $user->save();
                return redirect()->route('user.index')->with('message','store');
            }
            return redirect()->route('user.create')->with('message','password');
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
        $user = User::findOrFail($id);
        return view($this->path.'.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        //
        try{            
            $user= User::findOrFail($id); 
            $user->update($request->all());
            return redirect()->route($this->path.'.index')->with('message','update');
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
        try{      
             //User::destroy($id);

            $user= User::findOrFail($id);
            $user->delete();

            return redirect()->route($this->path.'.index')->with('message','destroy');
        }catch(Exeption $e){
            return "Faltal error - ".$e->getMessage();
        }
    }
    public function getUserJson($name){

        $user= User::where('name', '=', $name)->firstOrFail();
        $user=array("email" => $user->email, "typeofuser" => $user->typeofuser);
        return json_encode($user);
        //return Response::json($user);
    }
    public function getUsersJson(){

        $users=User::All();
        if(count($users) == 0){
            $response = array('resultado' => 'vacio', 'data' => $users);
        } else {
            $response = array('resultado' => 'ok', 'data' => $users);
        }
        // $user=array("email" => $user->email, "typeofuser" => $user->typeofuser);
        
        return json_encode($response);
        //return Response::json($user);
    }
}
