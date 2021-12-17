
@extends('admin/master')

@section('title','List category')
    


@section('main')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Category list</div>
      
      <form class='form-inline' action="" method="POST" role="form">
      
      
          <div class="form-group">
         
              <input type="text" class="form-control" name='search' placeholder="Input name">
          </div>
      
          <button type="submit" class="btn btn-primary">
                <i class="glyphicon glyphicon-search"></i>
          </button>
          <a href="{{route('category.create')}}" class='btn btn-success'>Add new</a>
      </form>
      
        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>Total Product</th>
                    <th>status</th>
                    <th>create_at</th>
                    <th>action</th>
                
                </tr>
              
            </thead>
            <tbody>
               
               
                <?php TableCategories($cats)?>
            </tbody>
        </table>
</div>
@stop()

<?php
        function TableCategories($categories, $parent_id = 0, $char = '')
        {
            foreach ($categories as $key => $item)
            {
                // Nếu là chuyên mục con thì hiển thị
                if ($item['parent_id'] == $parent_id)
                {
                    
                    echo '<tr>';
                        echo '<td>'.$item->id.'</td>';
                        echo '<td>'.$char.$item->name.'</td>';
                        echo '<td>'.$item->products->count().'</td>';
                        echo '<td>'.$item->stats.'</td>';
                        echo '<td>'.$item->created_at.'</td>';
                        echo '<td>';
                            echo   '<form action="'.route('category.destroy',$item->id).'" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    '.csrf_field().'
                                    <button onclick="return confirm("bạn có chắc không ?")" class= "btn btn-danger">Delete</button>
                                    <a class= "btn btn-success" href="'.route('category.edit',$item->id).'">Edit</a>
                                    </form>';

                        echo '</td>';
                    echo '</tr>';
                     
                    // Xóa chuyên mục đã lặp
                    unset($categories[$key]);
                     
                    // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                    TableCategories($categories, $item['id'], $char.'--');
                }
            }
        }


?>


