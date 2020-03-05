@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Resolutions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div><a class="btn btn-success" href="{{ route('resolutions.create') }}"><i class="fas fa-plus"></i> Create resolution</a></div>

                    <table class="table table-striped">
                        <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Resolution</th>
                            <th scope="col" class="column-action"></th>
                        </thead>
                        <tbody>
                            @foreach($resolutions as $resolution)
                                <tr>
                                    <td>{{ $resolution->id }}</td>
                                    <td>{{ $resolution->title }}</td>
                                    <td class="column-action">
                                        <div>
                                            <a class="btn btn-secondary" href="{{ route('resolutions.edit', [$resolution->id]) }}"><i class="fas fa-edit"></i></a> 
                                        </div>
                                        <div>
                                            <a class="btn btn-danger" href="{{ route('resolutions.delete', [$resolution->id]) }}"><i class="fas fa-trash-alt"></i></a>
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
