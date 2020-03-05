@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div><a class="btn btn-success" href="{{ route('users.create') }}"><i class="fas fa-plus"></i> Create user</a></div>

                    <table class="table table-striped">
                        <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Role</th>
                            <th scope="col">Created</th>
                            <th scope="col" class="column__action"></th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->title }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td class="column-action">
                                        <div>
                                            @if($user->id == $loggedInUser->id || $loggedInUser->role_id == 1 || $loggedInUser->role_id == 2)
                                                <a class="btn btn-secondary" href="{{ route('users.edit', [$user->id]) }}"><i class="fas fa-edit"></i></a> 
                                            @endif
                                        </div>
                                        <div>
                                            @if(($loggedInUser->role_id == 1 || $loggedInUser->role_id == 2) && $user->role_id != 1 && $user->id != $loggedInUser->id)
                                                <a class="btn btn-danger" href="{{ route('users.delete', [$user->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $users->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
