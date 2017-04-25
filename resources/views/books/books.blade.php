@extends('template/layout')
@section('title')
    Books
@stop
@section('content')

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Books</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Books List</div>

                                <div class="panel-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">Book Cover | Book Name | Author | Download</li>
                                    </ul>

                                    @foreach($books as $b)
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <img src="{{route('bookCover',['fileName'=>$b->bookCover])}}" class="img-circle" width="50px"> |{{$b->bookName}} | {{$b->authorName}} |
                                                <a href="{{route('bookFile',['fileName'=>$b->bookFile])}}">Download</a>
                                                <span class="pull-right">
                                                    <div class="btn-group">
                                                        <a href="" data-toggle="dropdown"><span class="glyphicon glyphicon-edit"></span> Edit</a>

                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <form role="form" action="{{route('updateBook')}}" method="post" enctype="multipart/form-data">
                                                                    <input type="text" class="form-control" name="udBookName" id="udBookName" placeholder="Book Name" value="{{$b->bookName}}">
                                                                    <input type="text" class="form-control" name="udAuthorName" id="udAuthorName" placeholder="Author Name" value="{{$b->authorName}}">
                                                                    <input type="file" name="udBookCover" id="udBookCover">
                                                                    <input type="file" name="udBookFile" id="udBookFile" >
                                                                    <input type="hidden" value="{{$b->id}}" name="id" id="id">
                                                                    <button type="submit" class="btn btn-success">Save</button>
                                                                    {{csrf_field()}}
                                                                </form>


                                                            </li>
                                                        </ul>
                                                    </div>
                                                       <a href="{{route('deleteBook',['id'=>$b->id])}}"><span class="glyphicon glyphicon-remove-sign"></span> Delete</a>
                                                </span>
                                            </li>
                                        </ul>

                                        @endforeach
                                    {{$books->links()}}



                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">New Book</div>
                                <div class="panel-body">
                                    <form role="form" action="{{route('newBook')}}" method="post" class="clearfix" enctype="multipart/form-data">
                                        <div class="form-group @if($errors->has('bookName')) has-error @endif">
                                            @if($errors->has('bookName'))<span class="help-block">{{$errors->first('bookName')}}</span>
                                            @endif
                                            <input type="text" class="form-control" name="bookName" id="bookName" placeholder="Name" value="{{old('bookName')}}">

                                        </div>
                                        <div class="form-group @if($errors->has('authorName')) has-error @endif">
                                            @if($errors->has('authorName'))<span class="help-block">{{$errors->first('authorName')}}</span>
                                            @endif
                                            <input type="text" class="form-control" name="authorName" id="authorName" placeholder="Author" value="{{old('authorName')}}">

                                        </div>
                                        <div class="form-group">
                                            Select category
                                            <select name="cat_id" id="cat_id">
                                                @foreach($bookCat as $c)
                                                    <option value="{{$c->id}}">{{$c->categoryName}}</option>
                                                    @endforeach


                                            </select>
                                        </div>
                                        <div class="form-group @if($errors->has('bookCover')) has-error @endif">
                                            Book Cover
                                            @if($errors->has('bookCover'))<span class="help-block">{{$errors->first('bookCover')}}</span>
                                            @endif
                                            <input type="file" name="bookCover" id="bookCover">

                                        </div>
                                        <div class="form-group @if($errors->has('bookFile')) has-error @endif">
                                            Book File
                                            @if($errors->has('bookFile'))<span class="help-block">{{$errors->first('bookFile')}}</span>
                                            @endif
                                            <input type="file" name="bookFile" id="bookFile">

                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm pull-right btn-primary">Save</button>

                                        </div>
                                        {{csrf_field()}}
                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

@stop