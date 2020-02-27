@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('bug.create') }}">Bug toevoegen</a>

                    @foreach ($bugs as $bug) 
                        <p><a href="{{ route('bug.show', [$bug->id]) }}">{{ $bug->title }}</a></p>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
