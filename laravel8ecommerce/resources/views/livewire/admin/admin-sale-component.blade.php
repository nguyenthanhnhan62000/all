<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                  
                        Sale Setting
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form wire:submit.prevent="updateSale" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select wire:model="status" class="form-control" required="required" wire:model="featured">
                                      <option value="0">Inactive</option>
                                      <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Featured</label>
                              <div class="col-md-4">
                                    
                                    <input wire:model="sale_date" type="text" id="sale-date" placeholder="YYYY/MM/DD H:M:S" class="form-control" required="required">
                                    
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#sale-date').datetimepicker({
                format: 'Y-MM-DD h:m:s',
            }).on('dp.change',function(e){
                    var data = $(this).val();
                    @this.set('sale_date',data);
            })
        })
    </script>
@endpush

