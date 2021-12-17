<div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-default">
                  <div class="panel-heading">
                        <h3 class="panel-title">Contact Message</h3>
                  </div>
                  <div class="panel-body">
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Comment</th>
                                    <th>Created_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $key => $contact)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->comment }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                  </div>
            </div>
            
        </div>
    </div>
</div>