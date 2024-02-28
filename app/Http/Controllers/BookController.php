<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::all();
        return view('book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */

     public function create()
     {
          return view('book.create');
     }




    /**
      * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {

        $book = new Book();
        $book->designation = $request->input('designation');
        $book->description = $request->input('description', 'Pas de description');
        $book->prix = $request->input('prix', 0);
        $book->auteur = $request->input('auteur', 'Anonyme');

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension; // Corrected the syntax
            $file->move('uploads/cover/', $fileName);
            $book->cover = $fileName;
        } else {
            $book->cover = '';
        }



    if ($book->save()) {
        // La sauvegarde a réussi
        // Vous pouvez ajouter un message de succès
        return redirect()->route('book.index')->with([
            'message' => 'Livre ajouté avec succès!',
            'status' => 'success',
        ]);
    } else {
        // La sauvegarde a échoué
        // Vous pouvez ajouter un message d'erreur
        return redirect()->route('book.index')->with([
            'message' => 'Erreur lors de l\'ajout du livre.',
            'status' => 'error',
        ]);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $book=Book::findOrFail($id);
        return view('book.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $book=Book::findOrFail($id);
        return view('book.edite',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $book->designation = $request->input('designation');
        $book->description = $request->input('description', 'Pas de description');
        $book->prix = $request->input('prix', 0);
        $book->auteur = $request->input('auteur', 'Anonyme');

        if ($request->hasFile('cover'))
        {
            $editCover='uploads/cover/'.$book->cover;
            if(File::exists($editCover)) //oublier pas importer class fill use Illuminate\Support\Facades\File;

            {
                File::delete($editCover);
            }
            $file=$request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/cover/',$fileName);
            $book->cover=$fileName;

            

            } else {
                $fileName = $book->cover;
            }

        $book->update();

        return redirect()->route('book.index')->with([
            'message' => 'book updated successfully!',
            'status' => 'success'
        ]);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        // Rediriger vers la page de liste des livres (ou toute autre page de votre choix)
        return redirect()->route('book.index');
    }

    public function bookshow(){
        $books = Book::all(); // Récupérez tous les livres
        return view('book.bookshow', compact('books')); // Passez les livres à la view bookshow
    }
}
