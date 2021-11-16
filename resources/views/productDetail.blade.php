@extends('layout.app')

@section('customCss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/basic/productDetail.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsive/productDetailResponsive.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')


        <section class="product">
            <div class="leftPart">
                <div>
                    <div class="col-12 mb-1">
                        <div class="lightbox">
                            <img
                                src="{{ asset($product->image.'.jpg') }}"
                                alt="Gallery image 1"
                                class="active"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightPart">
                <div class="textPart">
                    <h1>{{$product->name}}</h1>
                    <p>{{$product->longDescription}}</p>
                </div>
                <div class="functionalPart">
                    <div class="reviewPart">
                        <p>Recenzie</p>
                        <div class="ratingReview">
                            <h3 class="getHigher">{{$product->rating}}</h3>
                        </div>


                    </div>
                    @if($product->discountedPrize)
                        <div>
                            <h2 class="price">{{$product->discountedPrize}}</h2>
                            <h2 class="crossedPrice">{{$product->prize}}</h2>
                        </div>
                    @else
                        <h2 class="price">{{$product->prize}} €</h2>
                    @endif
                    <form action="{{ route('shoppingCart.update',$product->id) }}" method="post">
                        @method('put')
                        @csrf
                        <label for="amount">Počet kusov:</label>
                        <input id="amount" name="quantity" type="number" min="1"
                               value="1"/>
                        <input type="submit" class="buttonWhite" value="Pridať do košíka"/>
                    </form>
                </div>
            </div>
        </section>
        <section class="recommendations">
            <h1>Podobné produkty</h1>
            <div class="slider">
                @foreach($similarProducts as $product)
                    <div>
                        <div class="sliderElement">
                            <div class="sliderInnerElement">
                                <a href="/products/{{$product->id}}">
                                    <img srcset="{{ asset($product->image.'_200.jpg') }} 480w,
                                 {{ asset($product->image.'_300.jpg') }} 800w"
                                         sizes="(max-width: 600px) 480px, 800px"
                                         src="{{ asset($product->image.'.jpg') }}"
                                         alt="Odporucame"
                                         width="200" height="200">
                                </a>
                                <p>{{$product->name}}</p>
                                <p>{{$product->prize}} €</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </br>
        </section>
@endsection

