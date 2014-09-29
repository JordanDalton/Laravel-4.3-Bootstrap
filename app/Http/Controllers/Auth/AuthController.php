<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\User\Repository as UserRepository;

use Flash;
use Input;

use Illuminate\Contracts\Auth\Authenticator;
use Illuminate\Routing\Controller;

class AuthController extends Controller {

    /**
     * The authenticator implementation.
     *
     * @var Authenticator
     */
    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @param  Authenticator  $auth
     * @return void
     */
    public function __construct(Authenticator $auth)
    {
        $this->auth = $auth;

        $this->beforeFilter('csrf', ['on' => ['post']]);
        $this->beforeFilter('guest', ['except' => ['getLogout']]);
    }

    /**
     * Show the application registration form.
     *
     * @return Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  RegisterRequest     $request
     * @param \App\User\Repository $repository
     *
     * @return Response
     */
    public function postRegister(RegisterRequest $request, UserRepository $repository )
    {
        // Create a new user record.
        //
        $user = $repository->create( $request->get('email'), $request->get('password') );

        // Log the user into their account.
        //
        $this->auth->login( $user );

        // Redirect the user.
        //
        return redirect('/');
    }

    /**
     * Show the application login form.
     *
     * @return Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  LoginRequest  $request
     * @return Response
     */
    public function postLogin(LoginRequest $request)
    {
        // If authentication is successful lets send them to the homepage.
        //
        if ($this->auth->attempt($request->only('email', 'password')))
        {
            return redirect('/');
        }

        // Flash an error message to the user.
        //
        Flash::error('The credentials you entered did not match our records. Try again?');

        // Redirect the user back to the page.
        //
        return redirect('/login')->withInput();
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/');
    }

}
