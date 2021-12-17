
<div>
<style>
        nav svg{
            height: 20px
        }
        nav .hidden{
            display: block !important;
        }
    </style> 
        <div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>All slider</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>All slider</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-central">
            <div class="content_info">
                <div class="paddings-mini">
                    <div class="container">
                        <div class="row portfolioContainer">
                            <div class="col-md-12 profile1">
                                
                                <div class="panel panel-default">
                                      <div class="panel-heading">
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <h3 class="panel-title">All slider</h3>
                                              </div>
                                              <div class="col-md-6">
                                                  <a href="{{ route('admin.add_slider') }}" class="btn btn-info pull-right">Add New Slider</a> 
                                              </div>

                                          </div>
                                      </div>
                                      <div class="panel-body">
                                        @if (session()->has('message'))
                                            <div class="alert alert-success">
                                                {{ session('message') }}
                                            </div>
                                        @endif
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Status</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sliders as $slider)
                                                <tr>
                                                    <td>{{ $slider->id }}</td>
                                                    <td><img src="{{ asset('images/slider/'.$slider->image) }}" width="60"></td>
                                                    <td>{{ $slider->title }}</td>
                                                    <td>
                                                        @if ($slider->status)
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif        
                                                    </td>
                                                    <td>{{ $slider->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.edit_slider',$slider->id) }}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                                        <a href="#" wire:click.prevent="deleteSlider({{ $slider->id }})"  onclick="return confirm('Are you sure you want to delete this category')"><i class="fa fa-times fa-2x text-info"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                      </div>
                                </div>
                                {{ $sliders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>    
</div>