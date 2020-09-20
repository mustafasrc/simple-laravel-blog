@section('title' , 'Makaleler')
@include('Back.Static.header')


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Makale Başlık</th>
                        <th>Makale Resim</th>
                        <th>Makale Durumu</th>
                        <th>Makale Tarih</th>
                        <th>Makale İşlemleri</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->name}}</td>
                        <td>
                            <img src="{{$post->image}}" style="width: 300px;">
                        </td>
                        <td>
                            @if($post->status == 0)
                                <p style="color: red">Pasif</p>
                            @else
                                <p style="color: green">Aktif</p>
                            @endif
                        </td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{route('admin.makaleler.edit' , $post->id)}}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                            <a href="{{route('admin.post.delete' , $post->id)}}" class="btn btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@include('Back.Static.footer')
