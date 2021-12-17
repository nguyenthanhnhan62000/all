<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <div class="container">
        <form action="/role/update/{{ $role->id }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $role->name }}">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="display_name" class="form-control" value="{{ $role->name }}">
            </div>
            <div class="row">
                @foreach ($permissionsParent as $permissionsParentItem)
                    <div class="card border-primary mb-3 col-md-12">
                        <div class="card-header">
                            <label for="">
                                <input type="checkbox" class="checkbox_wrapper">
                            </label>
                            Module {{ $permissionsParentItem->name }}
                        </div>
                        <div class="row">
                            @foreach ($permissionsParentItem->permissionsChildrent as $permissionsChildrentItem)
                                <div class="card-body text-primary col-md-3">
                                    <h5 class="card-title">
                                        <label for="">
                                            <input {{ $permissionChecked->contains('id', $permissionsChildrentItem->id) ? 'checked' : '' }} name="permission_id[]" type="checkbox" class="checkbox_childrent" value="{{ $permissionsChildrentItem->id }}">
                                        </label>
                                        {{ $permissionsChildrentItem->name }}
                                    </h5>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('.selectRoles').select2();
        });
        $('.checkbox_wrapper').on('click', function(){
            $(this).parents('.card').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
        })
        $('.checkbox_childrent').on('click', function(){
            var obj = $(this).parents('.card').find('.checkbox_childrent')
            let index = 0;
            for (let i = 0; i < obj.length; i++) {
                if ($(obj[i]).prop('checked')) {
                    index++;   
                }
            }
            if (index == obj.length) {   
                $(this).parents('.card').find('.checkbox_wrapper').prop('checked',true)
            }else {
                $(this).parents('.card').find('.checkbox_wrapper').prop('checked',false)
            }
        })
    </script>
</body>

</html>
