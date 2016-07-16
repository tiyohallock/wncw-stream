


@extends('dashboardstripped')

@section('content')

    <h1>Web Stream Archive</h1>


    <div class="row">
        <div class="col-md-12">
           @if($streams->isEmpty())
            <div class="well text-center">No streams found.</div>
        @else
            <table class="table raw-margin-top-24">

                <tbody>
                     @foreach($streams as $stream)
                            <tr>
                                <td style="vertical-align: middle;" ><img src="images/{{$stream->image}}" style="width:200px;" vspace="25"></td>
                                <td>

									<div vspace="50" style="font-family:lato;">
									<br>
									<div style="font-size:16px;">
							      {{$stream->date}} 
							      </div><br>
							     <div style="font-size:18px;">
							      {{$stream->description}} 
							      </div>
							      </div>


                                </td>
                                <td style="vertical-align: middle;">
                                 <div style="width:2px;height:200px;background-color:#DDDDDD;">&nbsp;</div>
                                </td>

                             <td style="vertical-align: middle;">

									<script>
									function myFunction() {
									    var myWindow = window.open("{{$stream->source}}", "PlayerWindow", "width=200,height=100");
									  
									}
									</script>
     							<button onclick="myFunction()"><img src="images/playerbutton.png" vspace="50"></button>
     							</a>


                                </td>
                            </tr>
                        

                    @endforeach
                    @endif

                </tbody>

            </table>
        </div>
    </div>

@stop




