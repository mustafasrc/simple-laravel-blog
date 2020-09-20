@section('title' , 'Makale Düzenle')
@include('Back.Static.header')


    <div class="card-body">
        <form  method="post" action="{{route('admin.makaleler.update' , $post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Haber Başlık</label>
                <input type="text" class="form-control" name="name" required value="{{$post->name}}">
            </div>
            <div class="form-group">
                <label>Haber Resim</label>
                <input type="file" class="form-control" name="image">
                <div class="mt-3">
                    <img src="{{$post->image}}" style="width: 400px;" class="img-thumbnail">
                </div>
            </div>
            <div class="form-group">
                <label>Haber İçerik</label>
                <textarea  id="editör" cols="30" rows="10" required class="form-control" name="content">{{$post->content}} </textarea>
            </div>
            <div class="form-group">
                <label>Statü Durumu</label>
                <select name="status" id="" class="form-control" style="width: 600px" required>
                    <option @if($post->status == 0) selected @endif value="0">Pasif</option>
                    <option @if($post->status == 1) selected @endif value="1">aktif</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success form-control type="submit">Güncelle</button>
            </div>
        </form>

    </div>

@include('Back.Static.footer')
