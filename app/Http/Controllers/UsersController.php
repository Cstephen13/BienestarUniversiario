<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Rol;
use Mockery\CountValidator\Exception;
use Laracasts\Flash\Flash;
use Hash;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('usuarios', ['except' => ['update','cambiarContrasena']]);
    }
    public function index(Request $request)
    {
        $roles = Rol::all();
        if(!empty($request->inactivo)){
            $users= User::estado($request->get('codigo'),true)->paginate(15);
        }else{
             $users= User::codigo($request->get('codigo'))->paginate(15);
        }
        return view('admin.users.index')->with('users',$users)->with('roles',$roles);
    }

    public function GuardarDatos(){
        if (session()->has('users'))
        {
            $usuariosaprocesar = session('users');
            set_time_limit(0);
            $contrasena = session('contrasena');
            $registrados=0;
            $actualizados=0;
            $errores=0;
            foreach($usuariosaprocesar as $user){
                try{
                    if(empty($user->id)) {

                        $user->password = $contrasena;
                        $registrados+=1;
                        $user->save();
                    }else{
                        $actualizados+=1;
                        $user->save();
                    }

                }catch(\Exception $e){
                    $errores=0;
                }
            }
            $mensaje="Se han procesado los datos exitosamente";
            if($registrados>0){
                $mensaje.=", se han guardado ". $registrados ." usuarios";
            }
             if($actualizados>0){
                    $mensaje.=", se han actualizado ". $actualizados ." usuarios";
             }
            if($errores>0){
                $mensaje.=", no pudiero almacenarse ". $errores ." usuarios, lo mas probable es que estos no cuenten".
                "con los campos obligatorios completos";
            }
            Flash::success($mensaje.".");
        }
    }

    public function save(Request $request){
        $user = new User($request->all());
        $user->password=bcrypt($request->password);
        $user->save();
        return redirect()->route('admin.users.index');
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
        if(Input::file('file')->isValid()){
          try{
            $files = Input::file('file');
            $file = fopen($files,"r");
            $users = array();
            while (!feof($file) ) {
                $line=utf8_encode(fgets($file));
                $line = str_replace('ÿþ', '',$line);
                $parts = explode("\t", $line);
                $parts = array_map('trim',$parts);
                $apellidos = array_map('mb_strtolower',explode(" ", $parts[2]));
                $apellidos = array_map('trim',$apellidos);
                $apellidos = array_map('ucfirst',$apellidos);
                $nombres = array_map('mb_strtolower',explode(" ", $parts[3]));
                $nombres = array_map('trim',$nombres);
                $nombres = array_map('ucfirst',$nombres);
                try{
                    $user = array();
                    $parts[0]=substr($parts[0],4);

                    $user['codigo']=trim(preg_replace('/\t+/', '', $parts[0]."-".$parts[1]));
                    $user['codigo']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['codigo']);

                    $user['primernombre']=trim(preg_replace('/\t+/', '',$nombres[0]));
                    $user['primernombre']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$nombres[0]);
                    if(!empty($nombres[1])){
                        $user['segundonombre']=$nombres[1];
                        if(!empty($nombres[2])){
                            $user['segundonombre']=$user['segundonombre']. " ".$nombres[2];
                        }
                        $user['segundonombre']=trim(preg_replace('/\t+/', '',$user['segundonombre']));
                        $user['segundonombre']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['segundonombre']);
                    }
                    $user['primerapellido']=trim(preg_replace('/\t+/', '',$apellidos[0]));
                    $user['primerapellido']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['primerapellido']);
                    if(!empty($apellidos[1])){
                        $user['segundoapellido']=trim(preg_replace('/\t+/', '',$apellidos[1]));
                        $user['segundoapellido']=(preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$user['segundoapellido']));
                        if(!empty($apellidos[2])){
                            $user['segundoapellido']=$user['segundoapellido']. " ".$apellidos[2];
                        }

                    }

                    $password="contraseña";
                    if(!empty($parts[4])){
                        $user['email']=trim(preg_replace('/\t+/', '',$parts[4]));
                        $user['email']=preg_replace('/[\x00-\x1F\x80-\xFF]/','',$user['email']);
                    }
                    $user['rol_id']=3;

                    $userDb = User::firstOrNew(["codigo"=>$user["codigo"]]);

                    $userDb->fill($user);
                    if(empty($userDb->id)){
                        $userDb->password=$password;
                    }
                    $users[] = $userDb;
                }catch(\Exception $e){

                }

            }
            session()->put('users', $users);
            session()->put('contrasena',bcrypt("contraseña"));
            Flash::success('Se procesaron '. count($users). 'exitosamente');
            return view('admin.users.index')->with('users',$users);
          }catch(\Exception $e){
              Flash::error('Se produjo un error, el archivo a procesar parece no contener datos legibles por el sistema.');
              return redirect()->route('admin.users.index');
          }
        }else{

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
        if(!session()->has('user')){
            $user = User::find($id);
            session()->put('user', $user);
            return redirect()->back();
        }else{
            session()->forget('user');
            return redirect()->route('admin.users.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->primernombre=$request->primernombre;
        $user->segundonombre=$request->segundonombre;
        $user->primerapellido=$request->primerapellido;
        $user->segundoapellido=$request->segundoapellido;
        $user->save();
        session()->forget('user');
        Flash::success('Datos actualizados.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$user = User::find($id);
        //$user->delete();
        dd("Entra");
    }
    public function cambiarContrasena(Request $request)
    {
        $user = User::find($request->id);
        if (Hash::check($request->password, $user->password)) {
            if(strcmp($request->contrasnanueva,$request->confirmarcontrasnanueva)==0){
                $user->password=bcrypt($request->contrasnanueva);
                $user->iniciodesesion=true;
                $user->save();
                Flash::success('Contraseña actualizada exitosamente.');
                return redirect()->back();

            }else{
                Flash::warning('Las contraseñas ingresadas no son iguales');
                return redirect()->back();
            }

        }else{
            Flash::error('La contraseña ingresada es erronea, por favor asegurese de que esta sea su contraseña.');
            return redirect()->back();
        }
    }


    public function cambiarEstado($id){
        $user = User::find($id);
        $user->estado= !($user->estado);
        $user->save();
        Flash::success('El estado del usuario se cambio exitosamente');
        return redirect()->back();
    }

}
