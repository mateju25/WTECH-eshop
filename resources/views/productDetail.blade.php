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
                                src="{{ asset('images/mainPage/bestOfWeek.png') }}"
                                alt="Gallery image 1"
                                class="active"
                            />
                        </div>
                    </div>
                    <div id="galleryRow">
                        <div class="col-3 mt-1">
                            <img
                                src="{{ asset('images/mainPage/bestOfWeek.png') }}"
                                data-mdb-img="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg"
                                alt="Gallery image 1"
                                class="active w-100"
                            />
                        </div>
                        <div class="col-3 mt-1">
                            <img
                                src="{{ asset('images/mainPage/set.jpg') }}"
                                data-mdb-img="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg"
                                alt="Gallery image 2"
                                class="w-100"
                            />
                        </div>
                        <div class="col-3 mt-1">
                            <img
                                src="{{ asset('images/mainPage/lezecky.jpg') }}"
                                data-mdb-img="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
                                alt="Gallery image 3"
                                class="w-100"
                            />
                        </div>
                        <div class="col-3 mt-1">
                            <img

                                src="{{ asset('images/mainPage/sedak.jpg') }}"
                                data-mdb-img="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                                alt="Gallery image 4"
                                class="w-100"
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
                            <img src="{{ asset('images/productDetail/star.png') }}" alt="Recenzie" width="80" height="80">
                            <h3 class="getHigher">{{$product->rating}}</h3>
                        </div>


                    </div>
                    <h2>{{$product->prize}}</h2>
                    <a href="shoppingCard.html" class="buttonBlack">Pridať do košíka</a>
                </div>
            </div>
        </section>
        <section class="recommendations">
            <h1>Podobné produkty</h1>
            <div class="slider">
                <div>
                    <div class="sliderElement">
                        <div class="sliderInnerElement">
                            <img class="bestOfWeek" src="{{ asset('images/mainPage/bestOfWeek.png') }}" alt="Hit týždňa">
                            <p>Lezecky</p>
                            <p>50 €</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="sliderElement">
                        <div class="sliderInnerElement">
                            <img class="bestOfWeek" src="{{ asset('images/mainPage/lezecky.jpg') }}" alt="Hit týždňa">
                            <p>Lezecky</p>
                            <p>50 €</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="sliderElement">
                        <div class="sliderInnerElement">
                            <img class="bestOfWeek" src="{{ asset('images/mainPage/set.jpg') }}" alt="Hit týždňa">
                            <p>Lezecky</p>
                            <p>50 €</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="sliderElement">
                        <div class="sliderInnerElement">
                            <img class="bestOfWeek" src="{{ asset('images/mainPage/sedak.jpg') }}" alt="Hit týždňa">
                            <p>Lezecky</p>
                            <p>50 €</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="sliderElement">
                        <div class="sliderInnerElement">
                            <img class="bestOfWeek" src="{{ asset('images/mainPage/lano.jpg') }}" alt="Hit týždňa">
                            <p>Lezecky</p>
                            <p>50 €</p>
                        </div>
                    </div>
                </div>
            </div>
            </br>
        </section>
@endsection

