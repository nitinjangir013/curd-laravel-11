<header class="bg-dark text-white py-2">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-md-4">
                <h4 class="h4">
                    <a href="{{ route('products.index') }}" class="text-white text-decoration-none">
                        <img src="{{ asset('images/logo-m.png') }}" alt="Logo" width="80" class="rounded">
                    </a>
                </h4>
            </div>
            <div class="col-md-8 text-md-end">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('products.index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About Us</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>