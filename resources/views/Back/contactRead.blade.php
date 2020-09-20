@section('title' , 'İletişim')
@include('Back.Static.header')


<div class="container-fluid">

    <div class="p-2 " style="background-color: #ffffff; box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;">
        <h2 class="text-primary" style="font-size: 20px;">
            {{$contact->email}}
            <span style="color: black">/</span>
            <span style="font-size: 15px;" class="text-dark">
                {{$contact->name}}
            </span>
        </h2>
        <hr>
        <h2>
            {{$contact->subject}}
        </h2>
        <hr>
        <p>
            {{$contact->message}}
        </p>
    </div>
    <div class="p-2 mt-3" style="background-color: #ffffff; box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;">
        <form action="{{route('admin.contact.post' , $contact->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label>Okundu Durumu</label>
                <select name="status" class="form-control">
                    <option @if($contact->status == 0 )selected @endif  value="0">Okunmadı</option>
                    <option @if($contact->status == 1 )selected @endif value="1">Okundu</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success form-control">Güncelle</button>
            </div>
        </form>
    </div>
</div>


@include('Back.Static.footer')
