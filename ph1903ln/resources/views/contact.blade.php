


@extends('master')

@section('title','404')


@section('main')
        
        
        <form action="" method="POST" role="form">
            <legend>Form contact</legend>
            @csrf
        
            <div class="form-group">
                <label for="">Họ Tên</label>
                <input type="text" class="form-control" name="name" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Email </label>
                <input type="text" class="form-control" name="email" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">phone </label>
                <input type="text" class="form-control" name="phone" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Content </label>
                <textarea  type="text" class="form-control" name="content" placeholder="Input field">cộng hòa xã hội chủ ngghia việt nam độc lập tự do hạnh phúc</textarea>
            </div>
        
            
        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
@stop()
