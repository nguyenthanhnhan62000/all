<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add Attribute
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{ route('admin.attributes') }}" class="btn btn-primary pull-right">All Attributes</a>
                            </div>

                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form wire:submit.prevent="storeAttribute" class="form-horizontal" action="" method="post">
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Name</label>
                              <div class="col-md-4">
                                  <input wire:model="name" type="text" class="form-control input-md" name="name">
                                  @error('name') <p class="text-danger">{{ $message }}</p> @enderror
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
