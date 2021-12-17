
@extends('admin/master')

@section('title','List User')
    


@section('main')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"> list User </div>
      
      <form class='form-inline' action="" method="POST" role="form">
      
      
          <div class="form-group">
         
              <input type="text" class="form-control" name='search' placeholder="Input name">
          </div>
      
          <button type="submit" class="btn btn-primary">
                <i class="glyphicon glyphicon-search"></i>
          </button>
          <a href="{{route('user.create')}}" class='btn btn-success'>Add new</a>
      </form>
      
        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>create_at</th>
                    <th>action</th>
                
                </tr>
              
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <a class= 'btn btn-success' href="{{route('user.edit',$user->id)}}">Edit</a>
                        <a onclick="return confirm('bạn có chắc không ?')" class= 'btn btn-danger' href="{{route('user.destroy',$user->id)}} ">Delete</a>
                    </td>
                @endforeach    
                </tr>
            </tbody>
        </table>
</div>
@stop()


