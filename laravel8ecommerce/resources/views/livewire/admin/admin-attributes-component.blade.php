<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: none !important;
        }
        .sclist{
            list-style: none;
        }
    </style>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            All Attributes
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.add_attribute') }}" class="btn btn-primary pull-right">Add New</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pattributes as $pattribute)
                            <tr>

                                <td>{{ $pattribute->id }}</td>
                                <td>{{ $pattribute->name }}</td>
                                <td>{{ $pattribute->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.edit_attribute',$pattribute->id) }}"><i class="fa fa-edit fa-2x"></i></a>
                                    <a href="#" wire:click.prevent="deleteAttribute({{ $pattribute->id }})" style="margin-left:10px"><i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $pattributes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
