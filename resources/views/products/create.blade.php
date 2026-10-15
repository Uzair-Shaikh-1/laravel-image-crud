
@extends('layouts.app')

@section('title', 'Create Product | Product Manager')

@section('content')
    <div class="card form-card">
        <div class="form-heading">
            <h1>Create a Product</h1>
            <p class="subtitle">
                Add a new product to your collection.
            </p>
        </div>

        <form
            action="{{ route('products.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="form-group">
                <label for="name">Product Name</label>
                <input
                    class="form-control"
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="e.g. Wireless Headphones"
                    maxlength="255"
                    required
                >

                @error('name')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea
                    class="form-control"
                    id="description"
                    name="description"
                    placeholder="Describe your product..."
                    required
                >{{ old('description') }}</textarea>

                @error('description')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input
                    class="form-control"
                    type="number"
                    id="price"
                    name="price"
                    value="{{ old('price') }}"
                    placeholder="0.00"
                    step="0.01"
                    min="0"
                    required
                >

                @error('price')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Product Image</label>
                <input
                    class="form-control"
                    type="file"
                    id="image"
                    name="image"
                    accept="image/*"
                >
                <span class="help-text">
                    Optional. Choose an image from your device.
                </span>

                @error('image')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <button class="button button-primary" type="submit">
                    Create Product
                </button>

                <a
                    class="button button-secondary"
                    href="{{ route('products.index') }}"
                >
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
