@section('title' , 'Makale Ekle')
@include('Back.Static.header')


    <div class="card-body">
        <form  method="post" action="{{route('admin.makaleler.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Haber Başlık</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label>Haber Resim</label>
                <input type="file" class="form-control" name="image"  required>
            </div>
            <div class="form-group">
                <label>Haber İçerik</label>
                <textarea  id="editör" cols="30" rows="10" required class="form-control" name="content"> </textarea>
            </div>
            <div class="form-group">
                <label>Statü Durumu</label>
                <select name="status" id="" class="form-control" style="width: 600px" required>
                    <option value="0">Pasif</option>
                    <option value="1">aktif</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success form-control type="submit">Gönder</button>
            </div>
        </form>

    </div>

@include('Back.Static.footer')
