@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Bug</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('bugs.store') }}" enctype="multipart/form-data">
                        @csrf

                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div>
                            <label for="title">Bug Title</label>
                            <input id="title" name="title" type="text" required class="form-control @error('title') is-invalid @enderror">
                        </div>

                        <div>
                            <label for="category">Category</label>
                            <select id="category" name="category" required class="form-control">
                                <option value="">Choose category</option>
                                @foreach($categories as $category) 
                                    <option vale="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="priority">Priority</label>
                            <select id="priority" name="priority" class="form-control">
                                <option value="">Choose priority</option>
                                @foreach($priorities as $priority) 
                                    <option vale="{{ $priority->id }}">{{ $priority->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="resolution">Resolution</label>
                            <select id="resolution" name="resolution" required class="form-control">
                                <option value="">Choose resolution</option>
                                @foreach($resolutions as $resolution) 
                                    <option vale="{{ $resolution->id }}">{{ $resolution->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="description">Description</label>
                            <textarea id="description" name="description" required class="form-control summernote"></textarea>
                        </div>

                        <div>
                            <label for="file">Add file(s)</label>
                            <input id="file" name="file" type="file"class="form-control">
                        </div>

                        <div>
                            <input class="btn btn-success" type="submit" id="submit" value="Add bug">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
