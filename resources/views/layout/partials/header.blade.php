<header>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="twoRows">
            <div class="container-fluid row">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/mainPage/Logo.png') }}" alt="Lezec.sk" width="200">
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="/products">Produkty</a>

                        </li>
                        <li class="nav-item">
                            <a href="/products">Zľavy</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="/shoppingCard">Košík 🛒</a>
                        </li>
                        <li class="nav-item login">
                            <a href="/login">Prihlásenie</a>
                        </li>
                    </ul>
                </div>
            </div>
            <form class="halfSearch">
                <input type="text" class="searchTerm" placeholder="Názov produktu">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
    </nav>
</header>
