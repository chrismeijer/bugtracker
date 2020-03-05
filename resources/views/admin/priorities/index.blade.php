@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Priorities</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div><a class="btn btn-success" href="{{ route('priorities.create') }}"><i class="fas fa-plus"></i> Create priority</a></div>

                    <table class="table table-striped">
                        <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Sort #</th>
                            <th scope="col" class="column-action"></th>
                        </thead>
                        <tbody>
                            @foreach($priorities as $priority)
                                <tr>
                                    <td>{{ $priority->id }}</td>
                                    <td>{{ $priority->title }}</td>
                                    <td>{{ $priority->sort_no }}</td>
                                    <td class="column-action">
                                        <div>
                                            <a class="btn btn-secondary" href="{{ route('priorities.edit', [$priority->id]) }}"><i class="fas fa-edit"></i></a> 
                                        </div>
                                        <div>
                                            <a class="btn btn-danger" href="{{ route('priorities.delete', [$priority->id]) }}"><i class="fas fa-trash-alt"></i></a>
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
