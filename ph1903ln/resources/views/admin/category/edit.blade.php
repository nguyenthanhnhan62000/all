@extends('admin/master')

@section('title','Edit Category: '.$model->name)
    

@section('main')

    
    <form action="{{route('category.update',$model->id)}}" method="POST" role="form">
        @csrf
        <input type="hidden"  name ='_method' value="PUT">
        <legend>Form edit</legend>
    
        <div class="form-group">
            <label for="">Category name </label>
            <input name='name' type="text" class="form-control" value='{{$model->name}}' placeholder="Input field">
        </div>
        <div class="form-group">
            <label for="">Status</label>
           
           <div class="radio">
               <label>
                   <input type="radio" name="status"  value="0" checked="checked">
                   public
               </label>
               <label>
                   <input type="radio" name="status"  value="1" >
                   private
               </label>
           </div>
           
        </div>
    
        
    
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    

@stop()