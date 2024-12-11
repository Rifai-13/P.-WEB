<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categori</title>
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

        <div class="carousel-container">

            <div class="carousel">
                <img src="image/post1.jpg" alt="">
                <img src="image/post2.jpg" alt="">
                <img src="image/post3.jpg" alt="">
                <img src="image/post4.jpg" alt="">
                <img src="image/post5.jpg" alt="">
                <img src="image/post6.jpg" alt="">
            </div>
        </div>

        <main>
            <!-- Menampilkan kategori dan produk -->
            @foreach ($categori as $category)
                <!-- Gunakan $categori yang sama dengan controller -->
                <h2>{{ $category->jenis }}</h2> <!-- Menampilkan jenis kategori -->
                <div class="cards">
                    @foreach ($category->Products as $product)
                        <!-- Mengakses produk dari relasi -->
                        <div class="card">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            <p>{{ $product->name }}</p>
                            <div id="jenis">{{ $category->jenis }}</div> <!-- Mengakses kategori produk -->
                            <div id="price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            {{-- <h2>Women's Shoes</h2>
            <div class="cards">
                <div class="card">
                    <img src="image/nikejam.png" alt="nikeJam">
                    <p>Nike Jam</p><br>
                    <p id="jenis">Women's Shoes</p><br>
                    <p id="price">Rp 1,909,000</p>
                </div>
                <div class="card">
                    <img src="image/nikecortez.png" alt="nikeCortez">
                    <p>Cortez</p><br>
                    <p id="jenis">Women's Shoes</p><br>
                    <p id="price">Rp 1,299,000</p>
                </div>
                <div class="card">
                    <img src="image/airforce.png" alt="nikeAirForce">
                    <p>Nike Air Force</p><br>
                    <p id="jenis">Women's Shoes</p><br>
                    <p id="price">Rp 1,909,000</p>
                </div>
                <div class="card">
                    <img src="image/v2krun.png" alt="nikeV2KRun">
                    <p>Nike V2K Run</p><br>
                    <p id="jenis">Women's Shoes</p><br>
                    <p id="price">Rp 1,909,000</p>
                </div>
            </div> --}}

            <!-- Kategori Men's Shoes -->
            {{-- <h2>Men's Shoes</h2>
            <div class="cards">
                <div class="card">
                    <img src="image/airjordan.png" alt="airJordan">
                    <p>Air Jordan 1</p><br>
                    <p id="jenis">Men's Shoes</p><br>
                    <p id="price">Rp 1,939,000</p>
                </div>
                <div class="card">
                    <img src="image/killshot.png" alt="nikeKillshot">
                    <p>Nike Killshot 2</p><br>
                    <p id="jenis">Men's Shoes</p><br>
                    <p id="price">Rp 1,499,000</p>
                </div>
                <div class="card">
                    <img src="image/pegasus41.png" alt="nikePegasus41">
                    <p>Nike Pegasus 41</p><br>
                    <p id="jenis">Men's Road Running Shoes</p><br>
                    <p id="price">Rp 2,199,000</p>
                </div>
                <div class="card">
                    <img src="image/dunk.png" alt="nikeDunk">
                    <p>Nike Dunk Low Retro</p><br>
                    <p id="jenis">Men's Shoes</p><br>
                    <p id="price">Rp 1,909,000</p>
                </div>

            </div> --}}
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
