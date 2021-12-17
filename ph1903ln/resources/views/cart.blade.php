


@extends('master')

@section('title','Dashboard')


@section('main')

         
         <div class="panel panel-default">
             <!-- Default panel contents -->
             <div class="panel-heading">Panel heading</div>
                 <div class="panel-body">
                     <p>Text goes here...</p>
                 </div>
         
                 <!-- Table -->
                 <table class="table">
                     <thead>
                         <tr>
                             <th>STT</th>
                             <th>Tên sản phẩm</th>
                             <th>Giá</th>
                             <th>Số lượng</th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 0; ?>
                         @foreach($cart->items as $item)
                         <tr>
                             <td>{{$i++}}</td>
                             <td>{{$item['name']}}</td>
                             <td>{{$item['price']}}</td>
                         
                             <td>
                                 <form action="{{route('cart.update',$item['id'])}}" method="get">
                                     <input type="number" name="quantity" value="{{$item['quantity']}}">
                                     <input type="submit" value = "update">
                                 </form>
                             </td>
                             <td>
                                 <a href="{{route('cart.remove',$item['id'])}}" class="btn btn-xs btn-danger">Remove</a>
                             </td>
                         </tr>
                         @endforeach
                       
                     </tbody>
                 </table>
                 
                 <div class="jumbotron">
                     <div class="container text-right">
                         <p>
                             <a class="btn btn-success btn-sm" href="{{route('home')}}">Tiếp tục mua hàng</a>
                             <a class="btn btn-danger btn-sm" href="{{route('cart.clear')}}">Clear All</a>
                             <a class="btn btn-primary btn-sm" href="{{route('checkout')}}">Đặt hàng</a>
                         </p>
                      
                        
                     </div>
                 </div>
                 
         </div>
         
@stop()
