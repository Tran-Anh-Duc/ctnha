
@extends("backend.layout.master")
@section('content')
    <style>
        .toast-error{
            background-color: red;
        }

        .toast-success{
            background-color: green;
        }

        .is-invalid {
            border-color: #dc3545; /* Màu viền đỏ */
        }
    </style>
    <?php
        $message = \Illuminate\Support\Facades\Session::get('message');

        if ($message){
                echo '<span class="text-alert">'.$message.'</span>';
            \Illuminate\Support\Facades\Session::put('message',null);
        }
    ?>

        <form action="{{route('ctn.updateHouseProduct', ['id' =>$item['id'] ])}}" method="post">
            <h1 style="color: #00b0ff">Edit</h1>
            @csrf
            <button class="btn btn-success" type="submit">Change</button>
            <a  class="btn btn-success" type="button" href="{{route('ctn.listHouseProduct')}}">Back</a>
            <div>
                <span style="color: white">Họ và tên:</span><br>
                <input style="width: 500px" class="alert alert-primary @error('name') is-invalid @enderror" role="alert" type="text"  name="name" id="name" value="{{(!empty($item['name']) and $item['name'] != '') ? $item['name'] : ''}}">
                @error('name')
                <p class="text text-danger">{{$message}}</p>
                @enderror
            </div>
            <div>
                <span style="color: white">address:</span><br>
                <input style="width: 500px" class="alert alert-primary @error('address') is-invalid @enderror" role="alert" type="text" name="address" id="address"  value="{{(!empty($item['address']) and $item['address'] != '') ? $item['address'] : ''}}" >
                @error('address')
                <p class="text text-danger">{{$message}}</p>
                @enderror
            </div>
            <div>
                <span style="color: white">number_bedrooms:</span><br>
                <input style="width: 500px" class="alert alert-primary @error('number_bedrooms') is-invalid @enderror" role="alert" type="text" name="number_bedrooms" id="number_bedrooms" value="{{(!empty($item['number_bedrooms']) and $item['number_bedrooms'] != '') ? $item['number_bedrooms'] : ''}}" >
                @error('number_bedrooms')
                <p class="text text-danger">{{$message}}</p>
                @enderror
            </div>
            <div>
                <span style="color: white">number_bathrooms:</span><br>
                <input style="width: 500px" class="alert alert-primary @error('number_bathrooms') is-invalid @enderror" role="alert" type="text" name="number_bathrooms"  id="number_bathrooms" value="{{(!empty($item['number_bathrooms']) and $item['number_bathrooms'] != '') ? $item['number_bathrooms'] : ''}}">
                @error('number_bathrooms')
                <p class="text text-danger">{{$message}}</p>
                @enderror
            </div>
            <div>
                <span style="color: white">description:</span><br>
                <input style="width: 500px" class="alert alert-primary @error('description') is-invalid @enderror" role="alert" type="text" name="description" id="description" value="{{(!empty($item['description']) and $item['description'] != '') ? $item['description'] : ''}}" >
                @error('description')
                <p class="text text-danger">{{$message}}</p>
                @enderror
            </div>
            <div>
                <span style="color: white">price:</span><br>
                <input style="width: 500px" class="alert alert-primary @error('price') is-invalid @enderror" role="alert" type="text" name="price" id="price"  value="{{(!empty($item['price']) and $item['price'] != '') ? $item['price'] : ''}}">
                @error('price')
                <p class="text text-danger">{{$message}}</p>
                @enderror
            </div>
            <div>
                <span style="color: white">type_house_id:</span><br>
                <input style="width: 500px" class="alert alert-primary @error('type_house_id') is-invalid @enderror" role="alert" type="text" name="type_house_id" id="type_house_id" value="{{(!empty($item['type_house_id']) and $item['type_house_id'] != '') ? $item['type_house_id'] : ''}}" >
                @error('type_house_id')
                <p class="text text-danger">{{$message}}</p>
                @enderror
            </div>
        </form>



    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


    <script>
        $( function() {
            //$( "#birthday" ).datepicker();
        } );
    </script>

@endsection

