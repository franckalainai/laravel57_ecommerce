<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @foreach($categories as $key => $c)
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{$c->category_name}}<span class="caret"></span>
                    </a>
                        @if($c->products->count()!=0)
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($c->products as $key => $p)
                                <a class="dropdown-item" href="">
                                    {{$p->product_name}}
                                </a>
                            @endforeach
                            </div>
                        @endif
                    </li>
                @endforeach

                <li class="nav-item">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fa fa-shopping-cart"> Shopping cart</i>
                        <span class="badge badge-danger">100</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
