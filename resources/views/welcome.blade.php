<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gibson | Luxury Experience</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
        * { box-sizing: border-box; font-family: 'Inter', sans-serif; scroll-behavior: smooth; }
        body { background-color: #ffffff; color: #1a1a1a; overflow-x: hidden; }
        .top-bar { background: #1a1a1a; color: #ffffff; letter-spacing: 2px; font-weight: 300; text-transform: uppercase; font-size: 0.7rem; }
        .navbar { background-color: rgba(255, 255, 255, 0.9) !important; border-bottom: 1px solid #f0f0f0; backdrop-filter: blur(15px); position: sticky; top: 0; z-index: 1020; }
        .nav-link { font-weight: 400; color: #1a1a1a !important; transition: 0.3s; letter-spacing: 1px; font-size: 0.85rem; }
        .hero-wrapper { position: relative; height: 100vh; background-image: url("{{ asset('img/hero2.JPG') }}"); background-size: cover; background-position: center; overflow: hidden; }
        .hero-overlay { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(0,0,0,0.1) 0%, rgba(255,255,255,1) 98%); z-index: 1; }
        .hero-text-block { position: absolute; top: 35%; left: 10%; z-index: 2; max-width: 700px; color: #000; }
        .hero-text-block h1 { font-weight: 700; text-transform: uppercase; letter-spacing: -2px; font-size: 5rem; line-height: 0.85; }
        .product-card { transition: transform 0.5s cubic-bezier(0.165, 0.84, 0.44, 1), opacity 0.3s ease; overflow: hidden; }
        .product-card img { transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1); transform-origin: center center; }
        .product-card:hover img { transform: scale(1.15); }
        .highlight-card { position: relative; height: 600px; border-radius: 0; overflow: hidden; }
        .highlight-card img { height: 110%; object-fit: cover; width: 100%; }
        .highlight-card-content { position: absolute; bottom: 50px; left: 50px; z-index: 2; color: #fff; }
        .performance-container { background: #fff; padding: 120px 0; }
        .growth-table-container { background: #fff; border: 1px solid #eee; padding: 30px; }
        .movie-section { position: relative; height: 80vh; background-image: url("{{ asset('img/bawah.jpeg') }}"); background-attachment: fixed; background-position: center; background-size: cover; display: flex; align-items: center; color: #fff; }
        .movie-overlay { position: absolute; inset: 0; background: rgba(0,0,0,0.3); }
        .btn-premium { border-radius: 0; text-transform: uppercase; letter-spacing: 2px; font-size: 0.75rem; padding: 15px 35px; transition: 0.4s; }
        .footer { background: #000; padding: 100px 0; color: #fff; }
    </style>
</head>
<body>

@if(session('success'))
    <script>alert("{{ session('success') }}");</script>
@endif

<div class="top-bar text-center py-2">
    <small>Excellence in Craftsmanship since 1894 • Global Boutique Shipping</small>
</div>

<nav class="navbar navbar-expand-lg py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3 letter-spacing-2" href="{{ route('home') }}">GIBSON</a>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link px-3" href="#home">COLLECTIONS</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="#highlights">STORY</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="#featured">SHOP</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="#about">INSIGHTS</a></li>
            </ul>
        </div>
    </div>
</nav>

@if(!$buy_item)
    <section class="hero-wrapper" id="home">
        <div class="hero-overlay"></div>
        <div class="container hero-text-block rellax" data-rellax-speed="-3">
            <h1 class="mb-3">Master<br>The Sound</h1>
            <p class="lead mb-5 fw-light">Experience the pinnacle of guitar engineering.</p>
            <a class="btn btn-dark btn-premium" href="#featured">View Catalog</a>
        </div>
    </section>

    <section class="py-5" id="highlights">
        <div class="container-fluid px-2">
            <div class="row g-2">
                <div class="col-md-4">
                    <div class="highlight-card">
                        <img src="{{ asset('img/1.jpg') }}" alt="1">
                        <div class="highlight-card-content"><h4>The Epiphone Movie Devil Collection</h4></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="highlight-card">
                        <img src="{{ asset('img/holiday.webp') }}" alt="2">
                        <div class="highlight-card-content"><h4>Artist Series Holiday Selection</h4></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="highlight-card">
                        <img src="{{ asset('img/green.jpeg') }}" alt="3">
                        <div class="highlight-card-content"><h4>British Racing Green Limited</h4></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-products container py-5" id="featured">
        <div class="text-center mb-5 py-5">
            <h2 class="fw-bold text-uppercase" style="letter-spacing: 5px; font-size: 1rem; color: #888;">The Vault</h2>
            <hr style="width: 50px; margin: 20px auto; border-top: 2px solid #000;">
        </div>
        <div class="row g-5">
            @foreach($products as $key => $item)
            <div class="col-md-3">
                <a href="?buy={{ $key }}" class="product-card p-3 text-center d-block text-decoration-none text-dark">
                    <img src="{{ asset('img/'.$item['img']) }}" class="img-fluid mb-4" alt="Product">
                    <p class="text-muted small mb-1">{{ $item['color'] }}</p>
                    <h6 class="fw-bold mb-2">{{ $item['desc'] }}</h6>
                    <p class="mb-3 fw-light">IDR {{ number_format($item['price']) }}</p>
                    <span class="btn btn-outline-dark btn-premium py-2 px-4" style="font-size: 0.6rem;">Explore Piece</span>
                </a>
            </div>
            @endforeach
        </div>
    </section>
@else
    <section class="container py-5 mt-5">
        <div class="row align-items-center">
            <div class="col-md-6 mb-5 text-center">
                <img src="{{ asset('img/'.$buy_item['img']) }}" class="img-fluid" style="max-height: 600px;">
            </div>
            <div class="col-md-5 offset-md-1">
                <h2 class="display-6 fw-bold mb-3">{{ $buy_item['desc'] }}</h2>
                <h3 class="mb-4 fw-light">IDR {{ number_format($buy_item['price']) }}</h3>
                <form action="{{ route('buy.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_name" value="{{ $buy_item['key'] }}">
                    <input type="hidden" name="price" value="{{ $buy_item['price'] }}">
                    <div class="mb-4"><input type="text" name="buyer_name" class="form-control border-0 border-bottom rounded-0 px-0" placeholder="FULL NAME" required></div>
                    <div class="mb-4"><input type="email" name="buyer_email" class="form-control border-0 border-bottom rounded-0 px-0" placeholder="EMAIL ADDRESS" required></div>
                    <div class="mb-5"><input type="number" name="quantity" class="form-control border-0 border-bottom rounded-0 px-0" value="1" min="1" required></div>
                    <button type="submit" class="btn btn-dark btn-premium w-100">Confirm Order</button>
                    <div class="text-center mt-3"><a href="{{ route('home') }}" class="text-dark small text-uppercase">Back</a></div>
                </form>
            </div>
        </div>
    </section>
@endif

<section class="performance-container" id="about">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <h2 class="fw-bold mb-4">Market Insight</h2>
                <div class="growth-table-container">
                    <table class="table">
                        <thead><tr><th>Series</th><th class="text-end">Distribution</th></tr></thead>
                        <tbody>
                            @foreach($table_data as $data)
                            <tr><td class="fw-semibold">{{ $data->model_name }}</td><td class="text-end">{{ number_format($data->units_sold) }}</td></tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1"><canvas id="myChart"></canvas></div>
        </div>
    </div>
</section>

<footer class="footer" id="contact">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-4 mb-5">
                <h5 class="mb-4">Inquiries</h5>
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <input type="email" name="email_user" class="form-control mb-3 p-3" placeholder="EMAIL" required>
                    <textarea name="saran_teks" class="form-control mb-4 p-3" rows="3" placeholder="MESSAGE" required></textarea>
                    <button class="btn btn-light btn-premium w-100" type="submit">Send</button>
                </form>
            </div>
            <div class="col-md-3 text-md-end"><p class="small text-muted">&copy; 2026 Gibson • Established 1894</p></div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/gh/dixonandmoe/rellax@master/rellax.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Rellax('.rellax', { center: true });
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! $labels_db->toJson() !!},
                datasets: [{
                    label: 'Trend',
                    data: {!! $values_db->toJson() !!},
                    borderColor: '#1a1a1a',
                    borderWidth: 1.5,
                    pointRadius: 2,
                    tension: 0.4
                }]
            },
            options: { 
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { display: false }, x: { grid: { display: false } } }
            }
        });
    });
</script>
</body>
</html>