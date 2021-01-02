<div class="talks">
    @foreach ($talks as $talk)
        <div class="talk-wrapper">
            <a href="/talk/show/{{$talk->id}}"></a>

            <div class="top-side">

                @if ($user == $talk->user_id)
                <div class="dropdown">
                    <i class="fas fa-ellipsis-v menu-title"></i>
                    <div class="sub-menu">
                        <ul>
                        <li>
                            <form method="post" action="{{ route('talks.remove', $talk->id) }}">
                                {{ csrf_field() }}
                                <input type="submit" value='delete'>
                            </form>
                        </li>
                        </ul>
                    </div>
                </div>
                @endif

                <h4>{{ $talk->title }}</h4>
            </div>
            
            
            <p>{!! nl2br($talk->body) !!}</p><br>
            <div class="talk-info">
                <p>{{ $talk->language }} / {{ $talk->tool }}</p>
                <p>{{ $talk->created_at }}</p>

            </div>
        </div>


    @endforeach
</div>