<div>
    <div class="section-title-01 honmob">
               
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Edit Profile</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Edit Profile</li>
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
                                                    <h3 class="panel-title">Edit Profile</h3>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                      </div>
                                      <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if (session()->has('message'))
                                                        <div class="alert alert-success">
                                                            {{ session('message') }}
                                                        </div>
                                                    @endif
                                                      <form wire:submit.prevent="updateProfile" class="form-horizontal">
                                                              <div class="form-group">
                                                                <label class="control-label col-md-3">Profile Image</label>
                                                                <div class="col-md-9">
                                                                    <input wire:model="newimage" type="file" class="form-control-file">
                                                                    @if($newimage)
                                                                        <img width="220" src="{{ $newimage->temporaryUrl() }}">
                                                                    @elseif($image)
                                                                        <img width="220" src="{{ asset('images/sproviders/'. $image) }}">
                                                                    @else
                                                                        <img width="220" src="{{ asset('images/sproviders/default.png') }}">
                                                                    @endif  
                                                                </div>  
                                                              </div>
                                                              <div class="form-group">
                                                                <label class="control-label col-md-3">About</label>
                                                                <div class="col-md-9" >
                                                                    <textarea class="form-control" wire:model="about" ></textarea>

                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <label class="control-label col-md-3">City</label>
                                                                <div class="col-md-9" class="form-control">
                                                                    <input class="form-control" wire:model="city" type="text" >

                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <label class="control-label col-md-3">Service Category</label>
                                                                <div class="col-md-9">
                                                                    <select required wire:model="service_category_id" class="form-control">
                                                                        @foreach($scategories as $scategory)
                                                                            <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <label class="control-label col-md-3">Service Locations Zipcode/Pincode</label>
                                                                <div class="col-md-9">
                                                                    <input wire:model="service_locations" type="text" class="form-control">
                                                                </div>
                                                              </div>
                                                             
                                                              
                                                            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                                                             
                                                      </form>
                                                      
                                                </div>
                                               
                                            </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>    
</div>
