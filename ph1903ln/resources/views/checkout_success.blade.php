


@extends('master')

@section('title','404')


@section('main')
        
        <div class="jumbotron">
            <div class="container">
                <h1>order SUCCESS</h1>
                <p>Vui lòng check mail <b>{{auth()->guard('cus')->user()->email}}</b></p>
                <p>
                    <a class="btn btn-primary btn-lg">Learn more</a>
                </p>
            </div>
        </div>
        
@stop()
