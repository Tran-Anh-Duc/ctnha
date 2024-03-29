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
{{--    <div class="card mb-xxl-5" style=";margin-top: 50px" >--}}
{{--       --}}
{{--    </div>--}}
    <div class="container">
    <h2 style="text-align: center;margin-top: 20px;margin-left: 20%;color: whitesmoke">Manager User</h2>
    <div style="float: left">
        <a type="button" href="{{route("ctn.viewCreateHouseProduct")}}" class="btn btn-danger" style="float: right;width: 70px" title="thêm sản phẩm mới">ADD</a>
    </div>
    <table border="1px" class="table table-striped table-dark " style="margin-top: 50px;width: 140%; ">

        <tr>
            <th colspan="1">ID</th>
            <th style="width: 200px;">name</th>
            <th >address</th>
            <th >number_bedrooms</th>
            <th >number_bathrooms</th>
            <th >description</th>
            <th >price</th>
            <th >type_house_id</th>
            <th colspan="3" style="text-align: center">Action</th>
        </tr>


        @foreach($items as $key=>$value)
            <tr>
                <td colspan="1">{{$key+1}}</td>
                <td >{{$value['name']}}</td>
                <td >{{$value['address']}}</td>
                <td >{{$value['number_bedrooms']}}</td>
                <td >{{$value['number_bathrooms']}}</td>
                <td >{{$value['description']}}</td>
                <td >{{$value['price']}}</td>
                <td >{{$value['type_house_id']}}</td>
                <td><a  type="button" href="{{ route('ctn.detailHouseProduct', ['id' => $value['id']]) }}"
                    ><i style="font-size: 30px;color: yellow" class="fad fa-calendar-day"></i></a></td>
                <td><a  type="button"  onclick="return confirm(' Are you sure ? ')" href="{{route('ctn.deleteHouseProduct',['id' => $value['id']])}}"><i style="font-size: 30px;color: red" class="fas fa-trash-alt"></i></a></td>
            </tr>
        @endforeach

    </table>
</div>
@endsection
