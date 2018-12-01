<?php

namespace App\Http\Controllers;

//Importar Clases de dependencias y modelos
use Illuminate\Http\Request;//Clase para recibir variables por POST
use App\Models\Usuario;//Modelo Usuario
use App\Models\Estado AS E;//Modelo Estado
use Illuminate\Support\Facades\Log;//Clase para realizar el log
//use Yajra\DataTables\DataTables;//Clase DataTables
use App\Http\Requests\UsuarioRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* PRUEBA recibiendo un array
        $o = new PruebaController;
        $d = $o->usuarios();*/
        //return view('usuario.usuario',PruebaController::usuarios());
        
        //Recibiendo los registros desde un Modelo, ejm Usuario
        $u = Usuario::all();
        
        //Cargar la vista y enviarle los registros de Usuario
        return view('usuario.usuario',['usuarios'=>$u]);
    }

    public function showTable(){
        //Enviando todos los datos, sin relaciones
        //return DataTables::of(Usuario::query())->make(true);

        //Enviado los datos con relacion
        return datatables()->eloquent(Usuario::query()->with('estado'))->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Recibiendo los registros desde un Modelo, ejm Estado con su alias E definido al inicio de la clase
        $e = E::all();
        
        //Cargar la vista y enviarle los registros de Usuario
        return view('usuario.createUsuario',['estados'=>$e]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        //Probar que los campos fueron enviados en su totolidad, se verifica en el archivo /storage/logs/laravel.log
        //Log::debug($request);

        //Validation desde el controller
        /*$valida = $request->validate([
            'primerNombre'=> 'required|string|max:100|min:2',
            'segundo_nombre'=> 'string|max:100|min:2',
            'primerApellido'=> 'required|string|max:100|min:2',
            'segundo_apellido'=> 'string|max:100|min:2',
            'correElectrónico'=> 'required|email|unique:usuario,correo',
            'contraseña'=> 'required|min:8|max:20',
            'fechaDeNacimiento'=> 'date_format:"YYYY-MM-DD"',
            'estado'=> 'required',
        ]);*/

        //Instanciar el Modelo
        $u = new Usuario;
        
        //Setear las propiedades al obj $u con los valores que llegan por $request
        $u->primer_nombre = $request->primerNombre;
        $u->segundo_nombre = $request->segundo_nombre;
        $u->primer_apellido = $request->primerApellido;
        $u->segundo_apellido = $request->segundo_apellido;
        $u->correo = $request->correElectrónico;
        $u->password = bcrypt($request->contraseña);
        $u->fecha_nacimiento = $request->fechaDeNacimiento;
        $u->estado_id = $request->estado;
        
        //Guardar el registro en la BD
        $u->save();

        //Redireccionar a una ruta, ejm: usuario.index
        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'llegó al show, con el id: '.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* PRUEBA CON UN ARRAY
        $aDatos = PruebaController::usuarios(); 
        $filtro = array_where($aDatos['usuarios'],function($val,$key) use ($id){
            Log::debug($val);
            Log::debug($val['id']);
            Log::debug($key);
            if($val['id']==$id){
                return $val;
            }
        });
        return view('usuario.editUsuario',['u'=>reset($filtro)]);*/

        //Encontrar el registro del id recibido por parametro
        $datosU = Usuario::find($id);
        
        //Recibiendo los registros desde un Modelo, ejm Estado con su alias E definido al inicio de la clase
        $e = E::all();
        
        //Enviar los datos de este registro a la vista de editar
        return view('usuario.editUsuario',['u'=>$datosU,'estados'=>$e]);
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
        //Encontrar el registro del id recibido por parametro
        $u = Usuario::find($id);
        
        //Setear las propiedades al obj $u con los valores que llegan por $request
        $u->primer_nombre = $request->primernombre;
        $u->segundo_nombre = $request->segundonombre;
        $u->primer_apellido = $request->primerapellido;
        $u->segundo_apellido = $request->segundoapellido;
        $u->correo = $request->correo;
        if($request->contrasena!=''){
            $u->password = bcrypt($request->contrasena);
        }
        $u->fecha_nacimiento = $request->fecha;
        $u->estado_id = $request->estado;
        
        //Guardar el registro en la BD
        $u->save();

        //Redireccionar a una ruta, ejm: usuario.index
        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Encontrar el registro del id recibido por parametro
        $u = Usuario::find($id);
        if ($u->delete()) {
            $res = ['status'=>true,'id'=>$id];
        }else{
            $res = ['status'=>false,'msj'=>'No se pudo eliminar porque el registro está asociado con otros registros.'];
        }
        return $res;
    }
}
