
@extends("backend.layout.master")
@section('content')

    <form action="{{route('ctn.createUserDetail', ['id' =>$user->id ])}}" method="post">
        <h1 style="color: #00b0ff">Edit</h1>
        @csrf
        <button class="btn btn-success" type="submit">Change</button>
        <a  class="btn btn-success" type="button" href="{{route('ctn.listUserDetail')}}">Back</a>
        <div>
            <span style="color: white">Họ và tên:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="name" id="name" value="{{(!empty($user->name) and $user->name != '') ? $user->name : '0'}}">
        </div>
        <div>
            <span style="color: white">Email:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="email" id="email"  value="{{(!empty($user->email) and $user->email != '') ? $user->email : '0'}}" >
        </div>
        <div>
            <span style="color: white">Address:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="address" id="address" value="{{(!empty($user->address) and $user->address != '') ? $user->address : '0'}}" >
        </div>
        <div>
            <span style="color: white">Gender:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="gender"  id="gender" value="{{(!empty($user->gender) and $user->gender != '') ? $user->gender : '0'}}">
        </div>
        <div>
            <span style="color: white">Passport:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="passport" id="passport" value="{{(!empty($user->passport) and $user->passport != '') ? $user->passport : '0'}}" >
        </div>
        <div>
            <span style="color: white">Nickname:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="nickname" id="nickname"  value="{{(!empty($user->nickname) and $user->nickname != '') ? $user->nickname : '0'}}">
        </div>
        <div>
            <span style="color: white">Age:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="age" id="age" value="{{(!empty($user->age) and $user->age != '') ? $user->age : '0'}}" >
        </div>
        <div>
            <span style="color: white">Birthday:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="birthday"  id="birthday" value="{{(!empty($user->birthday) and $user->birthday != '') ? $user->birthday : '0'}}">
        </div>

        <div>
            <span style="color: white">Role:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="role" id="role" value="{{(!empty($user->role) and $user->role != '') ? $user->role : '0'}}" >
        </div>

        <div>
            <span style="color: white">Image:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="image" id="image" value="{{(!empty($user->image) and $user->image != '') ? $user->image : '0'}}" >
        </div>

        <div>
            <span style="color: white">Status:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="status"  id="status" value="{{(!empty($user->status) and $user->status != '') ? $user->status : '0'}}">
        </div>

    </form>

{{--    <!-- Import thư viện datepicker.js -->--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/js-datepicker@5.18.2/dist/datepicker.min.js"></script>--}}
{{--    <!-- Import CSS của datepicker -->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/js-datepicker@5.18.2/dist/datepicker.min.css" rel="stylesheet">--}}

{{--    <script>--}}
{{--     var  picker = datepicker('#birthday');--}}
{{--    </script>--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#birthday" ).datepicker();
        } );
    </script>

@endsection

