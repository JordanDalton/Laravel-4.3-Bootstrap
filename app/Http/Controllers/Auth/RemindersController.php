<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\ResetRequest;
use App\User\Repository as UserRepository;

use Flash;

use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RemindersController extends Controller {

    /**
     * The password reminder implementation.
     *
     * @var PasswordBroker
     */
    protected $passwords;

    /**
     * Create a new password reminder controller instance.
     *
     * @param  PasswordBroker $passwords
     *
     * @return void
     */
    public function __construct( PasswordBroker $passwords )
    {
        $this->passwords = $passwords;

        $this->beforeFilter( 'guest' );
        $this->beforeFilter( 'csrf' , [ 'on' => [ 'post' ] ] );
    }

    /**
     * Display the password reminder view.
     *
     * @return Response
     */
    public function getRemind()
    {
        return view( 'password.remind' );
    }

    /**
     * Handle a POST request to remind a user of their password.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function postRemind( Request $request )
    {
        switch ( $response = $this->passwords->remind( $request->only( 'email' ) ) )
        {
            case PasswordBroker::INVALID_USER:

                // Flash the error message to the user.
                //
                Flash::error( trans( $response ) );

                // Redirect the user back to the page and re-populate the
                // form with what they had submitted.
                //
                return redirect()->back()->withInput();

            case PasswordBroker::REMINDER_SENT:

                // Flash the success message to the user.
                //
                Flash::success( trans( $response ) );

                // Redirect the user back to the page and re-populate the
                // form with what they had submitted.
                //
                return redirect()->back()->withInput();
        }
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string $token
     *
     * @return Response
     */
    public function getReset( $token = null )
    {
        if ( is_null( $token ) )
        {
            throw new NotFoundHttpException;
        }

        return view( 'password.reset' )->with( 'token' , $token );
    }

    /**
     * Handle a POST request to reset a user's password.
     *
     * @param  Request       $request
     * @param UserRepository $repository
     *
     * @return Response
     */
    public function postReset( ResetRequest $request , UserRepository $repository )
    {
        // Capture the credentials from postback.
        //
        $credentials = $request->only(
            'email' , 'password' , 'password_confirmation' , 'token'
        );

        // Fetch the user account by the email address.
        //
        $user = $repository->findByEmail( $request->get( 'email' ) );

        // Reset the user's account and prepare our response.
        //
        $response = $this->passwords->reset( $credentials , function ( $user , $password )
        {
            $user->password = $password;
            $user->save();
        } );

        switch ( $response )
        {
            case PasswordBroker::INVALID_PASSWORD:
            case PasswordBroker::INVALID_TOKEN:
            case PasswordBroker::INVALID_USER:

                // Flash an error message to the user.
                //
                Flash::error( trans( $response ) );

                // Redirect the user back to the page and re-populate the
                // form with what they had submitted.
                //
                return redirect()->back()->withInput();

            case PasswordBroker::PASSWORD_RESET:

                // Redirect the user back to the homepage.
                //
                return redirect()->to( '/' );
        }
    }

}
