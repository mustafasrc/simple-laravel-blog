@section('title' , 'Sayfa Ekle')
@include('Back.Static.header')


    <div class="card-body">
        <form  method="post" action="{{route('admin.sayfalar.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Sayfa Başlık</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label>Sayfa Resim</label>
                <input type="file" class="form-control" name="image"  required>
            </div>
            <div class="form-group">
                <label>Sayfa İçerik</label>
                <textarea  id="editör" cols="30" rows="10" required class="form-control" name="content"> </textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success form-control type="submit">Gönder</button>
            </div>
        </form>

    </div>

@include('Back.Static.footer')
