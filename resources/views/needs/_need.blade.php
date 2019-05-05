<li>
  <span class="content" >
    <a href="{{ route('needs.show',$need->id)}}">{{ $need->program}}</a>
    <a href="{{ route('needs.show',$need->id)}}">{{ $need->game}}</a>
    <a href="{{ route('needs.show',$need->id)}}">{{ $need->name}}</a>
  </span>
  <span style="color:gray" class="timestamp">
    {{ $need->created_at->diffForHumans() }}
  </span>
</li>