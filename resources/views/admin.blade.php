@extends('layout.adminLayout')

@section('customCss')
    <link href="{{ asset('css/basic/admin.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <section class="allProducts">
        <button id="newProduct" class="productsBtn">Nový produkt</button>
        <button  class="productsBtn"><a style="color: #0B0C10;" href="/">Hlavná stránka</a></button>
        <table class="product">
            <thead>
            <tr>
                <th>Meno produktu</th>
                <th>Krátky popis</th>
                <th>Dlhý popis</th>
                <th>Značka</th>
                <th>Druh</th>
                <th>Cena</th>
                <th>Zľavnená cena</th>
                <th>Predaných kusov</th>
                <th>Rating</th>
                <th>Je top?</th>
                <th>Je hit tyždňa?</th>
                <th>Obrázok</th>
                <th>Akcie</th>
            </tr>
            </thead>
            @foreach($products as $product)
                <tr>
                    <th>{{$product->name}}</th>
                    <th>{{$product->shortDescription}}</th>
                    <th>{{$product->longDescription}}</th>
                    <th>{{$product->businessType->name}}</th>
                    <th>{{$product->category->name}}</th>
                    <th>{{$product->prize}}</th>
                    <th>{{$product->discountedPrize}}</th>
                    <th>{{$product->soldedCount}}</th>
                    <th>{{$product->rating}}</th>
                    <th>@if($product->top == 1) Áno @else Nie @endif</th>
                    <th>@if($product->bestOfWeek == 1) Áno @else Nie @endif</th>
                    <th><img src="{{ asset($product->image.'.jpg') }}" alt="Obrazok produktu" width="180" height="180"></th>
                    <th>
                        <button class="edit productsBtn" value="{{$product->id}}">Uprav</button>
                        <form class="closePart" action="{{ route('products.destroy',$product->id) }}"
                              method="post">
                            @method('delete')
                            @csrf
                            <button class="remove productsBtn" type="submit">Odstráň</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </table>
    </section>
    <dialog id="editDlg">
        <button id="closeBtn" class="closeBtn productsBtn">X</button>
        <form id="formEditDlg" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <h2>Editácia produktu</h2>
            <fieldset>
                <label for="nameDlg">Meno produktu : </label>
                <input type="text" placeholder="Meno produktu " id="nameDlg" name="name" required>

                <label for="shortDescDlg">Krátky popis : </label>
                <input type="text" placeholder="Krátky popis " id="shortDescDlg" name="shortDesc" required>

                <label for="longDescDlg">Dlhý popis : </label>
                <input type="text" placeholder="Meno produktu " id="longDescDlg" name="longDesc" required>

                <label for="businesssTypeDlg">Značka : </label>
                <select name="businessType" id="businesssTypeDlg" required>
                    @foreach($businessTypes as $businessType)
                        <option value="{{$businessType->id}}">{{$businessType->name}}</option>
                    @endforeach
                </select>

                <label for="categoryDlg">Kategória : </label>
                <select name="category" id="categoryDlg" required>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <label for="prizeDlg">Cena : </label>
                <input type="number" step="any" min="0" placeholder="Cena " id="prizeDlg" name="prize" required>

                <label for="discountDlg">Zľava : </label>
                <input type="number" step="any" placeholder="Zľava " id="discountDlg" name="discount">

                <label for="soldsDlg">Predaných kusov : </label>
                <input type="number" min="0" placeholder="Kusov " id="soldsDlg" name="solds" required>

                <label for="ratingDlg">Rating : </label>
                <input type="number" step="any" min="0" placeholder="Rating " id="ratingDlg" name="rating" required>

                <label for="topDlg">Je top? : </label>
                <input type="checkbox"  id="topDlg" name="top">

                <label for="bestOfWeekDlg">Je hit tyždňa? : </label>
                <input type="checkbox"  id="bestOfWeekDlg" name="bestOfWeek">

                <input type="file" id="imageUpload" class="fileUpload" name="image" accept=".jpg" class="form-control">
            </fieldset>
        </form>
        <input type="submit" class="editBtn productsBtn" form="formEditDlg" value="Odošli">
    </dialog>

    <dialog id="newDlg">
        <button id="closeBtnNewDlg" class="closeBtn productsBtn">X</button>
        <form id="formNewDlg" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @method('post')
            @csrf
            <h2>Editácia produktu</h2>
            <fieldset>
                <label for="nameDlg">Meno produktu : </label>
                <input type="text" placeholder="Meno produktu " id="nameDlg" name="name" required>

                <label for="shortDescDlg">Krátky popis : </label>
                <input type="text" placeholder="Krátky popis " id="shortDescDlg" name="shortDesc" required>

                <label for="longDescDlg">Dlhý popis : </label>
                <input type="text" placeholder="Meno produktu " id="longDescDlg" name="longDesc" required>

                <label for="businesssTypeDlg">Značka : </label>
                <select name="businessType" id="businesssTypeDlg" required>
                    @foreach($businessTypes as $businessType)
                        <option value="{{$businessType->id}}">{{$businessType->name}}</option>
                    @endforeach
                </select>

                <label for="categoryDlg">Kategória : </label>
                <select name="category" id="categoryDlg" required>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <label for="prizeDlg">Cena : </label>
                <input type="number" step="any" min="0" placeholder="Cena " id="prizeDlg" name="prize" required>

                <label for="discountDlg">Zľava : </label>
                <input type="number" step="any" placeholder="Zľava " id="discountDlg" name="discount">

                <label for="soldsDlg">Predaných kusov : </label>
                <input type="number" min="0" placeholder="Kusov " id="soldsDlg" name="solds" required>

                <label for="ratingDlg">Rating : </label>
                <input type="number" step="any" min="0" placeholder="Rating " id="ratingDlg" name="rating" required>

                <label for="topDlg">Je top? : </label>
                <input type="checkbox"  id="topDlg" name="top">

                <label for="bestOfWeekDlg">Je hit tyždňa? : </label>
                <input type="checkbox" id="bestOfWeekDlg" name="bestOfWeek">

                <input type="file"  id="imageUpload" name="image" accept=".jpg" class="form-control fileUpload" required>
            </fieldset>
        </form>
        <input type="submit" class="editBtn productsBtn" form="formNewDlg" value="Odošli">
    </dialog>
