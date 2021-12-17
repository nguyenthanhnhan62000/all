@extends('admin/master')

@section('title','File manager')


@section('main')

    
    <div class="box-body">
        <iframe src="{{url('/file/dialog.php?akey=123456')}}" style="width:100%; height:500px; border: 0 ;
        over-flow-y:auto" >
        </iframe>
    </div>
    


@stop()
