@extends('nav')

@section('main')
    <div>
        <div class="float-start">
            <h4 class="pb-3">Task</h4>
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="card" style="width:500px; box-shadow: 5px 10px #888888">
        <div style="display:flex;justify-content:center" class="card-header ">
            <h4>{{$task->title}}</h4>
            <div style="padding-left:10px">
                <span class="badge rounded-pill text-bg-warning mt-2" >
                    {{$task->created_at->diffForHumans()}}
                </span>
            </div>
        </div>
        <div class="card-body">
            <div class="card-text">
                <div class="float-start">
                    <h6>{{$task->description}}</h6>
                    <br>
                    @if ($task->status == "completed")
                        <span class="badge rounded-pill text-bg-success">
                            Completed
                        </span>
                    @else
                        <span class="badge rounded-pill text-bg-info">
                            Not Completed
                        </span>
                    @endif
                
                    <small>Last Updated - {{$task->updated_at->diffForHumans()}}</small><br>

                <div class="clearfix"></div>    
            </div>
        </div>
    </div>
@endsection