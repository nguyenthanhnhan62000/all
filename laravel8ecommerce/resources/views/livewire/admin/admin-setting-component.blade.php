<div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-default">
                  <div class="panel-heading">
                        <h3 class="panel-title">Settings</h3>
                  </div>
                  <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form wire:submit.prevent="saveSetting" class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Email</label>
                                    <div class="col-md-4">
                                        <input wire:model="email" type="email" class="form-control input-md">
                                        @error('email') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Phone</label>
                                    <div class="col-md-4">
                                        <input wire:model="phone" type="text" class="form-control input-md">
                                        @error('phone') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Phone2</label>
                                    <div class="col-md-4">
                                        <input wire:model="phone2" type="text" class="form-control input-md">
                                        @error('phone2') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Address</label>
                                    <div class="col-md-4">
                                        <input wire:model="address" type="text" class="form-control input-md">
                                        @error('address') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Map</label>
                                    <div class="col-md-4">
                                        <input wire:model="map" type="text" class="form-control input-md">
                                        @error('map') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Twiter</label>
                                    <div class="col-md-4">
                                        <input wire:model="twiter" type="text" class="form-control input-md">
                                        @error('twiter') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Facebook</label>
                                    <div class="col-md-4">
                                        <input wire:model="facebook" type="text" class="form-control input-md">
                                        @error('facebook') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Pinterest</label>
                                    <div class="col-md-4">
                                        <input wire:model="pinterest" type="text" class="form-control input-md">
                                        @error('pinterest') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Instagram</label>
                                    <div class="col-md-4">
                                        <input wire:model="instagram" type="text" class="form-control input-md">
                                        @error('instagram') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Youtube</label>
                                    <div class="col-md-4">
                                        <input wire:model="youtube" type="text" class="form-control input-md">
                                        @error('youtube') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Youtube</label>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>  
                        </form>   
                  </div>
            </div>
            
        </div>
    </div>
</div>