@extends('layout')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
            background-color: #f8f9fa;
        }

        html, body {
            max-width: 100%;
            overflow-x: hidden;
        }

        .product-card {
            border: 1px solid #ddd; /* Add border for boxed shape */
            border-radius: 8px; /* Rounded corners */
            padding: 20px; /* Add padding inside the box */
            margin-bottom: 20px; /* Add margin for separation */
            /*background-color: #fff; !* White background for the box *!*/
        }

        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .product-price {
            font-size: 1.5rem;
            color: #333;
        }

        .product-old-price {
            text-decoration: line-through;
            color: #999;
        }

        .product-shipping {
            color: #28a745;
        }

        .product-details {
            margin-top: 10px;
        }

        .product-description {
            color: #666;
        }
    </style>
</head>
<body>
@section('section')
    <section style="background-color: #eee;">
        <div class="container ">
            <div class="row">
                <div class="col-md-10 col-xl-10">
                    <div class="card shadow-0 border rounded-3 p-3" style="background-color: transparent">
                        <div class="card-body ml-5" >
                            @foreach($products as $product)
                                <div class="row product-card" style="background-color: white;">
                                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                        <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                 alt="{{ $product->name }}" class="product-image w-100 mb-5">
                                            <div class="hover-overlay">
                                                <div class="mask"
                                                     style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <h5>{{ $product->name }}</h5>
                                        <div class="mt-1 mb-0 text-muted small">
                                            <span>100% cotton</span>
                                            <span class="text-primary"> • </span>
                                            <span>Light weight</span>
                                            <span class="text-primary"> • </span>
                                            <span>Best finish</span>
                                        </div>
                                        <div class="mb-2 text-muted small">
                                            <span>Unique design</span>
                                            <span class="text-primary"> • </span>
                                            <span>For {{ $product->category }}</span>
                                            <span class="text-primary"> • </span>
                                            <span>Casual</span>
                                        </div>
                                        <p class="text-truncate mb-4 mb-md-0">
                                            There are many variations of passages of Lorem Ipsum available, but the
                                            majority have suffered alteration in some form, by injected humour, or
                                            randomised words which don't look even slightly believable.
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h4 class="mb-1 me-1">${{ $product->price }}</h4>
                                            {{-- <span class="text-danger"><s>${{ $product->old_price }}</s></span>--}}
                                        </div>
                                        <h6 class="text-success">Free shipping</h6>
                                        <div class="d-flex flex-column mt-4">
                                            <button class="btn btn-primary btn-sm" type="button">Details</button>
                                            <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                                Add to wishlist
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
