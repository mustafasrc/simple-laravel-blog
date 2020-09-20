@section('title' , 'Ayarlar')
@include('Back.Static.header')

<div class="container-fluid">

    <form action="{{route('admin.setting.post')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Site İsmi</label>
                    <input type="text" name="name" class="form-control" value="{{$settings->name}}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Site Logo</label>
                    <input type="file" name="logo" class="form-control">
                    @if($settings->logo)
                        <img src="{{$settings->logo}}" class="img-thumbnail mt-3" width="200">
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center mt-3"><h1>Sosyal Medya</h1></div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>İnstagram</label>
                    <input type="text" name="instagram" class="form-control" value="{{$settings->instagram}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Twitter</label>
                    <input type="text" name="twitter" class="form-control" value="{{$settings->twitter}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Linkedin</label>
                    <input type="text" name="linkedin" class="form-control" value="{{$settings->linkedin}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Youtube</label>
                    <input type="text" name="youtube" class="form-control" value="{{$settings->youtube}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="{{$settings->facebook}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>GitHub</label>
                    <input type="text" name="github" class="form-control" value="{{$settings->github}}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-success form-control">Güncelle</button>
                </div>
            </div>
        </div>

    </form>

</div>


@include('Back.Static.footer')
