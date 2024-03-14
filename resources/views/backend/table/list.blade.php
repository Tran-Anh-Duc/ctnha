@extends("backend.layout.master")
@section("content")

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table</title>
    <style>

        .card-body {
            background: #060000;
            border-radius: 15px;
            cursor: pointer;
        }


        /*.card-body:hover {*/
        /*    background: green;*/

        .ordered{
            background-color: #f7f8f7!important;

        }




        .ordered {
            background-color: white !important;
        }

    </style>
</head>
<body  >


<div class="row">
    @foreach($tables as $key => $table)
        <div class="col-4 mt-5 mb-5">

            <div style="width: 80%; padding: 30px ;border-radius: 50px; background: black"
                 class="card {{ (session()->has("table-".$table->id) && count(session()->get("table-".$table->id))>0)?"ordered":"" }}">
                <a href="{{route("products.order", $table->id)}}">
{{--                <a onclick="displayOrder({{$table->id}})">--}}
                    <img style="width: 100%" src="{{asset("upload/table1.png")}}" class="card-img-top" alt="">
                </a>

                <div class="card-body">
                    <h5 class="card-title" style="color: white; text-align: center;height: 5px">{{$table->name}}</h5>
                </div>

            </div>
        </div>
    @endforeach
</div>

</body>
</html>
@endsection
