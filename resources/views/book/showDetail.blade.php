@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background: gray; color:#f1f7fa; font-weight:bold;">
                    Détail Livre  {{$book->designation}}
                    <a href="{{ route('books')}}" class="btn btn-success btn-xs py-0 float-end">Retour</a>
                </div>
                <div class="card-body">

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Désignation</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">{{ $book->designation }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">{{ $book->description }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Prix</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">{{ $book->prix }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Auteur</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">{{ $book->auteur }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Couverture</label>
                        <div class="col-sm-9">
                            @if($book->cover)
                                <img src="{{ asset('uploads/cover/'.$book->cover) }}" alt="Couverture du livre" style="height: 50px; width:100px; margin-top:5px;">
                            @else
                                <p>Aucune couverture disponible</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
