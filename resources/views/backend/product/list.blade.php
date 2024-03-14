
@extends('backend.layout.master')
@section('content')
    <style>
        .card{
            padding: 5px;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0);
            border: none;

        }
        .card-inner {
            background-color: rgba(255, 255, 255, 255);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            text-align: center;
            font-family: arial;
            border-radius: 10px;
        }

        .price {
            color: grey;
            font-size: 22px;
        }

        .card button {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }
        .card button:hover {
            opacity: 0.7;

        }
        .container{
            background-image: url('public/upload/cf.png')!important;
        }
    </style>
        <form class="form-inline my-2 my-lg-0" action="{{ route('products.search') }}" method="GET">
            <input id="search-product" style="width: 800px" class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>



    <div class="container" >
            <div class="row" id="product-list" >
                @foreach($products as $product)
                    <div class="card col-4 mt-5 mb-5" >
                        <div class="card-inner p-1" style="border-radius: 5px">
                            <img style="width: 100%" src="{{asset("image/$product->image")}}" >
                            <h4 class="card-title">{{$product["name"]}}</h4>
                            <h4 class="card-text">{{number_format($product["price"]). "₫"}}</h4>
                            <a style="width: 20px" type="button" class="btn btn-warning" href="{{route('products.detail', $product->id)}}">
                                <i style="font-size: 20px" class="fas fa-info"></i>
                            </a>
                            <a type="button" class="btn btn-success" href="{{route('edit.form',$product->id)}}">
                                <i style="font-size: 20px" class="fad fa-calendar-day"></i>
                            </a>
                            <a style="font-size: 15px" type="button" class="btn btn-danger" onclick="return confirm('Are you sure ??')"
                               href="{{route('products.delete',$product->id)}}"><i class="fas fa-trash-alt"></i>

                            </a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
<script src="{{asset("js/product.js")}}"></script>
@endsection

