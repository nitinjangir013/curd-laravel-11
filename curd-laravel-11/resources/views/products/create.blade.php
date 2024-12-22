<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Product | Simple Laravel 11 CRUD Web App</title>
    <!-- Include Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  </head>
  <body>
    @include('partials.header')
    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('products.index') }}" class="btn btn-dark btn-addmore">Back</a>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header text-center main-heading">
                        <h3>Create Product</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <!-- Product Name -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="Enter product name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- SKU -->
                                <div class="col-md-6 mb-3">
                                    <label for="sku" class="form-label">SKU</label>
                                    <input type="text" id="sku" class="form-control form-control-lg @error('sku') is-invalid @enderror" placeholder="Enter SKU" name="sku" value="{{ old('sku') }}">
                                    @error('sku')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <!-- Price -->
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" id="price" class="form-control form-control-lg @error('price') is-invalid @enderror" placeholder="Enter price" name="price" value="{{ old('price') }}">
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Product Image -->
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Product Image</label>
                                    <input type="file" id="image" class="form-control form-control-lg" name="image">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control form-control-lg" rows="5" placeholder="Write product description">{{ old('description') }}</textarea>
                            </div>

                            <div class="d-grid mt-4">
                                <button class="btn btn-lg btn-primary btn-addmore">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
