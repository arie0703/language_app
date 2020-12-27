@foreach ($users as $user)
<div class="users">
    @if (!empty($user->image))
    <img src="/storage/storage/{{ Auth::user()->image}}" id="img">
    @else
    <img src="/storage/noicon.jpg" id="img">
    @endif
    <div class="info">
        <p>{{ $user->name }}</p> 
        <a href="#"><i class="far fa-envelope"></i></a>
    </div> 
</div>
@endforeach