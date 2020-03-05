@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create resolution</div>

                <div class="card-body">
                    {!! Form::open(['route' => ['resolutions.store']]) !!}
                        @csrf

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
                            {!! Form::label('title', 'Resolution', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, [ 'class' => 'form-control', ]) !!}
                        </div>

                        <div>
                            {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
