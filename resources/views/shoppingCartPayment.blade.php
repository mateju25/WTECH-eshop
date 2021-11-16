@extends('layout.app')

@section('customCss')
    <link href="{{ asset('css/basic/delivery.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsive/deliveryResponsive.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ asset('js/helperMethods.js') }}"></script>
@endsection

@section('content')
    @if(count($order->productGroups) == 0)
        <section class="itemTypes">
            <p>V košíku sa nič nenachádza</p>
        </section>
    @else
        <section id="mainPart">
            <form action="{{ route('shoppingCartPayment.store')}}" method="post">
                @method('post')
                @csrf
                <fieldset class="typeOfPayment">
                    <legend>Zvoliť typ platby:</legend>
                    @for($i = 0; $i < count($paymentTypes); $i++)
                        <div class="@if($order->paymentType != null and $order->paymentType->id == $paymentTypes[$i]->id)option-hover @else option @endif" id="option{{$i}}">
                            <input type="radio" name="paymentType" id="delivery_{{$i}}" value="{{$paymentTypes[$i]->id}}"  @if($order->paymentType != null and $order->paymentType->id == $paymentTypes[$i]->id)checked="{{true}}" @endif required>
                            <div class="spacing">
                                <label for="delivery_{{$i}}">{{$paymentTypes[$i]->name}}</label>
                                <label for="delivery_{{$i}}" style="font-weight: bold">{{$paymentTypes[$i]->prize}}€</label>
                            </div>
                        </div>
                    @endfor
                </fieldset>
                <fieldset class="functionalPart">
                    <div class="rightPart">
                        <input class="buttonBlack" id="paymentBtn" type="submit" value="Platba"/>
                        <h2 class="price">{{$order->totalSumWithDelivery()}} €</h2>
                    </div>
                    <a class="buttonBlack" href="/shoppingCartDelivery">Späť</a>
                </fieldset>
            </form>
        </section>
    @endif
@endsection