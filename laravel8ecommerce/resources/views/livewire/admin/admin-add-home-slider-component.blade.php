<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Slider
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{ route('admin.homeslider') }}" class="btn btn-primary pull-right">All Slider</a>
                            </div>

                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form wire:submit.prevent="addSlider" class="form-horizontal" action="" method="post">
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Title</label>
                              <div class="col-md-4">
                                  <input wire:model="title" type="text" class="form-control input-md" name="name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Subtitle</label>
                              <div class="col-md-4">
                                  <input wire:model="subtitle" type="text" class="form-control input-md" >
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Price</label>
                              <div class="col-md-4">
                                  <input wire:model="price" type="text" class="form-control input-md">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Link</label>
                              <div class="col-md-4">
                                  <input wire:model="link" type="text" class="form-control input-md" >
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Image</label>
                              <div class="col-md-4">
                                  <input wire:model="image" type="file" class="form-control input-md" >
                                  @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="120"/>
                                    @endif   
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Status</label>
                              <div class="col-md-4">
                                  <select wire:model="status" class="form-control" required="required">
                                      <option value="0">Inactive</option>
                                      <option value="1">Active</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                              <div class="col-md-4">
                                  <button type="submit" class="btn btn-primary">submit</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
