@extends('admin/master')

@section('title','Add Category')


@section('main')

    
    <form action="{{route('category.store')}}" method="POST" role="form">
         @csrf
        <legend>Form add new</legend>
    
        <div class="form-group">
            <label for="">Category name </label>
            <input name='name' type="text" class="form-control" id="name"  placeholder="Input name">
            @if($errors->has('name'))
                    {{$errors->first('name')}}
            @endif
        </div>

        <div class="form-group">
            <label for="">Category slug </label>
            <input name='slug' type="text" class="form-control" id="slug"  placeholder="Input slug">
        </div>
        <div class="form-group">
            <label for="">Parent category</label>

            
            <select name="parent_id"  class="form-control" required="required">
                <option value="0">Parent</option>
                @foreach($category as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
            
           
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
@section('js')
<script src="{{url('/public/admin')}}/js/slug.js"></script>
@stop()