@endsection

@section('customJs')
    <script>
        let btns = document.getElementsByClassName('edit');
        let products = {!! json_encode($products->toArray(), JSON_HEX_TAG) !!};
        let dict  = {};
        for (let i = 0; i < products.length; i++) {
            dict[products[i].id] = products[i]
        }
        for (let i = 0; i < btns.length; i++) {
            if (btns[i] !== null) {
                btns[i].addEventListener('click', function () {
                    let productId = btns[i].value;
                    document.getElementById('editDlg').showModal();
                    document.getElementById('nameDlg').value = dict[productId].name;
                    document.getElementById('shortDescDlg').value = dict[productId].shortDescription;
                    document.getElementById('longDescDlg').value = dict[productId].longDescription;
                    document.getElementById("businesssTypeDlg").options[dict[productId].business_type_id - 1].selected = true;
                    document.getElementById("categoryDlg").options[dict[productId].category_id - 1].selected = true;
                    document.getElementById('prizeDlg').value = dict[productId].prize;
                    document.getElementById('discountDlg').value = dict[productId].discountedPrize;
                    document.getElementById('soldsDlg').value = dict[productId].soldedCount;
                    document.getElementById('ratingDlg').value = dict[productId].rating;
                    document.getElementById('topDlg').checked = dict[productId].top;
                    document.getElementById('bestOfWeekDlg').checked = dict[productId].bestOfWeek;
                    document.getElementById('formEditDlg').action = "/products/"+productId;
                    console.log(window.location.origin + dict[productId].image + '.jpg');
                    document.getElementById('imgDlg').src = window.location.origin + dict[productId].image + '.jpg';
                    document.getElementById('imgSrcDlg').value = dict[productId].image;
                });
            }
        }

        document.getElementById('newProduct').addEventListener('click', function () {
            document.getElementById('newDlg').showModal();
        });
        document.getElementById('closeBtn').addEventListener('click', function () {
            document.getElementById('editDlg').close();
        });
        document.getElementById('closeBtnNewDlg').addEventListener('click', function () {
            document.getElementById('newDlg').close();
        });
    </script>
@endsection
