
<div>
    <div class="section-title-01 honmob">
                <style>
                nav svg{
                    height: 20px
                }
                nav .hidden{
                    display: block !important;
                }
            </style> 
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Add Service</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Add Service</li>
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
                            <div class="col-md-8 col-md-offset-2 profile1">
                                
                                <div class="panel panel-default">
                                      <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h3 class="panel-title">Add New Service</h3>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ route('admin.all_services') }}" class="btn btn-info pull-right">All Service</a> 
                                                </div>
                                            </div>
                                      </div>
                                      <div class="panel-body">
                                          @if (session()->has('message'))<div class="alert alert-success">  {{ session('message') }}</div> @endif
                                            <form class="form-horizontal" method="get" wire:submit.prevent="createService">
                                                @csrf
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-9">
                                                            <input  wire:model="name" wire:keyup="generateSlug" type="text" class="form-control" >
                                                            @error('name') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Slug</label>
                                                        <div class="col-sm-9">
                                                            <input wire:model="slug" type="text" class="form-control">
                                                            @error('slug') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">tagline</label>
                                                        <div class="col-sm-9">
                                                            <input wire:model="tagline" type="text" class="form-control">
                                                            @error('tagline') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Service Category</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" required="required" wire:model="service_category_id">
                                                                <option value="">Select Service Category</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('service_category_id') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Price</label>
                                                        <div class="col-sm-9">
                                                            <input wire:model="price" type="text" class="form-control">
                                                            @error('price') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Discount</label>
                                                        <div class="col-sm-9">
                                                            <input wire:model="discount" type="text" class="form-control">
                                                            @error('discount') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Discount Type</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" required="required" wire:model="discount_type">
                                                                <option value="fixed">Fixed</option>
                                                                <option value="percent">Percent</option>
                                                            </select>
                                                            @error('discount_type') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Inclusion</label>
                                                        <div class="col-sm-9">
                                                            <textarea wire:model="inclusion" type="text" class="form-control"></textarea>
                                                            @error('inclusion') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Exclusion</label>
                                                        <div class="col-sm-9">
                                                            <textarea wire:model="exclusion" type="text" class="form-control"></textarea>
                                                            @error('exclusion') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea wire:model="description" class="form-control"></textarea>
                                                            @error('description') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Thumbnail</label>
                                                        <div class="col-sm-9">
                                                            <input wire:model="thumbnail" type="file" class="form-control-file">
                                                            @if($thumbnail)
                                                                <img src="{{ $thumbnail->temporaryUrl() }}" width="60">
                                                            @endif
                                                            @error('thumbnail') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Image</label>
                                                        <div class="col-sm-9">
                                                            <input wire:model="image" type="file" class="form-control-file">
                                                            @if($image)
                                                                <img src="{{ $image->temporaryUrl() }}" width="60">
                                                            @endif
                                                            @error('image') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary pull-right">Add Service</button>
                                            </form>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>    
</div>