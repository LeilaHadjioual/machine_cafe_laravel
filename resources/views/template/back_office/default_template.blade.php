<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('template.head_fragment')
</head>
<body>

@include('template.back_office.navbar')

<header>
    <div class="content">
        <div class="title m-b-md">
            @yield('titre')
        </div>
    </div>
</header>

<section class="content container">
    @yield('content')
</section>

</body>
</html>