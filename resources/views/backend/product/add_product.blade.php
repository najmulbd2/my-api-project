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
                                    <h4 class="card-title">Add Product</h4>
                                </div>
                            </div>
                        </div>
                        <div id="view-input-fields" class="active">
                            <div class="row">
                                <div class="col s12">
                                    <form id="saveFamily" class="row">
                                        @csrf
                                        <div class="col s12">
                                            <div class="input-field col s12">
                                                <input placeholder="Name" name="name" type="text" class="validate">
                                                <label class="active">Name</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <input placeholder="Unit" name="unit" type="text" class="validate">
                                                <label class="active">Unit</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <input placeholder="Category" name="category" type="text" class="validate">
                                                <label class="active">Category</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <input placeholder="Purchase Price" name="purchase_price" type="text" class="validate">
                                                <label class="active">Purchase Price</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <input placeholder="Sale Price" name="sale_price" type="text" class="validate">
                                                <label class="active">Sale Price</label>
                                            </div>

                                            <div class="file-field input-field col s12">
                                                <div class="btn">
                                                    <span>File</span>
                                                    <input type="file" name="image">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input type="text" name="image">
                                                </div>

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
            $("#saveFamily").on('submit',function(e){
                e.preventDefault();

                let name = $('[name="name"]').val();

                if(name === ""){
                    M.toast({ html: "You must provide family group name",class: "rounded"});
                    return false;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    'url':"{{ route('save.family') }}",
                    'type':'post',
                    'dataType':'text',
                    data:{name:name},
                    success:function(data)
                    {
                        if(data == 'success'){

                            M.toast({ html: "Family successfully added !!",class: "rounded"});
                            setTimeout(explode, 2000);
                            function explode(){
                                window.location.reload();
                            }

                        }else if(data === 'duplicate'){
                            M.toast({ html: "Family name already exist !!",class: "rounded"});
                        }else{
                            M.toast({ html: "Something went wrong !!",class: "rounded"});
                        }
                    }
                });

            })
        })

    </script>
@endsection
