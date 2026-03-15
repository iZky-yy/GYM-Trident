<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymTrident</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav>
        <div class="container nav-wrapper">
            <div class="logo">GymTrident</div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#programs">Programs</a></li>
                <li><a href="#trainers">Trainers</a></li>
                <li><a href="#pricing">Pricing</a></li>
            </ul>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
</nav>

    <section id="home" class="hero">
        <div class="container hero-content">
            <h1>TRANSFORM YOUR BODY</h1>
            <p>Train Hard. Stay Strong. Be Unstoppable.</p>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
</section>

    <section class="stats">
        <div class="container stats-grid">
            <div>
                <h3>2500+</h3>
                <p>Members</p>
            </div>
            <div>
                <h3>15</h3>
                <p>Professional Trainers</p>
            </div>
            <div>
                <h3>8</h3>
                <p>Years Experience</p>
            </div>
        </div>
    </section>

    <section id="programs">
        <div class="container">
            <h2>OUR PROGRAMS</h2>
            <div class="program-grid">
                <div class="card">
                    <h3>Strength Training</h3>
                    <p>Build muscle and increase power.</p>
                </div>
                <div class="card">
                    <h3>Fat Loss Program</h3>
                    <p>Burn fat effectively with expert guidance.</p>
                </div>
                <div class="card">
                    <h3>Nutrition Coaching</h3>
                    <p>Personalized meal plans for best results.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="trainers" class="trainers">
        <div class="container">
            <h2>PERSONAL TRAINERS</h2>
            <div class="trainer-grid">
                <div class="trainer-card">
                    <div class="trainer-placeholder">
                        <img src="{{asset('images/aderai.png')}}" alt="">
                    </div>
                    <h3>Ade Rai</h3>
                    <p>Body Workout Specialist</p>
                    <div class="rating">★★★★★</div>
                    <a href="#" class="btn btn-primary">Book Session</a>
                </div>

                <div class="trainer-card">
                    <div class="trainer-placeholder">
                        <img src="{{asset('images/chrisputra.png')}}" alt="">
                    </div>
                    <h3>Chris Putra</h3>
                    <p>Body Workout Specialist</p>
                    <div class="rating">★★★★★</div>
                    <a href="#" class="btn btn-primary">Book Session</a>
                </div>

                <div class="trainer-card">
                    <div class="trainer-placeholder">
                        <img src="{{asset('images/bobbyida.png')}}" alt="">
                    </div>
                    <h3>Bobby Ida</h3>
                    <p>Body Workout Specialist</p>
                    <div class="rating">★★★★★</div>
                    <a href="#" class="btn btn-primary">Book Session</a>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="pricing">
        <div class="container">
            <h2>HARGA PAKET</h2>
            <div class="price-grid">
                <div class="price-card">
                    <h3>Trident GYM</h3>
                    <h1>Rp300.000</h1>
                    <p>Gym Access</p>
                    <p>1 BULAN</p>
                </div>

                <div class="price-card highlight">
                    <h3>Trident Maxxing</h3>
                    <h1>Rp1.300.000</h1>
                    <p>Full Class Access</p>
                    <p>3 Bulan</p>
                </div>

                <div class="price-card">
                    <h3>Trident Zumba</h3>
                    <h1>Rp350.000</h1>
                    <p>Zumba Access</p>
                    <p>1 Bulan</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container footer-flex">
            <div class="footer-left">
                <h3 class="footer-logo">GymTrident</h3>
                <p>Transform your body and build strength with professional trainers and modern equipment.</p>
            </div>
            <div class="footer-right">
                <div>
                    <h4>Contact</h4>
                    <p>Email: GymTrident@email.com</p>
                    <p>Instagram: @GymTrident.id</p>
                    <p>WhatsApp: +62 812 3456 7890</p>
                </div>
                <div>
                    <h4>Opening Hours</h4>
                    <p>Mon - Fri: 06.00 - 22.00</p>
                    <p>Sat - Sun: 08.00 - 20.00</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            © 2026 GymTrident. All Rights Reserved.
        </div>
    </footer>

</body>

</html>
