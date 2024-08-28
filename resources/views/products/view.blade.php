@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Show Products <span> | <a class="pl-4" href="{{ route('products.index') }}" style="color: inherit; text-decoration: none;">Products</a>
</span></div>


            <div class="card-body">
                <div class="d-flex justify-content-center  min-vh-100">
                    <div class="w-50">

                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="quantity">Quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label class="mb-3">Status</label>
                                <div class="d-flex">
                                    <div class="form-check me-3">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="status"
                                            id="active"
                                            value="1"
                                            {{ $product->status === 1 ? 'checked' : '' }} >
                                        <label class="form-check-label" for="active">
                                            Active
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="status"
                                            id="Inactive"
                                            value="0"
                                            {{ $product->status === 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="Inactive">
                                            In-Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
