@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Bug - {{ $bug->title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div><h1>{{ $bug->title }}</h1></div>

                    <div>BugID: {{ $bug->id }}</div>
                    <div>Created by: {{ $bug->createdByUser->name }}</div>
                    <div>Created: {{ $bug->created_at }}</div>
                    <div>Assigned to: 
                        @if($bug->assignedUser->name)
                            {{ $bug->assignedUser->name }}
                        @endif
                    </div>
                    <div>Priority: {{ $bug->priority->title }}</div>
                    <div>Category: {{ $bug->category->title }}</div>
                    <div>Status: {{ $bug->status->title }}</div>

                    <div>Description: </div>
                    <div>{!! $bug->description !!}</div>

                    <div><hr></div>

                    @foreach($comments as $comment)
                        <div class="comment">
                            <div>Commentor: {{ $comment->user->name }}</div>
                            <div>Commented on: {{ $comment->created_at }}</div>
                            <div>{!! $comment->comment !!}</div>
                        </div>
                    @endforeach

                    {!! Form::open(['route' => ['comments.store']]) !!}
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
                            {!! Form::label('comment', 'Place comment', ['class' => 'control-label']) !!}
                            {!! Form::textarea('comment', null, [ 'class' => 'form-control summernote', ]) !!}
                        </div>

                        <div>
                            {!! Form::hidden('bugId', $bug->id) !!}
                            {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
