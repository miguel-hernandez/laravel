<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\Seguridad;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request){
      if ($request->session()->has(DATOSUSUARIO)) {
          return redirect()->action('UserController@index');
      }else{
        $titulo = "Login";
        $username = "Laravel";
        return view("auth.login", compact('titulo', 'username'));
      }
    }// index()

    public function validar(Request $request){
      // $data = $request->session()->all();

      // $request->session()->push('username', $username);
      // echo "<pre>"; print_r($data);
      $username = $request->input('itxt_login_username');
      $clave = $request->input('itxt_login_clave');

      $result = Seguridad::validar_login($username,$clave);
      // echo "<pre>"; print_r($result); die();


      // echo "<pre>"; print_r($result[0]); die();
      if(count($result)>0){
        $datos_usuario = $result[0];
        // $request->session()->push(DATOSUSUARIO, $datos_usuario);
        $request->session()->put(DATOSUSUARIO, $datos_usuario);
        return redirect()->action('UserController@index');
      }
      else{
        $titulo = "Login";
        $username = "Laravel";
        return view("auth.login", compact('titulo', 'username'));
      }


    }// validar()

    public function salir(Request $request){
      $request->session()->forget('username');
      $request->session()->flush();
      return redirect('/');
    }// salir()

}// LoginController()
