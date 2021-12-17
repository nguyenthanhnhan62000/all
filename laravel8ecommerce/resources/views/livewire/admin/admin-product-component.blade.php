<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: none !important;
        }
    </style>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-heading">
                    <div class="row">
                        <div class="col-md-4">
                            All Product
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.addproduct') }}" class="btn btn-primary pull-right">Add New</a>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Search..." wire:model="searchTerm">    
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Sale Price</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>

                                <td>{{ $product->id }}</td>
                                <td><img src="{{ asset('assets/images/products/'.$product->image) }}" width="60"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->stock_status }}</td>
                                <td>{{ $product->regular_price }}</td>
                                <td>{{ $product->sale_price }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.editproduct',$product->slug) }}"><i class="fa fa-edit fa-2x"></i></a>
                                    <a onclick="confirm('Are you sure you want to delete this product') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{ $product->id }})"  style="margin-left:10px"><i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
