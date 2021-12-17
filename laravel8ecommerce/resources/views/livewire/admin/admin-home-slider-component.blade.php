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
                        <div class="col-md-6">
                            All Slider
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addhomeslider') }}" class="btn btn-primary pull-right">Add New</a>
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
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Price</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                            <tr>

                                <td>{{ $slider->id }}</td>
                                <td><img src="{{ asset('assets/images/sliders/'.$slider->image) }}" width="60"></td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->subtitle }}</td>
                                <td>{{ $slider->price }}</td>
                                <td>{{ $slider->link }}</td>
                                <td>{{ $slider->status == 1 ? 'Active' : 'Inactive' }}</td>
                                <td>{{ $slider->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.edithomeslider',$slider->id) }}"><i class="fa fa-edit fa-2x"></i></a>
                                    <a wire:click.prevent="deleteSlider({{ $slider->id }})"  style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
