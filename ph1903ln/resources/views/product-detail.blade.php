


@extends('master')

@section('title','detail')


@section('main')
        <?php
            $images = json_decode($model->image_list);
                                // dd(url('uploads').'/'.$model->image);
        ?>
        
        <div class="row">
            <div class="col-md-5">
                <img src="{{url('uploads').'/'.$model->image}}" alt="" style="width:100%;">
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
            <div class="col-md-7">
                <h1>{{$model->name}}</h1>
                <div>{{!!$model->content!!}}</div>
                <p>
                   
                    <form class="form-inline" action="" method="POST" role="form">
        
                        <div class="form-group">
                            <input type="number" class="form-control" name="quantity" placeholder="quantity">
                          
                        </div>
                        <button type="submit" class="btn btn-primary">add to cart</button>
                        
                    </form>
                    
                   
                </p>
            </div>
        </div>
        
@stop()

