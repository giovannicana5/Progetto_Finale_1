<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('homepage')}}">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('homepage')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('article.index')}}">Tutti gli articoli</a>
                </li>
                @auth
                    @if(Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-success btn-sm position-relative w-sm-25" href="{{route('revisor.index')}}">Zona revisore <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{App\Models\Article::toBeRevisedCount()}}</span></a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ciao, {{Auth::user()->name}}</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{route('create.article')}}">Crea</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                            </li>
                            <form action="{{route('logout')}}" method="POST" class="d-none" id="form-logout">@csrf</form>
                            {{-- <li>
                                <a class="dropdown-item" href="#">Action</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another action</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li> --}}
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                                <li>
                                    <a class="dropdown-item text-capitalize" href="{{route('byCategory', ['category' => $category])}}">{{$category->name}}</a>
                                </li>
                                @if(!$loop->last)
                                    <hr class="dropdown-divider">
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ciao utente!</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{route('login')}}">Accedi</a>
                            </li>
                            <hr class="dropdown-divider">
                            <li>
                                <a class="dropdown-item" href="{{route('register')}}">Registrati</a>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
            {{-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
        </div>
    </div>
</nav>