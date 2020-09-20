@section('title' , 'İletişim')
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
                        <th>Ad Soyad</th>
                        <th>Email</th>
                        <th>Konu Başlığı</th>
                        <th>Okunma Durumu</th>
                        <th>Tarih</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>
                            {{$contact->email}}
                        </td>
                        <td>
                            {{$contact->subject}}
                        </td>
                        <td>
                            @if($contact->status == 0)
                                <p style="color: red">Okunmadı</p>
                            @else
                                <p style="color: green">Okundu</p>
                            @endif
                        </td>
                        <td>{{$contact->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('admin.contact.read' , $contact->id)}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{route('admin.contact.delete' , $contact->id)}}" class="btn btn-danger"><i class="fa fa-times"></i></a>
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
