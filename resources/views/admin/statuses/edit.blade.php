@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit status {{ $status->title }}</div>

                <div class="card-body">
                    {!! Form::open(['route' => ['statuses.update', $status->id]]) !!}
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
                            {!! Form::label('title', 'Status', ['class' => 'control-label']) !!}
                            {!! Form::text('title', $status->title, [ 'class' => 'form-control', ]) !!}
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
