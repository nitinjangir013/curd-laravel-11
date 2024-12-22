<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products | Simple Laravel 11 CURD Web App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  </head>
  <body>
    @include('partials.header')

    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('products.create') }}" class="btn btn-dark btn-addmore">Add More</a>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
                <div class="col-md-10">
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            <div class="col-md-10">
                <div class="row py-2">
                    <div class="col-md-12 text-center">
                        <h3>Products</h3>
                    </div>
                    <div class="col-md-12 w-100 overflow-x-scroll">
                        <table class="table content-table">
                            <thead>
                                <tr>
                                    <td>S. No.</td>
                                    <td></td>
                                    <td>Name</td>
                                    <td>Sku</td>
                                    <td>Price</td>
                                    <td>Description</td>
                                    <td>Created at</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($products->isNotEmpty())
                                    @php $pCounter = 1; @endphp
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $pCounter++ }}</td>
                                            <td>
                                                @if ($product->image != "")
                                                    <img src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->name . ' Image'}}" class="rounded" width="50">
                                                @endif
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->sku }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M, Y') }}</td>
                                            <td>
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-edit">Edit</a>
                                                <a href="#" onclick="deleteProduct({{ $product->id }})" class="btn btn-danger">Delete</a>
                                                <form id="delete-product-form-{{ $product->id }}" action="{{ route('products.destory', $product->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js and jQuery (required for Bootstrap components like dropdowns and modals) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        function deleteProduct(id){
            if(confirm('Are you sure delete this product!')){
                document.getElementById('delete-product-form-'+id).submit();
            }
        }
    </script>
  </body>
</html>
