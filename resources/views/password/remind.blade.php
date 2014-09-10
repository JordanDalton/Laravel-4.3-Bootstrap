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
                            <div class="panel-heading">Forgot your password?</div>
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


                                    <!-- Submit Form Input -->
                                    <div class="form-group">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-success form-control']) !!}
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