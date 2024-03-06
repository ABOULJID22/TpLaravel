@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-oZ3Pn3gVHBEh5L7aWlO12TRo7EGZZl6iZ9L3QDkH4jW8U3f7bpFm3F/xq10Ah/dA" crossorigin="anonymous">

@section('content')
<div class="container">
<div class="book-list">
    <h3 class="section-title">Liste des Livres</h3>

    <div class="row">
        @foreach ($books as $book)
        <div class="col-3  mb-2">
            <div class="book-card " >
                <div class="book-image">
                    @if($book->cover)
                    <img src="{{ asset('uploads/cover/'.$book->cover) }}" alt="{{ $book->designation }}">
                    @else
                    <span class="no-image">Image non disponible</span>
                    @endif

                    {{-- Telechargement les images --}}
                    <div class="download-buttons">
                        @if($book->cover)
                            <span class="download-span">
                                <a href="{{ asset('uploads/cover/'.$book->cover) }}" download="{{ $book->designation }}.jpg" class="btn btn-info">
                                    <i class="fas fa-download">download</i>
                                </a>
                            </span>
                        @endif
                    </div>


                </div>
                <div class="book-details">
                    <h4 class="book-title">{{ $book->designation }}</h4>
                    <p class="book-author">{{ $book->auteur }}</p>
                    <p class="book-price">{{ $book->prix }} DH</p>
                </div>
                <div class="book-actions">
                    <a href="" class="btn btn-primary">Acheter</a>
                    <button class="btn btn-success">Favoris</button>

 <a href="{{ route('book.showDetail', $book->id) }}" class="btn btn-danger">Détails</a>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>

<style>


    .book-image img {
        max-width: 200px;
        height: 130px;
    }


</style>

@endsection

