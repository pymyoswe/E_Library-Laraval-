<?php

namespace App\Http\Controllers;

use App\Book;
use App\Cat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //
    public function toHome(){
        $cats=Cat::all();
        $books=Book::OrderBy('id','desc')->paginate('6');
        return view('home')->with(['cats'=>$cats])->with(['books'=>$books]);
    }


    public function getBookCover($fileName){
        $file=Storage::disk('local')->get($fileName);
        return new Response($file, 200);

    }

    public function getBookDownload($bookFile){
        $file=Storage::disk('local')->get($bookFile);
        return (new Response($file,200))->header('Content-Type','.pdf');
    }

    public function viewByCategory($catId){
        $cats=Cat::all();
        $books=Book::WHERE('cat_id',$catId)->paginate('6');
        return view('home')->with(['cats'=>$cats])->with(['books'=>$books]);



    }
}
