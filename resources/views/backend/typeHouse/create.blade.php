@extends("backend.layout.master")
@section('content')
    <style>
        .is-invalid {
            border-color: #dc3545; /* Màu viền đỏ */
        }
    </style>
{{--    <div class="card" style="margin-top: 50px;margin-bottom: 100px">--}}
        <form action="{{route('ctn.createHouseProduct')}}" method="post">
            <h1 style="color: #00b0ff;text-align: center">Add Product house</h1>
            <button class="btn btn-success" type="submit" onclick="check_input();" style="margin-left: 20%;width: 150px">Add</button>
            <a class="btn btn-success" type="button" style="width: 150px" href="{{route('ctn.listHouseProduct')}}">back</a>
            @csrf
            <div style="margin-top: 20px">
                <input style="width: 500px;font-size: 12px" placeholder="name" value="{{ old('name') }}" class="alert alert-primary @error('name') is-invalid @enderror" role="alert" type="text" name="name" id="name">
                @error('name')
                <p class="text text-danger">{{$message}}</p>
                @enderror
            </div>

            <div>
                <input style="width: 500px;font-size: 12px" placeholder="address" value="{{ old('address') }}" class="alert alert-primary @error('name') is-invalid @enderror" role="alert" type="text" name="address" id="address">
                @error('address')
                <p class="text text-danger">{{$message}}</p>
                @enderror
            </div>

            <div>
                <input style="width: 500px;font-size: 12px" placeholder="number_bedrooms" value="{{ old('number_bedrooms') }}" class="alert alert-primary @error('name') is-invalid @enderror" role="alert" type="text" name="number_bedrooms" id="number_bedrooms">
                @error('number_bedrooms')
                <p class="text text-danger">{{$message}}</p>
                @enderror
            </div>

            <div>
                <input style="width: 500px;font-size: 12px" placeholder="number_bathrooms" value="{{ old('number_bathrooms') }}" class="alert alert-primary @error('name') is-invalid @enderror" role="alert" id="number_bathrooms" type="text" name="number_bathrooms">
                @error('number_bathrooms')
                <p class="text text-danger">{{$message}}</p>
                @enderror
            </div>

            <div>
                <input style="width: 500px;font-size: 12px" placeholder="description" value="{{ old('description') }}" class="alert alert-primary @error('name') is-invalid @enderror" role="alert" type="text" name="description" id="description">
                @error('description')
                <p class="text text-danger">{{$message}}</p>
                @enderror
            </div>

            <div>
                <input style="width: 500px;font-size: 12px" placeholder="price" value="{{ old('price') }}" class="alert alert-primary @error('name') is-invalid @enderror" role="alert" type="text" name="price" id="price">
                @error('price')
                <p class="text text-danger">{{$message}}</p>
                @enderror
            </div>

            <div>
                <input style="width: 500px;font-size: 12px" placeholder="type_house_id" value="{{ old('type_house_id') }}" class="alert alert-primary @error('name') is-invalid @enderror" role="alert" type="text" name="type_house_id" id="type_house_id">
                @error('type_house_id')
                <p class="text text-danger">{{$message}}</p>
                @enderror
            </div>


        </form>
{{--    </div>--}}

    <script>
        function check_input() {
            if($('#name').val() == ''){
                $('#name').css('border','1px solid red')
                return false;
            }
        }
    </script>

@endsection
