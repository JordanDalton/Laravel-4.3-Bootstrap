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
                            <div class="panel-heading">Log in</div>
                            <!-- /.panel-heading -->

                            <!-- .panel-body -->
                            <div class="panel-body">

                                @include('flash::message')

                                @include('layouts.partials.errors', ['errors' => $errors->getBag('default')])

                                <!-- Begin Form -->
                                {!! Form::open(['route' => 'login']) !!}

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

                                <!-- Submit Form Input -->
                                <div class="form-group">
                                    {!! Form::submit('Log me in', ['class' => 'btn btn-success form-control']) !!}
                                </div>

                                {!! Form::close() !!}
                                <!-- End Form -->

                            </div>
                            <!-- .panel-body -->

                            <!-- .panel-footer -->
                            <div class="panel-footer">
                                <a class="btn btn-xs btn-info" href="{!! route('register') !!}">Not a member? <strong>Sign Up!</strong></a>
                                <a class="btn btn-xs btn-primary pull-right" href="{!! route('remind') !!}">Forgot your password? <strong>Reset it!</strong></a>
                            </div>
                            <!-- /.panel-footer -->

                        </div>
                        <!-- /.panel.panel-default -->

                    </div>
                    <!-- /.col-md-6 -->
                
            </div>
            <!-- /.row -->
        
    </div>
    <!-- /.container -->
    
@stop