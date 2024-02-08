@extends('backend.layout.app')
@section('content')
    <div class="section">
        <div class="row">
            <div class="col s12">
                <div id="input-fields" class="card card-tabs">
                    <div class="card-content">
                        <div class="card-title">
                            <div class="row">
                                <div class="col s12 m6 l10">
                                    <h4 class="card-title">Add Circle Group</h4>
                                </div>
                            </div>
                        </div>
                        <div id="view-input-fields" class="active">
                            <div class="row">
                                <div class="col s12">
                                    <form id="saveCircle" class="row">
                                        @csrf
                                        <div class="col s12">
                                            <div class="input-field col s12">
                                                <input placeholder="Group Name" name="name" type="text" class="validate">
                                                <label class="active">Group Name</label>
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <div class="input-field col s12">
                                                <button type="submit" class="waves-effect waves-light btn mb-1 mr-1">SAVE</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
    $("#saveCircle").on('submit',function(e){
        e.preventDefault();

        let name = $('[name="name"]').val();

        if(name === ""){
            M.toast({ html: "You must provide circle name",class: "rounded"});
            return false;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            'url':"{{ route('save.circle') }}",
            'type':'post',
            'dataType':'text',
            data:{name:name},
            success:function(data)
            {
                if(data == 'success'){

                    M.toast({ html: "Circle successfully added !!",class: "rounded"});
                    setTimeout(explode, 2000);
                    function explode(){
                        window.location.reload();
                    }

                }else if(data === 'duplicate'){
                    M.toast({ html: "Circle name already exist !!",class: "rounded"});
                }else{
                    M.toast({ html: "Something went wrong !!",class: "rounded"});
                }
            }
        });

    })
})

</script>
@endsection
