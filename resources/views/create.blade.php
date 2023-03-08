@extends('nav')

@section('main')
    <div>
        <div class="float-start">
            <h4 class="pb-3">Create Tasks</h4>
        </div>
        <div class="float-end">
            <a href="{{route('index')}}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> All Task
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
    
    <div class="card card-body bg-light p-4">
        <form action="{{route('task.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input required type="text" name="title" class="form-control" id="title">
             
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea required type="text" class="form-control" name="description" id="description" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="status">Status</label>
                <select class="form-control" name="status" id="status"> 
                    @foreach($statuses as $status)
                        <option value="{{ $status ['value'] }}">{{ $status ['label'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="duedate">Due Date</label>
                <input required type="date" class="form-control" name="duedate" id="duedate" value="{{date('Y-m-d') }}"> 
            </div>

            <a href="{{ route('index') }}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i> Cancel</a>
            <button type="submit" class="btn btn-success">
               <i class="fa fa-check"></i> Add
            </button>
        </form>
    </div>
   
@endsection