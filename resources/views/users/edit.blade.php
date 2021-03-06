@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit user {{ $requested_user->name }}</div>

                <div class="card-body">
                    {!! Form::open(['route' => ['users.update', $requested_user->id]]) !!}
                        @csrf
                        @method('PATCH')

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div>
                            {!! Form::label('role_id', 'Role', ['class' => 'control-label']) !!}
                            {!! Form::select('role_id', $roles, $requested_user->role_id, ['class' => 'form-control', 'placeholder' => 'Pick a role...']) !!}
                        </div>

                        <div>
                            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                            {!! Form::text('name', $requested_user->name, [ 'class' => 'form-control', ]) !!}
                        </div>

                        <div>
                            {!! Form::label('email', 'E-mail', ['class' => 'control-label']) !!}
                            {!! Form::text('email', $requested_user->email, [ 'class' => 'form-control', ]) !!}
                        </div>

                        <div>
                            {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                            {!! Form::password('password', [ 'class' => 'form-control', ]) !!}
                        </div>

                        <div>
                            {!! Form::label('password_confirm', 'Confirm password', ['class' => 'control-label']) !!}
                            {!! Form::password('password_confirm', [ 'class' => 'form-control', ]) !!}
                        </div>

                        <div>
                            {!! Form::submit('Update user', ['class' => 'btn btn-success']) !!}
                        </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
