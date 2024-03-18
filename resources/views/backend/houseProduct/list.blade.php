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
            <div>
{{--                <button style="float: right;width: 70px" class="btn btn-danger" title="thêm sản phẩm mới"> </button>--}}
                <a type="button" href="{{route("ctn.viewCreateHouseProduct")}}" class="btn btn-danger" style="float: right;width: 70px" title="thêm sản phẩm mới">ADD</a>

            </div>
            <table border="1px" class="table table-dark" style="margin-top: 50px">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>address</th>
                    <th>number_bedrooms</th>
                    <th>number_bathrooms</th>
                    <th>description</th>
                    <th>price</th>
                    <th>type_house_id</th>
                    <th colspan="3" style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $key=>$value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value['name']}}</td>
                        <td>{{$value['address']}}</td>
                        <td>{{$value['number_bedrooms']}}</td>
                        <td>{{$value['number_bathrooms']}}</td>
                        <td>{{$value['description']}}</td>
                        <td>{{$value['price']}}</td>
                        <td>{{$value['type_house_id']}}</td>
                        <td><a  type="button" href="{{ route('ctn.detailHouseProduct', ['id' => $value['id']]) }}"
                            ><i style="font-size: 30px;color: yellow" class="fad fa-calendar-day"></i></a></td>
                        <td><a  type="button"  onclick="return confirm(' Are you sure ? ')" href="#"><i style="font-size: 30px;color: red" class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
