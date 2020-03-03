@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bug toevoegen</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('bugs.store') }}" method="post">
                        @csrf

                        <label for="title">Bug Title</label>

                        <input id="title" name="title" type="text" required class="@error('title') is-invalid @enderror">

                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <input type="submit" id="submit" value="Toevoegen">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
