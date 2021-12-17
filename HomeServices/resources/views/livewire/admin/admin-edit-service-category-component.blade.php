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
                    <h1>Edit Service Category</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Edit Service Categories</li>
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
                                                    <h3 class="panel-title">Add New Service Category</h3>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ route('admin.service_categories') }}" class="btn btn-info pull-right">All Categories</a> 
                                                </div>
                                            </div>
                                      </div>
                                      <div class="panel-body">
                                          @if (session()->has('message'))<div class="alert alert-success">  {{ session('message') }}</div> @endif
                                            <form class="form-horizontal"  wire:submit.prevent="updateServiceCategory">
                                                @csrf
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Category Name</label>
                                                        <div class="col-sm-9">
                                                            <input  wire:model="name" wire:keyup="generateSlug" type="text" class="form-control" >
                                                            @error('name') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Category Slug</label>
                                                        <div class="col-sm-9">
                                                            <input wire:model="slug" type="text" class="form-control">
                                                            @error('slug') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Category Image</label>
                                                        <div class="col-sm-9">
                                                            <input wire:model="newimage" type="file" class="form-control-file">
                                                            @if($newimage)
                                                                <img src="{{ $newimage->temporaryUrl() }}" width="60">
                                                            @else
                                                                <img src="{{ asset('images/categories/'.$image) }}" width="60">
                                                            @endif
                                                            @error('newimage') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3 control-label">Featured</label>
                                                        <div class="col-sm-9">
                                                            
                                                            <select wire:model.click="featured" class="form-control" required="required">
                                                                <option value="0">No</option>
                                                                <option value="1">Yes</option>
                                                            </select>
                                                            
                                                            @error('featured') <span class="error">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
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