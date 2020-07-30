@extends('admin.layout.menu')
@section('contenter')
<div class="flex-center position-ref full-height">
    <div class="text-center">
        <form action="{{ route('validate.go')}}" method="post">
            @csrf
            <input type="text" name="test" placeholder="input yours id">
            <small id="noticeHelp" class="form-text text-muted">any value is wrong but 1 </small>       
            <input type="submit" name="submit">
        </form>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection

