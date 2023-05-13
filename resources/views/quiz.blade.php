@extends('welcome')
@section('content')
<?php $q = 1; $topt=1; $tiny=1; ?>
<div class="container card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form id="quizform">
                    @csrf()
                    <div class="start">
                    @if(count($question) > 0)
                    <?php $i = 1;?>
                        @foreach($question as $data)
                            @if($loop->iteration == $counter)
                            <input type="hidden" name="counter" value="{{ $counter }}"> 
                                <div >
                                <h2 style="text-align:center;" >{{ session()->get('username')}}</h2>
                                <br>
                                    <P ><span>Q # {{$tiny++}} </span><b>{{$data->question}}<b></P>
                                    <input type="hidden" id="que[{{ $i }}]" name="questions[{{ $i }}]" value="{{ $data->id }}">
                                    @foreach($data->options as $option)
                                        <ol style="list-style-type:none">
                                            <li>
                                                <input id="qwe"  type="radio" name="answers[{{ $data->id }}]" value="{{ $option->id }}">
                                                <label>{{ $option->options }}</label> 
                                            </li>
                                        </ol>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    @endif
                    </div>
                    <div style="text-align:center">

                        <!-- <div class="hide"> -->
                        <!-- <button type="submit"class="btn btn-warning btn-lg">Submit Quiz</button> -->
                            <!-- <button  onclick="SubmitFunction(this)"  class="btn btn-warning btn-lg">Submit Quiz</button> -->
                        <!-- </div> -->
                    </div>
                    <div style="text-align:center">
                        <button type="submit" class="btn btn-success">Next</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

</div>
<script>
// $(document).ready(function(){
//     $(".active").removeClass('active');
//     $(".start").next().addClass('start active').css("display", "block");
//     // $(".active").parent().removeClass("start").css("display", "none");
//     $(".active").prev().removeClass('start').css("display", "none");
// });

// function next(e){

//     if ($(".start").next().length) {
//         $(".active").removeClass('active');
//         $(".start").next().addClass('start active').css("display", "block");
//         // $(".active").parent().removeClass("start").css("display", "none");
//         $(".active").prev().removeClass('start').css("display", "none");
//     } else {
//         $(".active").removeClass('active');
//         $(".start").next().addClass('start active').css("display", "none");
//         // $(".active").parent().removeClass("start").css("display", "none");
//         $(".active").prev().removeClass('start').css("display", "none");
//     }

// };



        $('#quizform').on('submit',function(event){
            event.preventDefault();
            if($('input[type="radio"]:checked').val() != null){
                var question = new FormData(this);
                    $.ajax({
                        url:"{{ route('store')}}",
                        method:'POST',
                        data:question,
                        contentType: false,
                        processData: false,
                        success:function(response){
                            $('.start').html(response);
                            // alert("Auto Submit your quiz");
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });
                   
                }
                else{
                    alert('Select Option Required');
                }
            }); 


</script>

@endsection
