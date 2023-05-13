        @if(count($questions) > 0)
        @php $i=1; @endphp
            @foreach($questions as $data)
                @if($loop->iteration == $counter)
                <input type="hidden" name="counter" value="{{ $counter }}"> 
                    <div >
                    <h2 style="text-align:center;" >{{ session()->get('username')}}</h2>
                    <br>
                        <P style=""><span>Q # </span><b>{{$data->question}}<b></P>
                        <input type="hidden" name="questions[{{ $i }}]" value="{{ $data->id }}">
                        @foreach($data->options as $option)
                            <ol style="list-style-type:none">
                                <li>
                                    <input id="qwe"  type="radio" name="answers[{{ $data->id }}]" value="{{ $option->id }}">
                                    <label style="">{{ $option->options }}</label> 
                                </li>
                            </ol>
                        @endforeach
                    </div>
                @endif
            @endforeach
        @endif
 