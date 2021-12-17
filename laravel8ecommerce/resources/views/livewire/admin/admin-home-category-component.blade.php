<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: none !important;
        }
    </style>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-heading">
                            Manager Home Categories
                </div>
                <div class="panel-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                        </div>
                    @endif
                    <form wire:submit.prevent="updateHomeCategory" class="form-horizontal">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Choose Categories</label>
                                <div class="col-md-4" wire:ignore>
                                    <select wire:model="selected_categories" class="sel_categories form-control" name="categories[]" multiple="multiple" required="required">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">No Of Products</label>
                                <div class="col-md-4">
                                    <input wire:model="numberofproduts" type="text"  class="form-control input-md" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    
                                    <button type="submit" class="btn btn-default">Save</button>
                                    
                                </div>
                            </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
@push('scripts')
        <script>
            $(document).ready(function() {
                $('.sel_categories').select2();
                
                $('.sel_categories').on('change', function(){
                    var data = $('.sel_categories').select2('val');
                    @this.set('selected_categories',data);
                })
            })
        </script>
@endpush
