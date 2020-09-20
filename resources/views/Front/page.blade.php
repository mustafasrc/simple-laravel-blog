@section( 'title',$page->name)
@section('bg' , $page->image)
@include('Front.Static.header')

<div class="container">
    {!! $page->content !!}
</div>

@include('Front.Static.footer')
