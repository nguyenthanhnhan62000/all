<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Category
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{ route('admin.categories') }}" class="btn btn-primary pull-right">All Categories</a>
                            </div>

                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form wire:submit.prevent="updateCategory" class="form-horizontal" action="" method="post">
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Category Name</label>
                              <div class="col-md-4">
                                  <input wire:keyup="generateslug" wire:model="name" type="text" class="form-control input-md" name="name">
                                  @error('name') <p class="text-danger">{{ $message }}</p> @enderror

                                </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Category Slug</label>
                              <div class="col-md-4">
                                  <input wire:model="slug" type="text" class="form-control input-md" name="slug">
                                  @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Parent Category</label>
                              <div class="col-md-4">
                                  
                                  <select class="form-control" wire:model="category_id" >
                                      <option value="">None</option>
                                      @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                      @endforeach
                                  </select>
                                  
                                  @error('category_id') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                              <div class="col-md-4">
                                  <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
