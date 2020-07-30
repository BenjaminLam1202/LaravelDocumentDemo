<div class="container">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <form action="/doc/adduser" method="post" class="my_user_form" id="my_user_form">
 	 @csrf

  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-left">
        <h4 class="modal-title w-100 font-weight-bold">New User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Name') }}</label>
          @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('Name') }}</strong>
          </span>
          @endif
        </div>

<div class="md-form mb-5">
         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="@gmail" name="email" value="{{ old('email') }}" required autocomplete="email">
          <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Email') }}</label>
          @if ($errors->has('des'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('Email') }}</strong>
          </span>
          @endif
        </div>

		<div class="md-form mb-5">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="giahuy123" required autocomplete="new-password">
          <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Password') }}</label>
          @if ($errors->has('des'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('Password') }}</strong>
          </span>
          @endif
        </div>
        <div class="md-form mb-5">
          <input id="password-confirm" type="password" value="giahuy123" class="form-control" name="password_confirmation" required autocomplete="new-password">
          <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('Password') }}</label>
          @if ($errors->has('des'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('Password') }}</strong>
          </span>
          @endif
        </div>

     </div>
     <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-default">Create</button>
    </div>
  </div>
</div>
</div>
</div>
  </form>
</div>



{{-- </div>
</div>

<div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" name="name" aria-describedby="noticeHelp"  placeholder="input name"> 
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" name="email" aria-describedby="noticeHelp" placeholder="input email" >
                      <label for="exampleInputEmail1">Password</label>                      <input type="password" class="form-control" name="password" aria-describedby="noticeHelp"  placeholder="input password" >
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>  --}}