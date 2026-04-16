<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\AvisoGeneralCorreo;
use Illuminate\Support\Facades\Mail;




class AuthController extends Controller
{
    //metodo para regresar vosta de registro

    public function registerForm()
    {
        return view('auth.register'); //view permite obtener la vista que es el balde y rough es la ruta desde web
    }

    //metodo para registrar  los usuarios
    public function register(Request $request){
        //$request->validate([
          //  'name' => 'required',
            //'email' => 'required|email|unique:users,email',    
            //'phone' => 'required',
            //'password' => 'required|min:8|confirmed'
        //]);

        
        $validator = validator($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|min:8|confirmed'
        ], [
            'email.unique' => 'Este correo electrónico ya está registrado con otra cuenta.',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator) // Mantiene los errores en los inputs
                ->withInput()            // No borra lo que el usuario escribió
                ->with('error', $validator->errors()->first()); // Envía el primer error a tu alerta roja
        }


        //si todo ta bien ya abre cambiado lo de  y esto de aqui es la logica de seguridad para lo del campo de admin
        //y con esto ya solo si  el usuario es autenticado y es admin va a poder asignar el  rol de admin a otro ... si todo sale bien ps

        $isAdminValue = false;
        if (Auth::check() && Auth::user()->is_admin) {
            $isAdminValue = $request->has('is_admin');
        }


        //crear el usuario/   ahora este es el metodo normal si lo que esta arriba, ya la version de abajo de esta es para lo de verificacion 
        //$user = User::create([
            //'name' => $request->name,
           // 'email' => $request->email,
           // 'phone' => $request->phone,
           // 'password' => Hash::make($request->password),
           // 'is_admin' => $request->has('is_admin'),
        //]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' => $isAdminValue, // Valor protegido por lógica de negocio
        ]);

        //iniciar sesion automatico/ vamos de nuevo esto es el metodo normalito, pero como estoy modificando la varificacion, se va a cambiar eso por lo que esta abajo que sera un if 
       // auth()->login($user);

        //return redirect()->route('comida.index');


        // iniciar sesión automáticamente (solo si el registro fue público)
        if (!Auth::check()) {
            Auth::login($user);
            return redirect()->route('comida.index');
        }

        // Si el admin registró a alguien, lo devolvemos con un mensaje de éxito
        return redirect()->route('admin.dashboard')->with('success', 'Usuario registrado correctamente.');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    //metodo para iniciar sesion
    public function login(Request $request)
    {
        //validar datos en el formulario
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //intentar reañizar el inicio de sesion con la informacion del formulario 
        if(Auth::attempt($data))
        {
            //ruta para enviar al usuario cuando se incia la sesion
            return redirect()->route('comida.index');
        }
        
        return back()->with('error', 'Credenciales incorrectas');
        
        }
        //metodo para cerrar sesion
        public function logout(Request $request){
            //cerrar sesion
            auth()->logout();
            //cerrar credenciales de usuario
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/acceso');
        }

        public function admindashboard(){
            return view('admin.dashboard');
        }

        

        // Método para mostrar la lista de usuarios
        public function index()
        {
            $user = User::all();
            return view('usuarios.usuariosregistro', compact('user'));
        }

        // Método para mostrar el formulario de edición de un usuario específico
        public function edit($id)
        {
            $user = User::findOrFail($id);
            return view('usuarios.editar', compact('user'));
        }

        // Método para procesar la actualización de los datos
        public function update(Request $request, $id)
        {
            $user = User::findOrFail($id);

            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'phone' => 'required',
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;

            // Solo actualiza la contraseña si el usuario escribió algo en el campo


            $user->save();

            return redirect()->route('usuarios')->with('success', 'Usuario actualizado correctamente.');
        }

        // Método para eliminar un usuario
        public function destroy($id)
        {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('usuarios')->with('warning', 'El registro del usuario ha sido eliminado del sistema.');
        }

        //metodo para poder enviar el correo de aviso
        public function enviarAviso(Request $request, $id)
        {
            $user = User::findOrFail($id);
            
            // Validamos que el administrador haya escrito un mensaje
            $request->validate([
                'mensaje' => 'required|string|min:5'
            ]);

            $mensaje = $request->mensaje;

            // Enviamos el correo al usuario seleccionado
            Mail::to($user->email)->send(new AvisoGeneralCorreo($user, $mensaje));

            return back()->with('success', '¡Aviso enviado correctamente al correo de ' . $user->name . '!');
        }
        
}
