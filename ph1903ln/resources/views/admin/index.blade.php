@extends('admin/master')

@section('title','Dashboard')


@section('main')

<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$product_count}}</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$cus_count}}<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$cus_count}}</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$cus_count}}</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
     
     <div class="panel panel-default">
         <!-- Default panel contents -->
         <div class="panel-heading">Đơn hàng mới</div>
             <div class="panel-body">
                
                <form action="" method="Get" class="form-inline" role="form">
                
                    <div class="form-group">
                        <input type="date" class="form-control" name="date_from" placeholder="Input field">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" name="date_to" placeholder="Input field">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
             </div>
     
             <!-- Table -->
             <table class="table">
                 <thead>
                     <tr>
                         <th>STT</th>
                         <th>Tên khách hàng</th>
                         <th>Ngày đặt</th>
                         <th>Tổng tiền</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach($orders as $od)
                     <tr>
                        <td>Content 2</td>
                         <td>{{$od->cus->name}}</td>
                         <td>{{$od->created_at}}</td>
                         <td></td>
                       
                     </tr>
                     @endforeach
                 </tbody>
             </table>
     </div>
      
@stop()
