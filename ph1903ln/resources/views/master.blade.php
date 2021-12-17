


     <!DOCTYPE html>
     <html lang="en">
     <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Document</title>
            
        <link rel="stylesheet" href="{{url('/public/admin')}}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('/public/admin')}}/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{url('/public/admin')}}/css/AdminLTE.css">
        <link rel="stylesheet" href="{{url('/public/admin')}}/css/_all-skins.min.css">
        <link rel="stylesheet" href="{{url('/public/admin')}}/css/style.css" />
     </head>
     <body>
            
            <nav class="navbar navbar-inverse">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="container">

                    <a class="navbar-brand" href="#">Title</a>
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="{{route('home')}}">HOME</a>
                        </li>
                        <li >
                            <a href="{{route('about')}}">ABOUT</a>
                        </li>
                        <li >
                            <a href="{{route('contact')}}">CONTACT</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{route('cart.view')}}">Giỏ hàng (
                                {{$cart->total_quantity}} - 
                                {{number_format($cart->total_price)}} 
                                )</a>
                        </li>
                      
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::guard('cus')->check())
                        <li class="active">
                            <a href="">{{Auth::guard('cus')->user()->name}}</a>
                        </li>
                        <li class="active">
                            <a href="{{route('home.logout')}}">Logout</a>
                        </li>
                        @else
                        <li class="active">
                            <a href="{{route('home.login')}}">Login</a>
                        </li>
                        @endif
                      
                    </ul>
                </div>
            
              
            </nav>
            <div class="container">
                <div class="row">
                <div class="col col-md-3">
                    
                    <div class="panel panel-primary">
                          <div class="panel-heading">
                                <h3 class="panel-title">Category</h3>
                          </div>
                          <div class="panel-body">
                                
                                <ul class="list-group">
                                    @foreach($category as $cat)
                                    <li class="list-group-item">
                                        <span class="badge">{{$cat->products->count()}}</span>
                                        <a href="{{route('view',[$cat->slug])}}">{{$cat->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                
                          </div>
                    </div>
                    
            </div>
                    <div class="col-md-9">
                     @yield('main')
                    </div>
                </div>
          
            </div>
         
     </body>
     </html>