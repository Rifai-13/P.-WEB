<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="css/style.css?v=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Just+Another+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <nav class="navbar">
        <div class="brand">StyleSport</div>
        <ul class="nav-list">
            <li><a href="/">Home</a></li>
            <li><a href="/products">Products</a></li>
            <li><a href="/categori">Categori</a></li>
            <li><a href="/about">About</a></li>
        </ul>
        <div class="icons">
            <a href="#"><i class="fa fa-heart"></i></a>
            <a href="#"><i class="fa fa-shopping-cart"></i></a>
            <a href="#"><i class="fa fa-user"></i></a>
        </div>
    </nav>

    <main>
        <div class="container1">
            <div class="content">
                <div class="content1">
                    <img src="image/poster1.jpg" alt="Poster 1">
                    <div class="text">
                        <h1>Famous Muiches</h1>
                        <button>Shop Now</button>
                    </div>
                </div>
                <div class="content2">
                    <img src="image/poster2.jpg" alt="Poster 2">
                    <div class="text">
                        <h1>Special Muiches</h1>
                        <button>Shop Now</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="bar-pro">
            <h2>Product</h2>
            <h2>Filter <i class="mage--filter"></i></h2>
        </div>

        <div class="cards">
            @foreach ($products as $product)
                <div class="card">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    <p>{{ $product->name }}</p>
                    <p id="jenis">{{ $product->categori->jenis }}</p>
                    <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                </div>
            @endforeach




            {{-- <div class="card">
                <img src="image/nikejam.png" alt="nikeJam">
                <p>Nike Jam</p><br>
                <p id="jenis">Women's Shoes</p><br>
                <p id="price">Rp 1,909,000</p>
            </div>
            <div class="card">
                <img src="image/airjordan.png" alt="nikeJam">
                <p>Air Jordan 1</p><br>
                <p id="jenis">Men's Shoes</p><br>
                <p id="price">Rp 1,939,000</p>
            </div>
            <div class="card">
                <img src="image/nikecortez.png" alt="nikeJam">
                <p>Cortez</p><br>
                <p id="jenis">Men's Shoes</p><br>
                <p id="price">Rp 1,299,000</p>
            </div>
            <div class="card">
                <img src="image/airforce.png" alt="nikeJam">
                <p>Nike Air Force</p><br>
                <p id="jenis">Women's Shoes</p><br>
                <p id="price">Rp 1,909,000</p>
            </div>
            <div class="card">
                <img src="image/killshot.png" alt="nikeJam">
                <p>Nike Killshot 2</p><br>
                <p id="jenis">Men's Shoes</p><br>
                <p id="price">Rp 1,499,000</p>
            </div>
            <div class="card">
                <img src="image/pegasus41.png" alt="nikeJam">
                <p>Nike Pegasus 41</p><br>
                <p id="jenis">Men's Road Runnig Shoes</p><br>
                <p id="price">Rp 2,199,000</p>
            </div>
            <div class="card">
                <img src="image/dunk.png" alt="nikeJam">
                <p>Nike Dunk Low Retro</p><br>
                <p id="jenis">Men's Shoes</p><br>
                <p id="price">Rp 1,909,000</p>
            </div>
            <div class="card">
                <img src="image/v2krun.png" alt="nikeJam">
                <p>Nike V2K Run</p><br>
                <p id="jenis">Women's Shoes</p><br>
                <p id="price">Rp 1,909,00</p>
            </div> --}}
        </div>
    </main>

    <footer class="footer"">
        <p>&copy; 2024 StyleSport</p>
        <div class="footer-links">
            <div class="row">
                <div class="footer-col">
                    <h3 id="title">Resources</h3>
                    <ul>
                        <li><a href="">Find A Store</a></li>
                        <li><a href="">Become A Member</a></li>
                        <li><a href="">Education Discounts</a></li>
                        <li><a href="">Send Us Feedback</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3 id="title">Help</h3>
                    <ul>
                        <li><a href="">Get Help</a></li>
                        <li><a href="">Order Status</a></li>
                        <li><a href="">Payment Options</a></li>
                        <li><a href="">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3 id="title">Company</h3>
                    <ul>
                        <li><a href="">About Us</a></li>
                        <li><a href="">News</a></li>
                        <li><a href="">Investors</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3 id="title">Follow Us</h3>
                    <ul>
                        <li><a href="https://web.whatsapp.com/">WhatsApp</a></li>
                        <li><a href="https://www.instagram.com/muh_rifai13/">Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>

</body>

</html>
