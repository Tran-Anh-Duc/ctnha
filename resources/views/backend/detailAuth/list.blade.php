@extends("backend.layout.master")
@section('content')
@section('title', 'Manager User')

    <style>
        td{
            height: 120px;
            width: 40px;
        }
        th{
            height: 60px;
            width: 40px;
        }
    </style>
    <div class="card" style="width: 100%;margin-top: 50px" >
        <div class="container">
            <h2 style="text-align: center;margin-top: 20px">Manager User</h2>
            <table border="1px" class="table table-dark" style="margin-top: 50px">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th colspan="3" style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_user as $key=>$value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
{{--                        <td><a  type="button" href="{{route("categories.showFormEdit",$category->id)}}"><i style="font-size: 30px;color: yellow" class="fad fa-calendar-day"></i></a></td>--}}
                        <td><a  type="button" href="{{route("ctn.editUserDetail",$value->id)}}"><i style="font-size: 30px;color: yellow" class="fad fa-calendar-day"></i></a></td>
{{--                        <td><a  type="button"  onclick="return confirm(' Are you sure ? ')" href="{{route('categories.destroy',$category->id)}}"><i style="font-size: 30px;color: red" class="fas fa-trash-alt"></i></a></td>--}}
                        <td><a  type="button"  onclick="return confirm(' Are you sure ? ')" href="#"><i style="font-size: 30px;color: red" class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
