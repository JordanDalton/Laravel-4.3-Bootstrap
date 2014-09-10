@extends('layouts.default')

@section('content')

    <!-- .container -->
    <div class="container">
        
            <!-- .row -->
            <div class="row">
                
                    <!-- .col-md-6 -->
                    <div class="col-md-6 col-md-offset-3">

                        <!-- .panel.panel-default -->
                        <div class="panel panel-default">

                            <!-- .panel-heading -->
                            <div class="panel-heading">Reset Password</div>
                            <!-- /.panel-heading -->

                            <!-- .panel-body -->
                            <div class="panel-body">

                                @include('flash::message')

                                @include('layouts.partials.errors', ['errors' => $errors->getBag('default')])

                                <!-- Begin Form -->
                                {!! Form::open() !!}

                                    <!-- Email Form Input -->
                                    <div class="form-group {!! hasError('email', $errors) !!}">
                                        {!! Form::label('email', 'Email:') !!}
                                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <!-- Password Form Input -->
                                    <div class="form-group {!! hasError('password', $errors) !!}">
                                        {!! Form::label('password', 'Password:') !!}
                                        {!! Form::password('password', ['class' => 'form-control']) !!}
                                    </div>

                                    <!-- Password_confirmation Form Input -->
                                    <div class="form-group {!! hasError('password_confirmation', $errors) !!}">
                                        {!! Form::label('password_confirmation', 'Re-enter Password:') !!}
                                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                                    </div>

                                    {!! Form::hidden('token', $token) !!}

                                    <!-- Submit Form Input -->
                                    <div class="form-group">
                                        {!! Form::submit('Reset Password', ['class' => 'btn btn-success form-control']) !!}
                                    </div>

                                {!! Form::close() !!}
                                <!-- End Form -->

                            </div>
                            <!-- .panel-body -->

                        </div>
                        <!-- /.panel.panel-default -->

                    </div>
                    <!-- /.col-md-6 -->
                
            </div>
            <!-- /.row -->
        
    </div>
    <!-- /.container -->
    

@stop