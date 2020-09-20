
@include('Front.Static.header')

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($posts as $post)
            <div class="post-preview">
                <a href="{{route('post', $post->id)}}">
                    <h2 class="post-title">
                        {{$post->name}}
                    </h2>
                    <img src="{{$post->image}}" class="img-fluid mb-2">
                </a>
                <p class="post-meta">Posted by
                    <strong>{{$admin->name}}</strong>
                    <span class="float-right">{{$post->created_at->diffForHumans()}}</span></p>
            </div>
            @if(!$loop->last)
            <hr>
            @endif
            @endforeach

        </div>
    </div>
</div>

@include('Front.Static.footer')
