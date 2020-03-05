@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Roles</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div><a class="btn btn-success" href="{{ route('roles.create') }}"><i class="fas fa-plus"></i> Create role</a></div>

                    <table class="table table-striped">
                        <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Role</th>
                            <th scope="col" class="column-action"></th>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->title }}</td>
                                    <td class="column-action">
                                        <div>
                                            <a class="btn btn-secondary" href="{{ route('roles.edit', [$role->id]) }}"><i class="fas fa-edit"></i></a> 
                                        </div>
                                        <div>
                                            <a class="btn btn-danger" href="{{ route('roles.delete', [$role->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
