@extends('layouts.app')
@section('content')
<div class="section-top-border">
    <h3 class="mb-30" >Liste des livres</h3>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                @if($book->cover)
                <img src="{{ asset('uploads/cover/'.$book->cover) }}">
                 @else
                <span>No image found!</span>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $book->designation }}</h5>
                    <p class="card-text">{{ $book->auteur }}</p>
                    <p class="card-text">{{ $book->prix }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('book.destroy', $book->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
