<?php namespace App\User;

use App\User;

class Repository {

    /**
     * Create a new user record.
     *
     * @param string $email
     * @param string $password
     *
     * @return User
     */
    public function create( $email, $password )
    {
        // Create the user record.
        //
        $user = new User;
        $user->email = $email;
        $user->password = $password;
        $user->save();

        // Now return the record.
        //
        return $user;
    }

    /**
     * Fetch a user account by it's email address.
     *
     * @param string $email
     *
     * @return mixed
     */
    public function findByEmail( $email )
    {
        return User::whereEmail($email)->firstOrFail();
    }

} 