@extends('admin.apifun.userfun')
@extends('admin.layout.menu')
@section('contenter')
<div class="container">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
@if (Session::get('flash_message') != null)
<div class="alert alert-success">
  <ul>
    {{Session::get('flash_message')??''}} <br>
    {{Session::get('input_status')??''}} <br>
  </ul>
</div> 
@endif 
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="text-center">
      <img  src="{{asset(Session::get('image_status'))}}" class="w-10" alt="">
    </div>
  </div>
</div> 
{{-- {{asset('storage/uploads/XpEPpEjQnbRYAb141gZxrE1VbniGtzvKFQ2PrJJL.gif')}} --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table>
                  <tr>
                    <td>
                      <div class="card-header">number of users : {{DB::table('users')->get()->count()}}</div>
                    </td>
                    <td>
                    <button type="button" class="btn btn-primary" name="button" data-toggle="modal" data-target="#modalRegisterForm"> New User </button>
                    </td>
                  </tr>
                </table>
                <table class="table table-striped">

                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Created_at</th>
                      <th scope="col">Email</th>
                      <th scope="col">#</th>
                    </tr>
                  </thead>
                  <tbody class="thistb" id="thistb">
                    @foreach($users as $user)
                    <tr>
                      <td id="display{{$user->id}}">{{$user->name}}</td>
                      <td>{{$user->created_at}}</td>
                      <td>{{$user->email}}</td>
                      <td class="text-center">
                          <button type="button" class='btn btn-info btn-xs' data-toggle="modal" data-target=".myModaluser{{$user->id}}"><span class="glyphicon glyphicon-edit"></span>edit</button>
                        @if(Auth::user()->id != $user->id)
                          <button class="btn btn-danger btn-xs" onClick="$(this).closest('tr').fadeOut(800,function(){$(this).remove();});" type="button" ><span class="glyphicon glyphicon-remove"></span><a href="/doc/delete/{{$user->id}}"> Del</a></button>
                        @endif
                    </td>
                      <div id="myModaluser{{$user->id}}" class="modal fade myModaluser{{$user->id}}" role="dialog">
                        <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit user's profile</h4>
                            </div>
                            <div class="modal-body">
                              <div>



                                <form action="/doc/update" method="post" class="my_topic_change_form{{$user->id}}" id="my_topic_change_form{{$user->id}}">
                                  <div class="form-group">
                                  <label for="exampleInputEmail1">Remane your name</label>
                                  <input type="text" class="form-control" name="name" aria-describedby="noticeHelp" value="{{$user->name}}" placeholder="{{$user->name}}"> 
                                  <label for="exampleInputEmail1">Remane email name</label>
                                  <input type="email" class="form-control" name="email" aria-describedby="noticeHelp" value="{{ $user->email}}" placeholder="{{$user->email}}" readonly>
                                  <input type="hidden" name="id" value="{{ $user->id}}">
                                  </div>
                                  <button type="submit" class="btn btn-primary">Change</button> 
                                </form>
                              </div>
                            <script type="text/javascript">
                              $("#my_topic_change_form{{$user->id}}").submit(function(event){
                                $.ajaxSetup({

                                  headers: {

                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                                  }

                                });
                                event.preventDefault(); //prevent default action 
                                var post_url = $(this).attr("action"); //get form action url
                                var request_method = $(this).attr("method"); //get form GET/POST method
                                var form_data = $(this).serialize(); //Encode form elements for submission
                                
                                $.ajax({
                                  url : post_url,
                                  type: request_method,
                                  data : form_data, 
                                  success:function(data){
                                    $('#display{{$user->id}}').text(categoryf);
                                    alert("success!! reload page to update");

                                  }
                                }).done(function(response){ //
                                  $("#server-results").html(response);
                                });
                              });
                            </script>
                            </div>
                          </div>
                        </div>
                      </div>
                    </tr>
                    @endforeach
                  </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
<div class="row justify-content-center">
  <div class="col-md-8">
    <form action="{{ route('demo.import') }}" method="POST" name="importform" 
       enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control">
        <br>
        <a class="btn btn-info" href="{{ route('demo.export') }}"> 
         Export File</a>
        <button class="btn btn-success">Import File</button>
    </form>
  </div>
</div>    
<div class="text-center">
  @foreach($notifications as $notification)
        <div class="alert alert-success" role="alert">
            {{ json_decode($notification->data)->name }} has just registered.
            <a href="/doc/noti/{{ $notification->id }}" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                Mark as read
            </a>
        </div>
        @if($loop->last)
            <a href="{{route('demo.xoahet')}}" >
                Mark all as read
            </a>
        @endif
    @endforeach
   
</div>

{{ $users->links() }}
<div class="row justify-content-center">
  <form action="{{ route('demo.uploadimage') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="UploadImage">Upload</label>
    <input type="file" name="file" class="@error('file') is-invalid @enderror">
    <input type="submit" value="submit">
  </form>
</div>


@endsection