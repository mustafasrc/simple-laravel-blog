@section( 'title',$post->name)
@section('bg' , $post->image)
@include('Front.Static.header')

<div class="container">
    {!! $post->content !!}
</div>

@include('Front.Static.footer')
