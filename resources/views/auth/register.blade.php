@extends('template/layout')
@section('title')
    Register
@stop
@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Register
                </div>
                <div class="panel-body">

                    <form role="form" action="{{route('signUp')}}" method="post">
                        <div class="form-group">
                            @if($errors->has('userName'))<span class="help-block">{{$errors->first('userName')}}</span>
                            @endif
                            <input type="text" class="form-control" name="userName" id="userName" placeholder="User Name" value="{{old('userName')}}">
                        </div>
                        <div class="form-group">
                            @if($errors->has('email'))<span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"  value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            @if($errors->has('password'))<span class="help-block">{{$errors->first('password')}}</span>
                            @endif
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password"  value="{{old('password')}}">
                        </div>
                        <div class="form-group">
                            @if($errors->has('confirmPassword'))<span class="help-block">{{$errors->first('confirmPassword')}}</span>
                            @endif
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm password"  value="{{old('confirmPassword')}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary" name="btnReg" id="btnReg">Register</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>

    </div>

@stop