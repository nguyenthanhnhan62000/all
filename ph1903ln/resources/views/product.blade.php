


@extends('master')

@section('title','Dashboard')


@section('main')

          
                <div class="row">
                    <div class="col col-md-12">
                        <h2>Danh muc {{$model->name}}</h2>

                    </div>
                    @foreach($model->products as $product)    
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="{{url('uploads').'/'.$product->image}}" alt="">
                            <div class="caption text-center">
                                <h3>{{$product->name}}</h3>
                                <p>
                                    @if($product->sale_price > 0)
                                        <s> Old Price : {{number_format($product->price)}} D</s> <br>
                                        <b>New Price : {{number_format($product->sale_price)}} D </b>
                                      
                                    @else
                                        <b> Price : {{number_format($product->price)}} D </b>
                                    @endif    
                                </p>
                                <p>
                                    <a href="{{route('view',[$product->slug])}}" class="btn btn-xs btn-primary">Detail</a>
                                    <a href="#" class="btn btn-xs btn-default">Action</a>
                                </p>
                            </div>
                        </div>
                    </div>
                  @endforeach 
               
                </div>
                
            </div>

        </div>
@stop()
