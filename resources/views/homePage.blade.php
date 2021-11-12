@extends('layout.app')

@section('customCss')
    <link href="{{ asset('css/basic/mainPage.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsive/mainPageResponsive.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <section class="menu">
        <div class="row align-items-center">
            <div class="grid col-lg-4 col-sm-6">
                <div class="gridItem">
                    <h2>Lezečky</h2>
                    <a href="products.html?query=lezecky">
                        <img class="menuPicture"
                             src="{{ asset('images/mainPage/lezecky_400.jpg') }}"
                             alt="Lezec.sk"
                             width="140" height="140">
                    </a>
                </div>
            </div>
            <div class="grid col-lg-4 col-sm-6">
                <div class="gridItem">
                    <h2>Kurzy</h2>
                    <a href="products.html?query=kurzy">
                        <img class="menuPicture"
                             src="{{ asset('images/mainPage/kurz_400.jpg') }}"
                             alt="Lezec.sk"
                             width="140" height="140">
                    </a>
                </div>
            </div>
            <div class="grid col-lg-4 col-sm-6">
                <div class="gridItem">
                    <h2>Výbava</h2>
                    <a href="products.html?query=vybava">
                        <img class="menuPicture"
                             src="{{ asset('images/mainPage/vybava_400.jpg') }}"
                             alt="Lezec.sk"
                             width="140" height="140">
                    </a>
                </div>
            </div>
            <div class="grid col-lg-4 col-sm-6">
                <div class="gridItem">
                    <h2>Laná</h2>
                    <a href="products.html?query=lano">
                        <img class="menuPicture"
                             src="{{ asset('images/mainPage/lano_400.jpg') }}"
                             alt="Lezec.sk"
                             width="140" height="140">
                    </a>
                </div>
            </div>
            <div class="grid col-lg-4 col-sm-6">
                <div class="gridItem">
                    <h2>Sety</h2>
                    <a href="products.html?query=set">
                        <img class="menuPicture"
                             src="{{ asset('images/mainPage/set_400.jpg') }}"
                             alt="Lezec.sk"
                             width="140" height="140">
                    </a>
                </div>
            </div>
            <div class="grid col-lg-4 col-sm-6">
                <div class="gridItem">
                    <h2>Ostatné</h2>
                    <a href="products.html?query=ostatne">
                        <img class="menuPicture"
                             src="{{ asset('images/mainPage/vrecko_400.jpg') }}"
                             alt="Lezec.sk"
                             width="140" height="140">
                    </a>
                </div>
            </div>
        </div>
    </section>
    @if ($bestOfWeek != null)
        <section id="bestOfWeek" class="bestOfWeek">
            <div class="leftPart">
                <h1>HIT TÝŽDŇA</h1>
                <img class="bestOfWeekImg" srcset="{{ asset('images/mainPage/bestOfWeek_200.png') }} 480w,
                     {{ asset('images/mainPage/bestOfWeek_400.png') }} 800w"
                     sizes="(max-width: 600px) 480px, 800px"
                     src="{{ asset('images/mainPage/bestOfWeek_400.png') }}"
                     alt="Hit týždňa"
                     width="350" height="350">
                <p class="floatedDiscount">Zľava 50%</p>
            </div>
            <div class="rightPart">
                <h2>{{$bestOfWeek->name}}</h2>
                <p id="infoAboutBest">{{$bestOfWeek->shortDescription}}</p>
                <div class="buyPart">
                    <div class="pricePart">
                        <h2>{{$bestOfWeek->discountedPrize}}</h2>
                        <h2 class="crossedPrice">{{$bestOfWeek->prize}}</h2>
                    </div>
                    <a href="shoppingCard.html" class="buttonWhite">Kúpiť</a>
                </div>
            </div>
        </section>
    @endif

    <section class="recommendations">
        <h1>Odporúčame</h1>
        <div class="slider">
            @foreach($recommendProducts as $product)
            <div>
                <div class="sliderElement">
                    <div class="sliderInnerElement">
                        <a href="productDetail.html?query=idProduktu">
                            <img srcset="{{ asset('images/mainPage/bestOfWeek_200.png') }} 480w,
                                 {{ asset('images/mainPage/bestOfWeek_400.png') }} 800w"
                                 sizes="(max-width: 600px) 480px, 800px"
                                 src="{{ asset('images/mainPage/bestOfWeek_400.png') }}"
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
    <section class="newsletter">
        <h1>Odber noviniek</h1>
        <form action="/" method="post" class="newsletterForm">
            <label for="email">E-mail: </label>
            <input id="email" type="text" name="email">
            <input class="buttonWhite" type="submit" value="Odošli">
        </form>
    </section>
@endsection
