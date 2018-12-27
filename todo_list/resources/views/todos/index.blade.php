<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 


<h1 style="text-align: center">Todos List</h1>
@if(count($todos)>0)

<div class="card card-body bg-light" style="width:78%;margin-left:10%">
@if(Session::has('flash_message_error'))
<div class="alert alert-error alert-block">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>{!! session('flash_message_error') !!}</strong>
</div>
@endif
@if(Session::has('flash_message_success'))
<div class="alert alert-success alert-block">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>{!! session('flash_message_success') !!}</strong>
</div>
@endif

    @foreach($todos as $todo)   
           <div >   
           <h3>{{ $todo->subject }}</h3>
           </div>
           <div>
           @if($todo->status==0)
            <span class="label label-danger">{{ $todo->description }}</span>
            <a  type="button" href="{{url('/todos/delete/'.$todo->id)}}" style="margin-right:5px" class="btn btn-primary float-right">Delete</a>
            <a type="button" href="{{url('#')}}" style="margin-right:10px" class="btn btn-primary float-right">Edit</a>
            <a type="button" href="{{url('/todos/done/'.$todo->id)}}" style="margin-right:15px" class="btn btn-primary float-right">Done</a>
           
           
           @endif
           @if($todo->status==1)
           <span class="label label-danger">{{ $todo->description }}</span>
            <a  type="button" href="{{url('/todos/delete/'.$todo->id)}}" style="margin-right:5px" class="btn btn-primary float-right">Delete</a>
            <a type="button" href="{{url('/todos/edit/'.$todo->id)}}" style="margin-right:10px" class="btn btn-primary float-right">Edit</a>
           @endif
           <hr>
           </div>
    @endforeach
    <a type="button" style="width:80px;height:38px;margin:auto" class="btn btn-primary" href='{{ url("/todos/create") }}'>Add</a>
</div>
@endif
@if(count($todos)==0)
    <h1 style="text-align: center">There is no todos yet.</h1>
    <a type="button" style="width:40px;height:10px " class="btn btn-primary" href='{{ url("/todos/create") }}'>Add</a>
@endif





