@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if(! isset($id)) Create user @else Edit user @endif
        <form class="form" method="POST" action="/user/{{ $id }}">
        </form>
    </div>
</div>
@endsection
