@extends('admin/master')

@section('title','Add product')


@section('main')

    <div class="box-body">
        
        <form action="{{route('product.store')}}" method="POST" role="form">
            @csrf
            <div class="row">
                <div class="col col-md-9">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" id='name' class="form-control" name='name' placeholder="Input name">
                        @if($errors->has('name'))
                                {{$errors->first('name')}}
                        @endif
                    </div>
              
                    <div class="form-group">
                        <label for="">Đường dân SEO</label>
                        <input type="text" id='slug' class="form-control" name='slug' placeholder="Input name">
                        @if($errors->has('slug'))
                                {{$errors->first('slug')}}
                        @endif
                    </div>
              
                     <div class="form-group">
                        <label for="">Nội dung</label>
                        <textarea  class="form-control" name='content' id='content' placeholder="Input content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Các ảnh khác 
                             <a href="#modal-files" data-toggle ='modal' class="btn btn-default">Select</a>
                        </label>
                        <input class="form-control" type="text" name='image_list' id='image_list'>
                        <div class="row" id='image_show_list'>
                            
                       
                            

                        </div>
                    </div>
                </div>
                <div class="col col-md-3">
                  
                        <div class="form-group">
                            <label for="">Danh mục sản phẩm</label>
                            <select name="category_id" class="form-control" required="required">
                               <?php
                                     showCategories($cats);
                               ?>
                              
                            </select>
                        </div>
                     
                        <div class="form-group">
                            <label for="">Giá sản phẩm</label>
                            <input type="text" class="form-control" name='price' placeholder="Input name">
                            @if($errors->has('price'))
                                    {{$errors->first('price')}}
                            @endif
                        </div>  
                        <div class="form-group">
                            <label for="">Giá khuyến mãi</label>
                            <input type="text" class="form-control" name='sale_price' placeholder="Input name">
                            @if($errors->has('sale_price'))
                                    {{$errors->first('sale_price')}}
                            @endif
                        </div>  


                    
                        <div class="form-group">
                            <label for="">Thạng thái </label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status"  value="1" checked="checked">
                                    Hiển thị
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status"  value="0" >
                                    Ẩn
                                </label>
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh sản phẩm</label>
                            
                            <div class="input-group">
                             <input type="text" id='image' class="form-control" name='image' placeholder="Input image">
                            
                            <span class="input-group-btn">
                                <a href="#modal-file" data-toggle ='modal' class="btn btn-default">Select</a>
                            </span>
                          
                            </div>
                            <img style="width:100%;height:100px" id='show_img' alt="ảnh hiển thị">    
                        </div>   
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        
           
        
            
        
          
        </form>
        
    </div>

@stop()
@section('js')

<div class="modal fade" id="modal-file">
    <div class="modal-dialog" style='width:85%;height:500px'>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Quản lí File</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
            <iframe src="{{url('/file/dialog.php?akey=123456&field_id=image')}}" style="width:100%; height:500px; border: 0 ;
                over-flow-y:auto" >
            </iframe>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-files">
    <div class="modal-dialog" style='width:85%;height:500px'>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Quản lí File</h4>
            </div>
            <div class="modal-body">
               
            </div>
            <div class="modal-footer">
            <iframe src="{{url('/file/dialog.php?akey=123456&field_id=image_list')}}" style="width:100%; height:500px; border: 0 ;
                over-flow-y:auto" >
            </iframe>
            </div>
        </div>
    </div>
</div>


<script src="{{url('/public/admin')}}/js/slug.js"></script>
<script src="{{url('/public/admin')}}/tinymce/tinymce.min.js"></script>
<script src="{{url('/public/admin')}}/tinymce/config.js"></script>

<script>
        $('#modal-file').on('hide.bs.modal',function(){
                var _img = $('input#image').val();
                $('img#show_img').attr('src',_img);
        })
        $('#modal-files').on('hide.bs.modal',function(){
                var _img = $('input#image_list').val();
                // $('img#show_img').attr('src',_img);
                var img_list = JSON.parse(_img);
                var html = '';
                for (let i = 0; i < img_list.length; i++) {
                    html += '<div class="col-md-3 thumbnail">';
                    html += ' <img style="width:100%;height:100px" src="'+img_list[i]+'" alt="">';   
                    html += '</div>';
                    
                }
                $('#image_show_list').html(html);      
        })
</script>
@stop()
<?php
function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item)
    {
        if ($item->parent_id == $parent_id)
        {
            echo '<option value="'.$item->id.'">'.$char.$item->name.'</option>';
            unset($categories[$key]);

            showCategories($categories, $item->id, $char.'--');
        }
    }
}
?>