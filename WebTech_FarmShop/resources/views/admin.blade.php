<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

@extends('ViewTemplate')

@section('script')
    <script defer src="{{asset("js/adminOptions.js")}}"></script>
@endsection

@section('title')
    <title>Admin</title>
@endsection

@section('main')

    @if(Auth::user()->CheckRole(Auth::user()) == 'Admin')
    <div>
        {{--Window for showing all users in the system--}}
        <h1>User information</h1>
            <div>
                @foreach($data[1] as $item)
                    @include("components.listUsers",
                    ['userName'=>$item->name, 'userID'=>$item->id,
                    'userEmail'=>$item->email,'userPhoneNumber'=>$item->phoneNumber])
                @endforeach

            </div>
    </div>
    @endif
    <div>
        <div>
            {{--Window to add product--}}
            <h1>Create product</h1>
                @include("components.createProduct")
        </div>
    </div>
    <div>
        <div style="padding-left: 15px">
            <h1>Delete product</h1>
            @include('components.deleteProduct')
        </div>
    </div>
    <div>
        <div style="padding-left: 15px">
            <h1>Change product</h1>
            @foreach($data[2] as $item)
            @include('components.updateProduct')
            @endforeach
        </div>
    </div>
    <div style="padding-left: 15px">
        <h1>Orders</h1>
        {{--Window for showing all orders in the database--}}
        <div class="edit-main">
            @foreach($data[0] as $item)
                @include("components.changeProduct",
                ['orderDate'=>$item->date,'boughtAmount'=>$item->quantityBought,
                'priceTotal'=>$item->totalPrice,'createdAt'=>$item->created_at,
                'updatedAt'=>$item->updated_at, 'OrderID'=>$item->id,])
                @foreach($item->product as $item1)
{{--                    <p>{{$item1}}</p>--}}
                    @include("components.showProduct",['productName'=>$item1->name,'productID'=>$item1->id,'productPrice'=>$item1->price,'productDescription'=>$item1->description])

                @endforeach
            @endforeach
        </div>
    </div>
@endsection
