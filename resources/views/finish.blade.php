@extends('welcome')
@section('content')
<?php $q = 1; $topt=1; $tiny=1; ?>
<div class="container card">
    <div class="card-body">
            <div >
            <h2 style="text-align:center;" >{{ session()->get('username')}}</h2>
            <br>
                <P style=""><span>Correct :</span><b>{{$finalresults->correct}}<b></P>
                <P style=""><span>Wrong :</span><b>{{$finalresults->wrong}}<b></P>
            </div>

        </div>

            <div style="text-align:center">
                <a onclick="logout(this)" href="#logout" class="" style="background:white;padding:0.5rem">logout</a>
            </div>
    </div>

</div>
<script>
function logout(e){

    window.location.href = "/logout";

};


</script>

@endsection
