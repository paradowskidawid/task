@extends('base')

<body>
<header>
    @include('nav')
</header>

<main>
    <div class="container mb-5">
        @yield('content')
    </div>
</main>

<footer>
</footer>
</body>
