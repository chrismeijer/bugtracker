@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create priority</div>

                <div class="card-body">
                    {!! Form::open(['route' => ['priorities.store']]) !!}
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
                            {!! Form::label('title', 'Priority', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, [ 'class' => 'form-control', ]) !!}
                        </div>

                        <div>
                            {!! Form::label('sort_no', 'Sort #', ['class' => 'control-label']) !!}
                            {!! Form::text('sort_no', null, [ 'class' => 'form-control', ]) !!}
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
