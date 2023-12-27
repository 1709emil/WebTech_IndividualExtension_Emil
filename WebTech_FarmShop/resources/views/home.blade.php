<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
@extends('ViewTemplate')
<link rel="stylesheet" href="{{asset('css/about.css')}}"

@section('title')
    <title>About page</title>
@endsection

@section('header')
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 padder">
                <img src="{{ asset('images/IMG_0770.jpeg') }}" alt="stockPhoto1" class="grid-picture" >
            </div>
            <div class="col-xs-12 col-md-8">
                <div class="text-box">
                    <p>
                        Welcome to the Farm Shop, where we bring the freshest produce right to your table. Our family-owned shop features an abundance of locally-sourced fruits, vegetables, and handcrafted goods. As you wander through our aisles, you'll find a colorful tapestry of seasonal items, artisanal cheeses, and freshly-baked bread. Our commitment is to sustainability and community, ensuring that every purchase supports local farmers and artisans. Discover the true taste of the countryside with our selection of organic, non-GMO, and pesticide-free products. Green Acres is not just a shop; it's a return to the wholesome simplicity of farm-to-fork living.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4 padder">
                <img src="{{ asset('images/IMG_3103.jpeg ') }}" alt="stockPhoto2" class="grid-picture">
            </div>
            <div class="col-xs-12 col-md-8">
                <div class="text-box">
                    <p>
                        Venturing further into the rustic charm of our establishment, Farm Shop emerges as an extension of our passion for organic agriculture and ethical farming practices. Here, the shelves brim with natural foods from heritage grains to raw, unfiltered honey, and meats raised in pastures not pens. Our dedication is evident in the rich flavors and unmatched purity of our products, all non-GMO and free from synthetic pesticides. Every visit to Meadowlark is more than just a shopping trip—it's an immersive experience into the rhythms of nature and a celebration of the artisanal spirit.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="text-boxContant">
                        <h3 style="color : white">
                            Phone number : 123456789 <br>
                            <img class="logo" src="{{asset('images/FarmShop-logos_white.png')}}" alt="logo" style="float: right" >

                            Email :        at@at.com <br>
                            Adress : Placeholderroad nr 15a <br>
                            CVR : 671327813

                        </h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

