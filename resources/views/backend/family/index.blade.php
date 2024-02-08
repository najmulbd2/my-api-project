@extends('backend.layout.app')
@section('content')
    <div class="section">
        <div class="row">
            <div class="col s12 m12 l12">
                <div id="highlight-table" class="card card card-default scrollspy">
                    <div class="card-content">
                        <h4 class="card-title">All Family Groups</h4>
                        <div class="row">
                            <div class="col s12">
                            </div>
                            <div class="col s12">
                                <table class="highlight">
                                    <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Name</th>
                                        <th>Added On</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($groups as $key => $group)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $group->name }}</td>
                                            <td>{{ $group->created_at }}</td>
                                            <td><a href="{{ route('edit.family',$group->id) }}" class="waves-effect waves-light btn mb-1 mr-1">EDIT</a><a href="{{ $group->id }}" class="waves-effect waves-light btn mb-1 mr-1 delete">DELETE</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
$(function(){
    $(".delete").on('click',function(e){
        e.preventDefault();

        let group_id = $(this).attr("href");

        swal({
            title: "Are you determind ?",
            text: "For deleting the family group",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    'url':"{{ route('delete.family') }}",
                    'type':'post',
                    'dataType':'text',
                    data:{group_id:group_id},
                    beforeSend: function(data) {
                        console.log(data);
                    },
                    success:function(data)
                    {
                        if(data === 'success'){
                            M.toast({ html: "Group deleted successfully",class: "rounded"});
                            setTimeout(explode, 2000);
                            function explode(){
                                window.location.reload();
                            }
                        }else{
                            M.toast({ html: "Something went wrong",class: "rounded"});
                        }
                    }
                });
            }

        });


    })
})
</script>
@endsection
