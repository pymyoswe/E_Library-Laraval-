@extends('template/layout')
@section('title')
    Login
@stop
@section('content')

    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Register
                </div>
                <div class="panel-body">

                    <form role="form" action="{{route('signIn')}}" method="post">
                        <div class="form-group">
                            @if($errors->has('userName'))<span class="help-block"></span>{{$errors->first('userName')}}
                                @endif
                            <input type="text" class="form-control" name="userName" id="userName" placeholder="User Name" value="{{old('userName')}}">
                        </div>
                        <div class="form-group">
                            @if($errors->has('password'))<span class="help-block"></span>{{$errors->first('password')}}
                            @endif
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary" name="btnLog" id="btnLog">Login</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>

    </div>

@stop
