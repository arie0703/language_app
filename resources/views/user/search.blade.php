@extends('user')

@section('styles')
<link href="/css/search.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="/js/ajax/user.js"></script>
@endsection


@section('right-side')
<h4>Search User</h4>

<div class="search-area">
    <input type="text" class="form-control" id="search-user" placeholder="Type User Name" name="name">
    <button type="button" class="btn btn-primary btn-search">Go</button>
</div>

<div class="users-wrapper">
    <div id="user-data"></div>
</div>
@endsection