
@extends('layouts.app')

@section('title', 'Edit Product | Product Manager')

@section('content')
    <div class="card form-card">
        <div class="form-heading">
            <h1>Edit Product</h1>
            <p class="subtitle">
                Update the details of {{ $product->name }}.
            </p>
        </div>

        <form
            action="{{ route('products.update', $product->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Product Name</label>
                <input
                    class="form-control"
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $product->name) }}"
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
                    required
                >{{ old('description', $product->description) }}</textarea>

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
                    step="0.01"
                    min="0"
                    value="{{ old('price', $product->price) }}"
                    required
                >

                @error('price')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Current Image</label>

                @if ($product->image)
                    <img
                        class="current-image"
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                    >
                @else
                    <p class="subtitle">No image uploaded yet.</p>
                @endif

                <label for="image">Upload a New Image</label>
                <input
                    class="form-control"
                    type="file"
                    id="image"
                    name="image"
                    accept="image/*"
                >

                <span class="help-text">
                    Optional. Leave empty to keep the current image.
                </span>

                @error('image')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <button class="button button-primary" type="submit">
                    Save Changes
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
