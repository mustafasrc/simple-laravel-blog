@section( 'title','İletişim')
@section('bg' , 'https://rkdanismanlik.com.tr/wp-content/uploads/2018/07/contact-us.jpg')
@include('Front.Static.header')

<div class="container">
    <h1>Bizimle İletişime Geçin</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <form action="{{route('contact.post')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Ad Soyad</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Mesaj Konusu</label>
            <input type="text" name="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Mesaj</label>
            <textarea name="message" cols="30" rows="10" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success form-control p-1">Gönder</button>
        </div>
    </form>
</div>

@include('Front.Static.footer')
