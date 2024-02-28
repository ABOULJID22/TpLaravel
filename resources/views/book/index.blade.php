@extends('layouts.app')

@section('content')
<div class="container">
<div class="section-top-border">

    <a href="{{ route('book.create') }}" class="btn btn-success mb-3">Ajouter un livre</a>
    <h3 class="mb-30">Liste des livres</h3>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>

                <th>Désignation</th>
                <th>Auteur</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>

                <td>{{ $book->designation }}</td>
                <td>{{ $book->auteur }}</td>
                <td>{{ $book->prix }} DH</td>
                <td>
                    @if($book->cover)
                        <img src="{{ asset('uploads/cover/'.$book->cover) }}" style="height: 50px; width: 100px;" alt="{{ $book->designation }}">
                    @else
                        <span>No image found!</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-secondary">Modifier</a>
                    <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary">View</a>
                    <form action="{{ route('book.destroy', $book->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
