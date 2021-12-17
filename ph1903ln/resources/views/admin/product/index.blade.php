
@extends('admin/master')

@section('title','List product')
    


@section('main')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">productegory list</div>
      
      <form class='form-inline' action="" method="POST" role="form">
      
      
          <div class="form-group">
         
              <input type="text" class="form-control" name='search' placeholder="Input name">
          </div>
      
          <button type="submit" class="btn btn-primary">
                <i class="glyphicon glyphicon-search"></i>
          </button>
          <a href="{{route('product.create')}}" class='btn btn-success'>Add new</a>
      </form>
      
        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>category</th>
                    <th>status</th>
                    <th>action</th>
                
                </tr>
              
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td >
                    <div class="media">
                            <a class="pull-left" href="#">
                                <img width='50' class="media-object" src="{{url('uploads').'/'.$product->image}}" alt="Image">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$product->name}}</h4>
                                <p>{{$product->created_at->format('d-m-y')}}</p>
                            </div>
                        </div>
                    </td>                                        
                    <td>{{$product->cat->name}}</td>
                    <td>{{$product->status}}</td>
               
                    <td style="width:200px">
                        <form action="{{route('product.destroy',$product->id)}}" method='post'>
                            <input type="hidden" name='_method' value='delete'>
                            @csrf
                            <a class= 'btn btn-success' href="{{route('product.show',$product->id)}}">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class= 'btn btn-primary' href="{{route('product.edit',$product->id)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button onclick="return confirm('bạn có chắc không ?')" class= 'btn btn-danger'>
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                @endforeach    
                </tr>
            </tbody>
        </table>
</div>
@stop()


