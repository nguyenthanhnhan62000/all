@extends('admin/master')

@section('title','Add User')


@section('main')

    
    <form action="" method="POST" role="form">
        @csrf
        <legend>Form add new</legend>
    
        <div class="form-group">
            <label for=""> name </label>
            <input name='name' type="text" class="form-control"   placeholder="Input name">
            @if($errors->has('name'))
                    {{$errors->first('name')}}
            @endif
        </div>

        <div class="form-group">
            <label for="">email</label>
            <input name='email' type="text" class="form-control"   placeholder="Input email">
            @if($errors->has('email'))
                    {{$errors->first('email')}}
            @endif
        </div>

        <div class="form-group">
            <label for="">password</label>
            <input name='password' type="password" class="form-control"   placeholder="Input password">
            @if($errors->has('password'))
                    {{$errors->first('password')}}
            @endif
        </div>
        <div class="form-group">
            <label for="">confirm password</label>
            <input name='confirm_password' type="password" class="form-control"   placeholder="Input password">
            @if($errors->has('confirm_password'))
                    {{$errors->first('confirm_password')}}
            @endif
        </div>
          
      

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@stop()
