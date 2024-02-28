@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Panneau d’administration') }}</div>
                <div class="card-body">
                <h3>Vous êtes connecté en tant qu’administrateur</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
