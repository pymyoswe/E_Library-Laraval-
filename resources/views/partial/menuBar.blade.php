<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('/')}}">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                @foreach($cats as $c)
                    <li><a href="{{route('viewByCat',['category'=>$c->id])}}">{{$c->categoryName}}</a> </li>
                    @endforeach

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="row" id="bookThumb">

    @foreach($books as $b)



    <div class="col-sm-8 col-md-4">
        <div class="thumbnail clearfix">
            <img src="{{route('bookCoverView',['fileName'=>$b->bookCover])}}" class="img-thumbnail" alt="..." width="100px">
            <div class="caption">
                <h3>{{$b->bookName}}</h3>
                <p>Author: {{$b->authorName}}</p>
                <p>Upload Date : {{date('d/m/Y, h:i:A',strtotime($b->created_at))}} </p>
                <p><a href="{{route('bookDownload',['bookFile'=>$b->bookFile])}}" target="_blank" class="btn btn-primary btn-sm" role="button"> <span class="glyphicon glyphicon-download"></span> Download</a></p>
            </div>
        </div>
    </div>

        @endforeach
    {{$books->links()}}


</div>