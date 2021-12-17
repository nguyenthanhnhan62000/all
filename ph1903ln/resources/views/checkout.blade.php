


@extends('master')

@section('title','Dashboard')


@section('main')

    <div class="row">
        <div class="col-md-4">

    <form action="{{route('checkout')}}" method="POST" role="form">
         @csrf
        <legend>Form đặt hàng</legend>
    
        <div class="form-group">
            <label for="">Name</label>
            <input value="{{Auth::guard('cus')->user()->name}}" name='name' type="text" class="form-control" id="name"  placeholder="Input name">
         
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input value="{{Auth::guard('cus')->user()->email}}" name='email' type="email" class="form-control" id="name"  placeholder="Input name">
         
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            <input value="{{Auth::guard('cus')->user()->phone}}" name='phone' type="text" class="form-control" id="name"  placeholder="Input name">
         
        </div>
        <div class="form-group">
            <label for="">address</label>
            <input value="{{Auth::guard('cus')->user()->address}}" name='address' type="text" class="form-control" id="name"  placeholder="Input name">
         
        </div>
        <div class="form-group">
            <label for="">order note</label>
            <input name='order_note' type="text" class="form-control" placeholder="Input name">
         
        </div>
        <button type="submit" class="btn btn-primary">Đặt hàng</button>
    </form>

         </div>
        <div class="col-md-8">
            <table class="table table-bordered table-hover">
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
                                <td>{{$item['quantity']}}</td>
                                
                            
                            </tr>
                            @endforeach
                        
                        </tbody>
            </table>
            <div class="text-right">
                <h2>Tổng tiền : {{number_format($cart->total_price)}} Đ</h2>
               
                       
            </div>
        </div>     
    </div>

         
@stop()
