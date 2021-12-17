<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Coupon
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{ route('admin.coupons') }}" class="btn btn-primary pull-right">All Categories</a>
                            </div>

                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form wire:submit.prevent="storeCoupon" class="form-horizontal" action="" method="post">
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Coupon Code</label>
                              <div class="col-md-4">
                                  <input wire:model="code" type="text" class="form-control input-md">
                                  @error('code') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Coupon Type</label>
                              <div class="col-md-4">
                                  <select class="form-control" required="required" wire:model="type">
                                      <option value="fixed">Fixed</option>
                                      <option value="percent">Percent</option>
                                  </select>
                                  @error('type') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Coupon Value</label>
                              <div class="col-md-4">
                                  <input wire:model="value" type="text" class="form-control input-md">
                                  @error('value') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Cart Value</label>
                              <div class="col-md-4">
                                  <input wire:model="cart_value" type="text" class="form-control input-md">
                                  @error('cart_value') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Expiry_date</label>
                              <div class="col-md-4" wire:ignore>
                                  <input  id="expiry_date" wire:model="expiry_date" type="text" class="form-control input-md">
                                  @error('expiry_date') <p class="text-danger">{{ $message }}</p> @enderror
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
        $(function() {
            $('#expiry_date').datetimepicker({
                format: 'Y-MM-DD'
            })
            .on('dp.change',function(){
                var data = $('#expiry_date').val()
                console.log(data);
                @this.set('expiry_date',data);
            })
        })
   </script>
@endpush