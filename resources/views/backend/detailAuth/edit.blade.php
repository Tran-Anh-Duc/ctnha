
@extends("backend.layout.master")
@section('content')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <style>
        .toast-error{
            background-color: red;
        }

        .toast-success{
            background-color: green;
        }
    </style>
    <form action="{{route('ctn.createUserDetail', ['id' =>$user->id ])}}" method="post" enctype="multipart/form-data">
        <h1 style="color: #00b0ff">Edit</h1>
        @csrf
        <button class="btn btn-success" type="submit">Change</button>
        <a  class="btn btn-success" type="button" href="{{route('ctn.listUserDetail')}}">Back</a>
        <div>
            <span style="color: white">Họ và tên:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="name" id="name" value="{{(!empty($user->name) and $user->name != '') ? $user->name : ''}}">
        </div>
        <div>
            <span style="color: white">Email:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="email" id="email"  value="{{(!empty($user->email) and $user->email != '') ? $user->email : ''}}" >
        </div>
        <div>
            <span style="color: white">Address:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="address" id="address" value="{{(!empty($user->address) and $user->address != '') ? $user->address : ''}}" >
        </div>
        <div>
            <span style="color: white">Gender:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="gender"  id="gender" value="{{(!empty($user->gender) and $user->gender != '') ? $user->gender : ''}}">
        </div>
        <div>
            <span style="color: white">Passport:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="passport" id="passport" value="{{(!empty($user->passport) and $user->passport != '') ? $user->passport : ''}}" >
        </div>
        <div>
            <span style="color: white">Nickname:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="nickname" id="nickname"  value="{{(!empty($user->nickname) and $user->nickname != '') ? $user->nickname : ''}}">
        </div>
        <div>
            <span style="color: white">Age:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="age" id="age" value="{{(!empty($user->age) and $user->age != '') ? $user->age : ''}}" >
        </div>
        <div>
            <span style="color: white">Birthday:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="birthday"  id="birthday" value="{{(!empty($user->birthday) and $user->birthday != '') ? date('d/m/Y',$user->birthday) : ''}}">
        </div>

        <div>
            <span style="color: white">Role:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="role" id="role" value="{{(!empty($user->role) and $user->role != '') ? $user->role : ''}}" >
        </div>

        <div>
            <span style="color: white">Image:</span><br>
{{--            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="image" id="image" value="{{(!empty($user->image) and $user->image != '') ? $user->image : ''}}" >--}}

{{--            <input style="width: 500px" type="file"  name="image" id="image" required class="alert alert-primary" role="alert">--}}
            <input type="file" name="image" id="image"  required>
{{--            <img src="{{ asset('images/'.$user->image) ?? asset('images/imagedefaut.png')}}" alt="" style="width: 300px; height: 150px;margin-left: -65px">--}}
            <img src="{{ (!empty($user->image) and $user->image != '')? asset('images/'.$user->image) : asset('images/imagedefaut.png')  }}" alt="" style="width: 300px; height: 150px;margin-left: -65px">
        </div>

        <div style="margin-bottom: 150px">
            <span style="color: white">Status:</span><br>
            <select name="status" id="status" class="alert alert-primary" role="alert" style="width: 500px">
                <option value="1" {{(!empty($user->status) and $user->status == '1') ? "selected" : ''}}  >Active</option>
                <option value="2" {{(!empty($user->status) and $user->status == '2') ? "selected" : ''}}  >block</option>
            </select>

        </div>

    </form>

    <script>

        $('#birthday').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>

    </script>

@endsection

