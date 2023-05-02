<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index-2.html">JobHunt</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index-2.html" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                {{-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> --}}
                {{-- <li class="nav-item cta mr-md-2"><a href="new-post.html" class="nav-link">Post a Job</a></li> --}}
                {{-- <li class="nav-item cta cta-colored mr-md-2"><a href="job-post.html" class="nav-link">Want a Job</a></li> --}}
            @if (Route::has('login'))
                @auth
                <li class="nav-item cta mr-md-2"><a href="{{ url('/home') }}" class="nav-link">Home</a></li>
                @else
                <li class="nav-item cta mr-md-2"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item cta cta-colored"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                    @endif
            @endif
                </div>
            @endif
            </ul>
        </div>
    </div>
</nav>