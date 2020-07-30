@extends('admin.layout.menu')
@section('contenter')

@auth
 nếu đăng nhập rồi bạn sẽ thấy cái này 
 
@if(auth::user()->name == "Lam Thai Gia Huy")
		to la admin :v và tớ đã login
@endif
@endauth

@guest
  cái của mấy cậu chưa đăng nhập

@endguest

@endsection