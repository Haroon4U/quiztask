@extends('welcome')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">New Session</div>
        <div class="card-body">
            <div class="login">
                <div class="row">
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-6">
                        <form id="formdata">
                            @csrf()
                            <input type="text" name="username" class="form-control" placeholder="Enter your User name" >
                            <br>
                            <div style="text-allign:center">
                                <button type="submit" class="btn btn-success" >Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-3">
                        
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<script>
    $('#formdata').on('submit',function(event){
        event.preventDefault();
            var  data = new FormData(this);
            // var url = '{{ route("user") }}';
                $.ajax({
                    url:'/get-username',
                    method: 'POST',
                    data: data,
                    contentType: false,
                    processData: false,
                success:function(res){
                        if(res.success == true){
                            alert(res.message);
                            window.location = "{{ route('quiz')}}";
                        }

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr);
                    }
                });
        });
</script>
@endsection