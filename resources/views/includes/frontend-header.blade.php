<body>
<header class="frontend">
    <div class="container">
        <nav class="navbar navbar-expand-md fixed-top ">
            <a class="navbar-brand" href="/">Laratasks</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('dashboard') }}">about</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('dashboard') }}">contact me</a>
                    </li>
                </ul>


                @if (Auth::check()) {
                <a href="{{route('login')}}" id="logout">Log In</a>
                @endif
            </div>
        </nav>
    </div>
</header>