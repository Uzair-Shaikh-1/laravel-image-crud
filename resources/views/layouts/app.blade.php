
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Product Manager')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <header class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="{{ route('products.index') }}">
                Product<span>Manager</span>
            </a>

            <a class="nav-link" href="{{ route('products.index') }}">
                All Products
            </a>
        </div>
    </header>

    <main class="container">
        @if (session('success'))
            <div class="alert alert-success" role="status">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error" role="alert">
                <strong>Please correct the following errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
