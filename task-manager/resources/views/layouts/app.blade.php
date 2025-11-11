<!Doctype html>
<html>
<head>
    <title>
        Laravel  Task List App
    </title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    {{--blade-formatter-disable --}}

<style type="text/tailwindcss">

    .btn{
       @apply  rounded-md px-2  py-1 text-center font-medium text-slate-700 shadow-md ring-1 ring-slate-700/10 hover:bg-slate-100
    }
    .link{
        @apply font-medium text-gray-700 underline decoration-pink-500
    }
</style>


    {{--blade-formatter-disable --}}
    @yield('styles')
</head>

<body class="container mx-auto mt-10  mb-10 max-w-lg ">
<h1 class="text-2xl mb-4 font-bold">
@yield('title')
</h1>

<div>

    @if(session() ->has('success'))
     <div>
         {{session('success')}}
     </div>

    @endif
    @yield('content')
</div>
</body>
</html>
