@extends('layouts.app')
@section('content')
<div class="container">

    <div class="section-top-border">
        <h3 class="mb-30">Ajouter un livre</h3>
        <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="designation">Désignation du livre:</label>
                <input type="text" name="designation" id="designation" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="prix">Prix:</label>
                <input type="number" name="prix" id="prix" class="form-control" step="0.01" value="0">
            </div>

            <div class="form-group">
                <label for="auteur">Auteur:</label>
                <input type="text" name="auteur" id="auteur" class="form-control" value="Anonyme">
            </div>

            <div class="form-group">
                <label for="cover">Couverture (nom de fichier):</label>
                <input type="file" name="cover" id="cover" class="form-control" value="no_cover.png">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter le livre</button>
        </form>
    </div>
</div>
    @endsection

