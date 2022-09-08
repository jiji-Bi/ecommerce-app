@section('sidebar')
    <nav class="navbar navbar-light navbar-vertical navbar-vibrant navbar-expand-lg">
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
                <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                    <li class="nav-item"><a class="nav-link" href="/admin/dashboard">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span data-feather="cast"></span>
                                </span>
                                <span class="nav-link-text">Dashbboard</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator" href="#e-commerce2" role="button" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="e-commerce2">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon d-flex flex-center"><span
                                        class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span
                                        data-feather="shopping-cart"></span></span><span class="nav-link-text">
                                    Produits</span>
                            </div>
                        </a>
                        <ul class="nav collapse parent show" id="e-commerce2">
                            <li class="nav-item"><a class="nav-link" href="/admin/produit" data-bs-toggle=""
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Ajouter produit
                                        </span>
                                    </div>
                                </a></li>
                            <li class="nav-item"><a class="nav-link active" href="/admin/produits" data-bs-toggle=""
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Lister
                                            produits</span>
                                    </div>
                                </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator" href="#e-commerce" role="button" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="e-commerce">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon d-flex flex-center"><span
                                        class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span
                                        data-feather="shopping-cart"></span></span><span class="nav-link-text">
                                    Catégories</span>
                            </div>
                        </a>
                        <ul class="nav collapse parent show" id="e-commerce">
                            <li class="nav-item"><a class="nav-link" href="/admin/categories" data-bs-toggle=""
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Ajouter
                                            catégorie</span>
                                    </div>
                                </a></li>
                            <li class="nav-item"><a class="nav-link active" href="/admin/categories" data-bs-toggle=""
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Liste des
                                            catégories</span>
                                    </div>
                                </a></li>
                        </ul>
                    </li>
            </div>
            <div class="navbar-vertical-footer"><a class="btn btn-link border-0 fw-semi-bold d-flex ps-0"
                    href="#!"><span class="navbar-vertical-footer-icon"
                        data-feather="log-out"></span><span>Settings</span></a>
            </div>
    </nav>
@endsection
