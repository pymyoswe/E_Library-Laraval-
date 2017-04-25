@extends('template/layout')
@section('title')
    Categories
@stop
@section('content')

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Categories
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Categories List
                                </div>
                                <div class="panel-body">

                                    @foreach($cats as $c)
                                        <ul class="list-group">
                                            <li class="list-group-item">{{$c->categoryName}}
                                                <span class="pull-right">
                                                    <div class="btn-group">
                                                        <a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-edit"></span> Edit
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <form role="form" action="{{route('updateCategory')}}" method="post">
                                                                        <input type="text" class="form-control" name="newCatName" id="newCatName">
                                                                        <input type="hidden" value="{{$c->id}}" name="id" id="id">
                                                                        <button type="submit" class="btn btn-block btn-success">Save</button>
                                                                    {{csrf_field()}}

                                                                </form>
                                                            </li>

                                                        </ul>
                                                    </div>  |
                                                    <a href="{{route('deleteCategory',['id'=>$c->id])}}"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
                                                </span>
                                            </li>
                                        </ul>
                                        @endforeach
                                    <div class="paginate">{{$cats->links()}}</div>


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                   New Category
                                </div>
                                <div class="panel-body">

                                    <form role="form" action="{{route('newCategory')}}" method="post" class="clearfix">
                                        <div class="form-group @if($errors->has('categoryName')) has-error @endif">
                                            @if($errors->has('categoryName'))<span class="help-block">{{$errors->first('categoryName')}}</span>
                                                @endif
                                            <input type="text" class="form-control" name="categoryName" id="categoryName" placeholder="Name">

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