@extends('layout.app')

@section('customCss')
    <link href="{{ asset('css/basic/products.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsive/productsResponsive.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <section class="searchOptions">
        <a href="/products"><span style="white-space: nowrap">Top</span></a>
        <a href="/products"><span style="white-space: nowrap">Najpredávanejšie</span></a>
        <a href="/products"><span style="white-space: nowrap">Najdrahšie</span></a>
        <a href="/products"><span style="white-space: nowrap">Najlacnejšie</span></a>
        <a href="/products"><span style="white-space: nowrap">Top podľa recenzií</span></a>
    </section>
    <section class="filtering">
        <form class="formFiltering row align-items-center">
            <fieldset class="grid col-lg-3 col-sm-6">
                <legend>Cena</legend>
                <label for="priceRange" id="priceRangeLbl">100 €</label>
                <input type="range" class="form-range" min="0" max="200" step="1" id="priceRange">
            </fieldset>
            <fieldset class="grid col-lg-3 col-sm-6">
                <legend>Veľkosť</legend>
                <div class="row align-items-center">
                    <div class="grid col-6">
                        <input type="checkbox" id="sizeM" name="sizeM">
                        <label for="sizeM">M</label>
                    </div>
                    <div class="grid col-6">
                        <input type="checkbox" id="sizeS" name="sizeM">
                        <label for="sizeS">S</label>
                    </div>
                    <div class="grid col-6">
                        <input type="checkbox" id="sizeL" name="sizeM">
                        <label for="sizeL">L</label>
                    </div>
                    <div class="grid col-6">
                        <input type="checkbox" id="sizeXL" name="sizeM">
                        <label for="sizeXL">XL</label>
                    </div>
                </div>
            </fieldset>
            <fieldset class="grid col-lg-3 col-sm-6">
                <legend>Značka</legend>
                <div class="row align-items-center">
                    <div class="grid col-6">
                        <input type="checkbox" id="ocun" name="sizeM">
                        <label for="ocun">Ocun</label>
                    </div>
                    <div class="grid col-6">
                        <input type="checkbox" id="petzl" name="sizeM">
                        <label for="petzl">Petzl</label>
                    </div>
                    <div class="grid col-6">
                        <input type="checkbox" id="ortovox" name="sizeM">
                        <label for="ortovox">Ortovox</label>
                    </div>
                    <div class="grid col-6">
                        <input type="checkbox" id="singingRock" name="sizeM">
                        <label for="singingRock">Singing Rock</label>
                    </div>
                </div>
            </fieldset>
            <fieldset class="lastPart grid col-lg-3 col-sm-6">
                <div>
                    <input type="submit" class="buttonBlack" value="Filtruj">
                </div>
            </fieldset>
        </form>
    </section>
    <section class="allProducts">
        <div class="row align-items-center">
            @foreach($productsList as $product)
            <article class="grid col-lg-4 col-sm-6">
                <div class="gridItem">
                    <h1>{{$product->name}}</h1>
                    <a href="/products/{{$product->id}}">
                        <img srcset="{{ asset('images/mainPage/bestOfWeek_200.png') }} 480w,
                             {{ asset('images/mainPage/bestOfWeek_400.png') }} 800w"
                             sizes="(max-width: 600px) 480px, 800px"
                             src="{{ asset('images/mainPage/bestOfWeek_400.png') }}"
                             alt="{{$product->name}}"
                             width="280">
                    </a>
                    <p class="price">{{$product->prize}} €</p>
                    <form action="{{ route('shoppingCart.update',$product->id) }}" method="post">
                        @method('put')
                        @csrf
                        <input id="hidden" name="quantity" style="display: none" type="number" value="1"/>
                        <input type="submit" class="buttonBlack" value="Pridať do košíka"/>
                    </form>
                </div>
            </article>
            @endforeach
        </div>

    </section>
    <section class="padding">
        @if ($productsList->hasPages())
                {{ $productsList->links() }}
        @else
            <p>Všetky výsledky zobrazené</p>
        @endif
    </section>
@endsection

@section('customJs')
    <script>
        randomBackground();
        document.getElementById('priceRange').addEventListener('mousemove', function () {
            document.getElementById('priceRangeLbl').innerHTML = document.getElementById('priceRange').value + ' €';
        });
    </script>
@endsection
