@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background: gray; color:#f1f7fa; font-weight:bold;">
                    Modifier un livre
                    <a href="{{ route('book.index') }}" class="btn btn-success btn-xs py-0 float-end">Retour</a>
                </div>
                 <div class="card-body">
                    <form class="w-px-500 p-3 p-md-3" action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Désignation</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" placeholder="Désignation" value="{{ $book->designation }}" required>
                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description">{{ $book->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Prix</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" placeholder="Prix" value="{{ $book->prix }}" step="0.01" required>
                                @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Auteur</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="auteur" placeholder="Auteur" value="{{ $book->auteur }}">
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Couverture</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover">
                                @if($book->cover)
                                    <img src="{{ asset('uploads/cover/'.$book->cover) }}" style="height: 50px;width:100px; margin-top:5px;" alt="Couverture du livre">
                                @else
                                    <span>Aucune image trouvée !</span>
                                @endif
                                @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Couverture</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover" onchange="previewImage(this)">
                                <img id="coverPreview" style="height: 50px; width:100px; margin-top:5px; display:none;" alt="Prévisualisation de la couverture">
                                @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-secondary btn-block text-danger">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage(input) {
        var preview = document.getElementById('coverPreview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>

@endsection
