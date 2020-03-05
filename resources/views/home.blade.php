@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Bugs</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div><a class="btn btn-success" href="{{ route('bugs.create') }}"><i class="fas fa-plus"></i> Add bug</a></div>

                    <table class="table table-striped">
                        <thead>
                            <th scope="col">Bug</th>
                            <th scope="col">Initiator</th>
                            <th scope="col">Assigned To</th>
                            <th scope="col">Category</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created</th>
                            <th scope="col" class="column-action"></th>
                        </thead>
                        <tbody>
                            @foreach($bugs as $bug)
                                <tr>
                                    <td>{{ $bug->title }}</td>
                                    <td>{{ $bug->createdByUser->name }}</td>
                                    <td>
                                        @if($bug->assignedUser)
                                            {{ $bug->assignedUser->name }}
                                        @endif
                                    </td>
                                    <td>{{ $bug->category->title }}</td>
                                    <td>{{ $bug->priority->title }}</td>
                                    <td>{{ $bug->status->title }}</td>
                                    <td>{{ $bug->created_at }}</td>
                                    <td class="column-action">
                                        <div><a class="btn btn-primary" href="{{ route('bugs.show', [$bug->id]) }}"><i class="fas fa-search"></i></a></div>
                                        <div>
                                            @if($userMayEditBug && $bug->createdByUser->id == $loggedInUser->id || $loggedInUser->role_id == 1)
                                                <a class="btn btn-secondary" href="{{ route('bugs.edit', [$bug->id]) }}"><i class="fas fa-edit"></i></a> 
                                            @endif
                                        </div>
                                        <div>
                                            @if($userMayDeleteBug && $bug->createdByUser->id == $loggedInUser->id || $loggedInUser->role_id == 1)
                                                <a class="btn btn-danger" href="#"><i class="fas fa-trash-alt"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $bugs->links() }}

                    <!-- @foreach ($bugs as $bug) 
                        <p><a href="{{ route('bugs.show', [$bug->id]) }}">{{ $bug->title }} {{ $bug->category->title }}</a></p>
                    @endforeach -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
