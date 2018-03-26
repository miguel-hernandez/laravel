<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\Seguridad;
// use Symfony\Component\HttpFoundation\Response;
// use App\Http\Controllers\Auth\Redirect;
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
          return redirect()->action('PanelController@index');
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
        return redirect()->action('PanelController@index');
      }
      else{
        $titulo = "Login";
        $username = "Laravel";
        $error = "¡El usuario o la contraseña son incorrectos!";

        // return Redirect::route('login', array('error' => $error));

        // return Redirect::to('login')->with('error', 'Login Failed');
        // return Redirect::action('Auth\LoginController@index', array('error' => $error));
        // return Redirect::route('login', array('error' => $error));
        // return Redirect::action('Auth\LoginController@index', array('error' => $error));

        /*
        return redirect()->action('Auth\LoginController@index', [
        'error' => $error
        ]);
        */
        return view("auth.login", compact('titulo', 'username', 'error'));
      }


    }// validar()

    public function salir(Request $request){
      $request->session()->forget(DATOSUSUARIO);
      $request->session()->flush();
      return redirect('/');
    }// salir()

}// LoginController()
