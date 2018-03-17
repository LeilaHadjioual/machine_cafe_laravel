<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('template.head_fragment')
</head>
<body>

<div class="flex-center position-ref full-height">
    <div class="top-right links">
       <a href="/back_office" class="list-group-item"><i class="fa fa-home fa-fw"></i> Home</a>
    </div>


    <div class="content">
        <div class="title m-b-md">
            @yield('titre')
        </div>
        <section class="content container">
            @yield('content')
        </section>
        @include('template.front_office.liens_fragment')
    </div>
</div>
</body>
</html>