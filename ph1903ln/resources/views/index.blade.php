


@extends('master')

@section('title','Dashboard')


@section('main')

         
                <div class="row">
                    <div class="col col-md-12">
                        <h2>New Product</h2>
                    </div>
                  @foreach($top_product as $tp)    
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="{{url('uploads').'/'.$tp->image}}" alt="">
                            <div class="caption text-center">
                                <h3>{{$tp->name}}</h3>
                                <p>
                                    @if($tp->sale_price > 0)
                                        <s> Old Price : {{number_format($tp->price)}} D</s> <br>
                                        <b>New Price : {{number_format($tp->sale_price)}} D </b>
                                    @else
                                        <b> Price : {{number_format($tp->price)}} D </b>
                                    @endif    
                                </p>
                                <p>
                                    <a href="{{route('view',$tp->slug)}}" class="btn btn-xs btn-primary">detail</a>
                                    <a href="{{route('cart.add',$tp->id)}}" class="btn btn-xs btn-default">Add to cart</a>
                                </p>
                            </div>
                        </div>
                    </div>
                  @endforeach  
                </div>
                <div class="row">
                    <div class="col col-md-12">
                        <h2>Sale Product</h2>
                    </div>
                  @foreach($sale_product as $tp)    
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="{{url('uploads').'/'.$tp->image}}" alt="">
                            <div class="caption text-center">
                                <h3>{{$tp->name}}</h3>
                                <p>
                                    @if($tp->sale_price > 0)
                                        <s> Old Price : {{number_format($tp->price)}} D</s> <br>
                                        <b>New Price : {{number_format($tp->sale_price)}} D </b>
                                    @else
                                        <b> Price : {{number_format($tp->price)}} D </b>
                                    @endif    
                                </p>
                                <p>
                                    <a href="#" class="btn btn-xs btn-primary">Action</a>
                                    <a href="#" class="btn btn-xs btn-default">Action</a>
                                </p>
                            </div>
                        </div>
                    </div>
                  @endforeach  
                </div>
         

@stop()
