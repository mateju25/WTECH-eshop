@extends('layout.app')

@section('customCss')
    <link href="{{ asset('css/basic/shoppingCard.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsive/shoppingCardResponsive.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ asset('js/helperMethods.js') }}"></script>
@endsection

@section('content')
    @if(count($order->productGroups) == 0)
        <section class="itemTypes">
            <p>V košíku sa nič nenachádza</p>
        </section>
    @else
        @foreach($order->productGroups as $productGroup)
            <section class="itemTypes">
                <div class="leftPart">
                    <div class="imagePart">
                        <a href="/products/{{$productGroup->product->id}}">
                            <img src="{{ asset('images/products/climbingShoes/lezecka1.jpg') }}" alt="Lezecka">
                        </a>
                    </div>
                    <div class="textPart">
                        <h2>{{$productGroup->product->name}}</h2>
                        <p>{{$productGroup->product->shortDescription}}</p>
                    </div>
                </div>
                <div class="rightPart">
                    <div class="functionalPart">
                        <label for="amount-selector">
                            <form action="{{ route('shoppingCart.update',$productGroup->product->id) }}" method="post">
                                @method('put')
                                @csrf
                                <label for="amount">Počet kusov:</label>
                                <input id="amount" name="quantity" type="number" min="1"
                                       value="{{(int) $productGroup->quantity}}"/>
                                <input type="submit" class="buttonBlack" value="OK"/>
                            </form>
                        </label>
                        <h2>{{$productGroup->sum()}} €</h2>
                    </div>
                    <form class="closePart" action="{{ route('shoppingCart.destroy',$productGroup->product->id) }}"
                          method="post">
                        @method('delete')
                        @csrf
                        <input type="submit" class="buttonBlack" value="X"/>
                    </form>
                </div>
            </section>
        @endforeach

        <section class="summaryInfo">
            <a class="buttonBlack" href="{{ $previousPage }}">Späť</a>
            <p>Spolu: {{$order->totalSum()}} €</p>
            <a class="buttonBlack" href="/shoppingCartDelivery">Pokračovať</a>
        </section>
    @endif
@endsection
