@extends('layout.app')

@section('customCss')
    <link href="{{ asset('css/basic/shoppingCard.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsive/shoppingCardResponsive.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ asset('js/helperMethods.js') }}"></script>
@endsection

@section('content')
    @if(!($order->productGroups))
        <section class="itemTypes">
            <p>V košíku sa nič nenachádza</p>
        </section>
    @else
        @foreach($order->productGroups as $productGroup)
            <section class="itemTypes">
                <div class="leftPart">
                    <div class="imagePart">
                        <img src="{{ asset('images/products/climbingShoes/lezecka1.jpg') }}" alt="Lezecka">
                    </div>
                    <div class="textPart">
                        <h2>{{$productGroup->product->name}}</h2>
                        <p>{{$productGroup->shortDescription}}</p>
                    </div>
                </div>
                <div class="rightPart">
                    <div class="functionalPart">
                        <label for="amount-selector">
                            <span>Počet kusov:</span>
                            <select id="amount-selector" name="amount">
                                <option value="1">{{$productGroup->quantity}}</option>
                            </select>
                        </label>
                        <h2>{{$productGroup->sum}}</h2>
                    </div>
                    <div class="closePart">
                        <button>X</button>
                    </div>
                </div>
            </section>
        @endforeach

        <section class="summaryInfo">
            <p>Spolu: {{$order->totalSum}} €</p>
            <a class="buttonBlack" href="/delivery">Pokračovať</a>
        </section>
    @endif
@endsection
