@section('title' , 'Sayfa Düzenle')
@include('Back.Static.header')


    <div class="card-body">
        <form  method="post" action="{{route('admin.sayfalar.update' , $page->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Sayfa Başlık</label>
                <input type="text" class="form-control" name="name" required value="{{$page->name}}">
            </div>
            <div class="form-group">
                <label>Sayfa Resim</label>
                <input type="file" class="form-control" name="image">
                <div class="mt-3">
                    <img src="{{$page->image}}" style="width: 400px;" class="img-thumbnail">
                </div>
            </div>
            <div class="form-group">
                <label>Sayfa İçerik</label>
                <textarea  id="editör" cols="30" rows="10" required class="form-control" name="content">{{$page->content}} </textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success form-control type="submit">Güncelle</button>
            </div>
        </form>

    </div>

@include('Back.Static.footer')
