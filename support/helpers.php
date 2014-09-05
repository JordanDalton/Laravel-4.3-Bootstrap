<?php

if ( ! function_exists( 'hasError' ) )
{
    /**
     * Check if validation error exists for a particular
     * form field.
     *
     * @param        $name       The name we will search for.
     * @param        $errors     The validation errors.
     * @param string $bag        The error bag we need to use.
     *
     * @return string
     */
    function hasError( $name , $errors , $bag = 'default' )
    {
        foreach ( $errors->getBag( $bag )->all() as $error )
        {
            if ( strpos( $error , $name ) !== false )
            {
                return 'has-error';
            }
        }

        return '#';
    }
}