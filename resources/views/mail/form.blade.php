@extends('admin.layout.menu')
@section('contenter')
<div class="text-center">
    <form action="{{route('front.fb')}}" method="post">
        @csrf
        <div>
            <label  class="email">Your name</label>
            <input type="text" name="name">
        </div><div>
            <label  class="email">Your email</label>
            <input type="email" name="email">
        </div><div>
            <label class="email">Comments</label>
            <input type="text" name="comment">
        </div><div class="send">
            <button type="submit" class="alert alert-success" name="submit"><i class="fa fa-paper-plane-o" aria-hidden="true">send</i></button>
        </div>
    </form>
</div>



@endsection