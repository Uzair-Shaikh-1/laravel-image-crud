
@extends('layouts.app')

@section('title', 'All Products | Product Manager')

@section('content')
    <div class="page-heading">
        <div>
            <h1>All Products</h1>
            <p class="subtitle">
                Manage your products in one place.
                {{ $products->count() }} product(s) found.
            </p>
        </div>

        <a
            href="{{ route('products.create') }}"
            class="button button-primary"
        >
            + Create Product
        </a>
    </div>

    @if ($products->isNotEmpty())
        <div class="product-grid">
            @foreach ($products as $product)
                <article class="card product-card">
                    @if ($product->image)
                        <img
                            class="product-image"
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            loading="lazy"
                        >
                    @else
                        <div class="image-placeholder">
                            No Image Available
                        </div>
                    @endif

                    <div class="product-content">
                        <h2 class="product-name">
                            {{ $product->name }}
                        </h2>

                        <p class="product-price">
                            {{ number_format((float) $product->price, 2) }}
                        </p>

                        <p class="product-description">
                            {{ $product->description }}
                        </p>

                        <div class="product-actions">
                            <a
                                href="{{ route('products.edit', $product->id) }}"
                                class="button button-secondary"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('products.destroy', $product->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this product?');"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="button button-danger"
                                >
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="card empty-state">
            <h2>No products yet</h2>
            <p>
                Your product collection is empty. Create your first product
                to get started.
            </p>

            <a
                href="{{ route('products.create') }}"
                class="button button-primary"
            >
                Create Your First Product
            </a>
        </div>
    @endif
@endsection
