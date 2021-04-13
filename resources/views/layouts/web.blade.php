<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.header')

</head>

<body id="page-top" >

<div id="wrapper">

@include('includes.sidebar')

<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('includes.topbar')

            <div class="container-fluid">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                @yield('content')
            </div>

        </div>
        @include('includes.footer')
    </div>

</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



</body>

@include('includes.scripts')

@yield('additional-js')

</html>
