@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Account info</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <section class="account-info">
                        <div>Naam: {{ $requested_user->name }}</div>
                        <div>E-mailadres: {{ $requested_user->email }}</div>
                        <div>Rol: {{ $requested_user->role->role }}</div>
                        <div>Aangemaakt op: {{ $requested_user->created_at }}</div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
