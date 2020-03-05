@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit priority {{ $priority->title }}</div>

                <div class="card-body">
                    {!! Form::open(['route' => ['priorities.update', $priority->id]]) !!}
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
                            {!! Form::label('title', 'Priority', ['class' => 'control-label']) !!}
                            {!! Form::text('title', $priority->title, [ 'class' => 'form-control', ]) !!}
                        </div>

                        <div>
                            {!! Form::label('sort_no', 'Sort #', ['class' => 'control-label']) !!}
                            {!! Form::text('sort_no', $priority->sort_no, [ 'class' => 'form-control', ]) !!}
                        </div>

                        <div>
                            {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
                        </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
