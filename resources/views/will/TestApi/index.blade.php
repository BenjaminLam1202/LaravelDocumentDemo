@extends('admin.layout.menu')
@section('contenter')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">	
			{{Session::get('input_status')??'nothing'}} <br>
		</div>
	</div>
</div>		

 <form action="{{ route('demo.TestApiCreate')}}" method="post" class="api_test" id="api_test">
    <div class="form-group">
        <label for="exampleInputEmail1">Input</label>
        <input type="text" class="form-control" name="testapicontroller" aria-describedby="noticeHelp" placeholder="Value?">
        <small id="noticeHelp" class="form-text text-muted">this will run api + jquery</small>
    </div>
    <button type="submit" class="btn btn-primary">Create</button> 
</form>
<button type="button" class="btn btn-danger delete_demo" id="delete_demo">Remove all session in database</button>



<script type="text/javascript">

    $(document).ready(function() {
      $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
      $('#delete_demo').on('click', function (e) {
        // e.preventDefault();
        var post_url = '{{ route('demo.TestApiDelete')}}';
        console.log(post_url);
        // var id = $(this).attr('data-id');

        $.ajax({
            type: "delete",
            url: post_url,
            success: function( data ) {

               window.history.go(0);	 
               alert("success!! reload page to update");
              //console.log(msg);
              // $(this).closest('tr').remove();
             
          }
      });
    });
  });

</script>
<script type="text/javascript">
$("#api_test").submit(function(event){
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
          window.history.go(0);
          alert("success!!");

      }
    }).done(function(response){ //
        $("#server-results").html(response);
    });
});
</script>

</div>
@endsection