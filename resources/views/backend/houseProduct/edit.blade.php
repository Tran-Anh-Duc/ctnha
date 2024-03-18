
@extends("backend.layout.master")
@section('content')
    <?php
        $message = \Illuminate\Support\Facades\Session::get('message');

        if ($message){
                echo '<span>'.$message.'</span>';
            \Illuminate\Support\Facades\Session::put('message',null);
        }
    ?>
    <form action="{{route('ctn.updateHouseProduct', ['id' =>$item['id'] ])}}" method="post">
        <h1 style="color: #00b0ff">Edit</h1>
        @csrf
        <button class="btn btn-success" type="submit">Change</button>
        <a  class="btn btn-success" type="button" href="{{route('ctn.listUserDetail')}}">Back</a>
        <div>
            <span style="color: white">Họ và tên:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="name" id="name" value="{{(!empty($item['name']) and $item['name'] != '') ? $item['name'] : ''}}">
        </div>
        <div>
            <span style="color: white">address:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="address" id="address"  value="{{(!empty($item['address']) and $item['address'] != '') ? $item['address'] : ''}}" >
        </div>
        <div>
            <span style="color: white">number_bedrooms:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="number_bedrooms" id="number_bedrooms" value="{{(!empty($item['number_bedrooms']) and $item['number_bedrooms'] != '') ? $item['number_bedrooms'] : ''}}" >
        </div>
        <div>
            <span style="color: white">number_bathrooms:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="number_bathrooms"  id="number_bathrooms" value="{{(!empty($item['number_bathrooms']) and $item['number_bathrooms'] != '') ? $item['number_bathrooms'] : ''}}">
        </div>
        <div>
            <span style="color: white">description:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="description" id="description" value="{{(!empty($item['description']) and $item['description'] != '') ? $item['description'] : ''}}" >
        </div>
        <div>
            <span style="color: white">price:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="price" id="price"  value="{{(!empty($item['price']) and $item['price'] != '') ? $item['price'] : ''}}">
        </div>
        <div>
            <span style="color: white">type_house_id:</span><br>
            <input style="width: 500px" class="alert alert-primary" role="alert" type="text" name="type_house_id" id="type_house_id" value="{{(!empty($item['type_house_id']) and $item['type_house_id'] != '') ? $item['type_house_id'] : ''}}" >
        </div>
    </form>
    @toastr_render
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

