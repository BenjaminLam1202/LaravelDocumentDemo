@extends('admin.layout.menu')
@section('contenter')
<div class="text-center">
    <div class="flex-center position-ref full-height">

    	<form action="{{ route('demo.testme') }}" method="post">
    		  @csrf
    		 <label  class="email">enter any value you want</label>
    		 <input type="text" name="testme">
    		 <input type="submit" name="submit">
    	</form>
    </div>
</div>



@endsection