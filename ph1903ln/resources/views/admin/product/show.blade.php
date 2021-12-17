@extends('admin/master')

@section('title','show product')


@section('main')
    <?php
            $images = json_decode($model->image_list);
            // dd(url('uploads').'/'.$model->image);
    ?>

    <div class="box-body">
        <div class="row">
            <div class="col col-md-5">
                <img style="width:100%;height:400px" src="{{url('uploads').'/'.$model->image}}">
                    @if(is_array($images))
                        <div class="row">
                        @foreach($images as $image)
                            <div class="col col-md-4">
                                <img src="{{$image}}" style="width:100%;height:100px">
                            </div>
                        @endforeach
                    </div>                        
                    @endif
            </div>
            <div class="col col-md-7">
                    <h3>{{$model->name}}</h3>
            </div>
        </div>
        
    </div>

@stop()
