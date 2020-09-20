@section('title' , 'Sayfalar')
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
                        <th>Sayfa Başlık</th>
                        <th>Sayfa Resim</th>
                        <th>Sayfa Tarih</th>
                        <th>Sayfa İşlemleri</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                    <tr>
                        <td>{{$page->name}}</td>
                        <td>
                            <img src="{{$page->image}}" style="width: 300px;">
                        </td>
                        <td>{{$page->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{route('admin.sayfalar.edit' , $page->id)}}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                            <a href="{{route('admin.page.delete' , $page->id)}}" class="btn btn-danger"><i class="fa fa-times"></i></a>
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
