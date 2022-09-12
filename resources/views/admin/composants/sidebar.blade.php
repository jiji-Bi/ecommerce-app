@section('sidebar')
    <nav class="navbar navbar-light navbar-vertical navbar-vibrant navbar-expand-lg">
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
                <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                    <li class="nav-item"><a class="nav-link" href="/admin/dashboard">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span data-feather="pie-chart"></span>
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
                        <a class="nav-link dropdown-indicator" href="#e-commerce3" role="button" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="e-commerce3">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon d-flex flex-center"><span
                                        class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span
                                        data-feather="align-justify"></span></span><span class="nav-link-text">
                                    Catégories</span>
                            </div>
                        </a>
                        <ul class="nav collapse parent show" id="e-commerce3">

                            <li class="nav-item"><a class="nav-link active" href="/admin/categories" data-bs-toggle=""
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Liste des
                                            catégories</span>
                                    </div>
                                </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator" href="#e-commerce4" role="button" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="e-commerce4">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon d-flex flex-center"><span
                                        class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span
                                        data-feather="circle"></span></span><span class="nav-link-text">
                                    Couleurs</span>
                            </div>
                        </a>
                        <ul class="nav collapse parent show" id="e-commerce4">
                            <li class="nav-item"><a class="nav-link" href="/admin/couleur" data-bs-toggle=""
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Ajouter
                                            couleur</span>
                                    </div>
                                </a></li>
                            <li class="nav-item"><a class="nav-link active" href="/admin/couleurs" data-bs-toggle=""
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Liste des
                                            couleurs</span>
                                    </div>
                                </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator" href="#e-commerce5" role="button" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="e-commerce5">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon d-flex flex-center"><span
                                        class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span
                                        data-feather="tag"></span></span><span class="nav-link-text">
                                    Tailles</span>
                            </div>
                        </a>
                        <ul class="nav collapse parent show" id="e-commerce5">
                            <li class="nav-item"><a class="nav-link" href="/admin/categories" data-bs-toggle=""
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Ajouter
                                            taille</span>
                                    </div>
                                </a></li>
                            <li class="nav-item"><a class="nav-link active" href="/admin/categories" data-bs-toggle=""
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Liste des
                                            tailles</span>
                                    </div>
                                </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator" href="#e-commerce6" role="button"
                            data-bs-toggle="collapse" aria-expanded="true" aria-controls="e-commerce6">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon d-flex flex-center"><span
                                        class="fas fa-caret-right fs-0"></span></div><span class="nav-link-icon"><span
                                        data-feather="users"></span></span><span class="nav-link-text">
                                    Utilisateurs</span>
                            </div>
                        </a>
                        <ul class="nav collapse parent show" id="e-commerce6">

                            <li class="nav-item"><a class="nav-link active" href="/admin/categories" data-bs-toggle=""
                                    aria-expanded="false">
                                    <div class="d-flex align-items-center"><span class="nav-link-text">Liste des
                                            utilisateurs</span>
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
