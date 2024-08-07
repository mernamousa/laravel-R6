@include('includes.head')
    
    <body>
        
{{-- @include('includes.preload') --}}

        <main>

@include('includes.navbar')

@yield('content')

@include('includes.footer') 
@yield('team')
@include('includes.footerjs') 