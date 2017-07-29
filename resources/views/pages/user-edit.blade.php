@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
        @if(! isset($id)) Create user @else Edit user @endif
        <form class="form" method="POST" action="/user/{{ $id }}">
        </form>
    </div>
</div>
@endsection
