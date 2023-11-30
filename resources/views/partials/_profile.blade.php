@section('profile')
    <h2>{{$user->username}}</h2>
    <h3>{{$user->name}}</h3>
    <h4>{{$user->user_type}}</h4>
    <p>{{$user->bio}}</p>
@endsection