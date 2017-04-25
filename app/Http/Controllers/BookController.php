<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;
use App\Book;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    //
    public function book(){
        $cats=Cat::all();
        $books=Book::orderBy('id','desc')->paginate('3');
        return view('books/books')->with(['bookCat'=>$cats])->with(['books'=>$books]);
    }
    public function category(){
        $cats=Cat::OrderBy('id','desc')->paginate('3');
        return view('books/category')->with(['cats'=>$cats]);
    }
    public function getBookCover($fileName){
        $file=Storage::disk('local')->get($fileName);
        return new Response($file, 200);
    }

    public function getBookFile($fileName){
        $file=Storage::disk('local')->get($fileName);
        return (new Response($file,200))->header('Content-Type','.pdf');
    }
    public function newCategory(Request $request){
        $this->validate($request,[
           'categoryName'=>'required|unique:cats'
        ]);
        $cats=new Cat();
        $cats->categoryName=$request['categoryName'];
        $cats->save();
        return redirect()->back();

    }
    public function deleteCategory($id){
        $cats=Cat::WHERE('id',$id)->first();
        $cats->delete();
        return redirect()->back();

    }
    public function updateCategory(Request $request){
        if($request['newCatName']){
            $id=$request['id'];
            $cats=Cat::WHERE('id',$id)->first();
            $cats->categoryName=$request['newCatName'];
            $cats->update();
            return redirect()->back();

        }else{
            return redirect()->back();
        }
    }

    public function newBook(Request $request){
        $this->validate($request,[
            'bookName'=>'required|unique:books',
            'authorName'=>'required',
            'cat_id'=>'required',
            'bookCover'=>'required',
            'bookFile'=>'required',


            ]);
        $book=new Book();
        $book->bookName=$request['bookName'];
        $book->authorName=$request['authorName'];
        $book->cat_id=$request['cat_id'];
        $book->bookCover=$request['bookName'].'.jpg';
        $book->bookFile=$request['bookName'].'.pdf';

        $coverFile=$request->file('bookCover');
        $coverName=$request['bookName'].'.jpg';
        Storage::disk('local')->put($coverName, File::get($coverFile));

        $fileFile=$request->file('bookFile');
        $fileName=$request['bookName'].'.pdf';
        Storage::disk('local')->put($fileName,File::get($fileFile));

        $book->save();


        return redirect()->back();
    }
    public function deleteBook($id){
        $books=Book::WHERE('id',$id)->first();
        $books->delete();
        return redirect()->back();

    }
    public function updateBook(Request $request){

        if($request['udBookCover'] && $request['udBookFile']){

            $id=$request['id'];
            $books=Book::WHERE('id',$id)->first();
            $books->bookName=$request['udBookName'];
            $books->authorName=$request['udAuthorName'];

            $books->bookCover=$request['udBookName'].'.jpg';
            $books->bookFile=$request['udBookName'].'.pdf';





            $udCoverFile=$request->file('udBookCover');
            $udCoverName=$request['udBookName'].'.jpg';
            Storage::disk('local')->put($udCoverName, File::get($udCoverFile));

            $udFileFile=$request->file('udBookFile');
            $udFileName=$request['udBookName'].'.pdf';
            Storage::disk('local')->put($udFileName,File::get($udFileFile));

            $books->update();
            return redirect()->back();


        }
        else{
            $id=$request['id'];
            $books=Book::WHERE('id',$id)->first();
            $books->bookName=$request['udBookName'];
            $books->authorName=$request['udAuthorName'];
            $books->update();
            return redirect()->back();
        }

    }
}
