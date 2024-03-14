
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
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="address" id="address"  >
        </div>
        <div>
            <span style="color: white">Gender:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="gender"  id="gender" >
        </div>
        <div>
            <span style="color: white">Passport:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="passport" id="passport"  >
        </div>
        <div>
            <span style="color: white">Nickname:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="nickname" id="nickname"  >
        </div>
        <div>
            <span style="color: white">Age:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="age" id="age"  >
        </div>
        <div>
            <span style="color: white">Birthday:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="birthday"  id="birthday" >
        </div>

        <div>
            <span style="color: white">Role:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="role" id="role"  >
        </div>

        <div>
            <span style="color: white">Image:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="image" id="image"  >
        </div>

        <div>
            <span style="color: white">Status:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="status"  id="status" >
        </div>

        <div>
            <span style="color: white">Status:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" id="status" name="status">
        </div>
    </form>
@endsection

