<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee</title>

    <!-- SWIPER -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- Font Awesome CDN Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS File Link  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>

<!-- HEADER -->
<div class="w3-right w3-hide-small">
    <a href="#about" class="w3-bar-item w3-button">About</a>
    <a href="#menu" class="w3-bar-item w3-button">Menu</a>
    <a href="cart" class="w3-bar-item w3-button">Cart</a>
    @if(Auth::check())
        <a href="" class="w3-bar-item w3-button">{{ Auth::user()->name }}</a>
        <a href="{{ route('logout') }}" class="w3-bar-item w3-button">Log Out</a>
    @else
        <a href="{{ route('login') }}" class="w3-bar-item w3-button">Log in</a>
        <a href="{{ route('register') }}" class="w3-bar-item w3-button">Register</a>
    @endif


</div>

<!-- HOME -->
<section class="home" id="home">
    <div class="row">
        <div class="content">
            <h3>fresh coffee in the morning</h3>
            <a href="#" class="btn">buy one now</a>
        </div>

        <div class="image">
            <img src="{{ asset('image/home-img-1.png') }}" class="main-home-image" alt="">
        </div>
    </div>

    <div class="image-slider">
        <img src="{{ asset('image/home-img-1.png') }}" alt="">
        <img src="{{ asset('image/home-img-2.png') }}" alt="">
        <img src="{{ asset('image/home-img-3.png') }}" alt="">
    </div>
</section>

<!-- ABOUT -->
<section class="about" id="about">
    <h1 class="heading">about us <span>why choose us</span></h1>

    <div class="row">
        <div class="image">
            <img src="{{ asset('image/about-img.png') }}" alt="">
        </div>

        <div class="content">
            <h3 class="title">what's make our coffee special!</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel rerum laboriosam reprehenderit ipsa id
                repellat odio illum, voluptas, necessitatibus assumenda adipisci. Hic, maiores iste? Excepturi illo
                dolore mollitia qui quia.</p>
            <a href="#" class="btn">read more</a>
            <div class="icons-container">
                <div class="icons">
                    <img src="{{ asset('image/about-icon-1.png') }}" alt="">
                    <h3>quality coffee</h3>
                </div>
                <div class="icons">
                    <img src="{{ asset('image/about-icon-2.png') }}" alt="">
                    <h3>our branches</h3>
                </div>
                <div class="icons">
                    <img src="{{ asset('image/about-icon-3.png') }}" alt="">
                    <h3>free delivery</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MENU -->
<section class="menu" id="menu">
    <h1 class="heading">our menu <span>popular menu</span></h1>
    @foreach($products as $product)

        <div class="container">
            <div class="col-md-3 ">
                <div class="card">
                    <div class="card-body">
                        <div class="col">
                            <div class="card" style="border: black">
                                <div class="card-body" style="border: #1a202c">
                                    <h5 class="card-title">{{$product->product_name}}</h5>
                                    <p class="card-text"><small class="text-body-secondary">{{$product->description}}</small></p>
                                    <p class="card-text"><small class="text-body-secondary">{{$product->price}}</small></p>

                                    <a href="#"
                                       data-url="{{route('addToCart',['id' => $product -> id])}}"
                                       class="btn btn-primary add_to_cart">
                                        Add to cart</a>                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach

</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    function addToCart(event){
        event.preventDefault()
        let urlCart = $(this).data('url');

        location.href = urlCart;

    }

    $(function (){
        $('.add_to_cart').on('click',addToCart);
    })
</script>
<!-- REVIEW -->
<section class="review" id="review">
    <h1 class="heading">reviews <span>what people says</span></h1>

    <div class="swiper review-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide box">
                <i class="fas fa-quote-left"></i>
                <i class="fas fa-quote-right"></i>
                <img src="{{ asset('image/pic-1.png') }}" alt="">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, earum quis dolorem quaerat tenetur
                    illum.</p>
                <h3>john deo</h3>
                <span>satisfied client</span>
            </div>

            <div class="swiper-slide box">
                <i class="fas fa-quote-left"></i>
                <i class="fas fa-quote-right"></i>
                <img src="image/pic-2.png" alt="">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum optio quasi ut, illo ipsam
                    assumenda.</p>
                <h3>john deo</h3>
                <span>satisfied client</span>
            </div>

            <div class="swiper-slide box">
                <i class="fas fa-quote-left"></i>
                <i class="fas fa-quote-right"></i>
                <img src="image/pic-3.png" alt="">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius asperiores aliquam hic quis!
                    Eligendi, aliquam.</p>
                <h3>john deo</h3>
                <span>satisfied client</span>
            </div>

            <div class="swiper-slide box">
                <i class="fas fa-quote-left"></i>
                <i class="fas fa-quote-right"></i>
                <img src="image/pic-4.png" alt="">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi modi perspiciatis distinctio
                    velit aliquid a.</p>
                <h3>john deo</h3>
                <span>satisfied client</span>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- BOOK -->
<section class="book" id="book">
    <h1 class="heading">booking <span>reserve a table</span></h1>

    <form action="">
        <input type="text" placeholder="Name" class="box">
        <input type="email" placeholder="Email" class="box">
        <input type="number" placeholder="Number" class="box">
        <textarea name="" placeholder="Message" class="box" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="send message" class="btn">
    </form>
</section>

<!-- FOOTER -->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>our branches</h3>
            <a href="#"><i class="fas fa-arrow-right"></i> india</a>
            <a href="#"><i class="fas fa-arrow-right"></i> USA</a>
            <a href="#"><i class="fas fa-arrow-right"></i> france</a>
            <a href="#"><i class="fas fa-arrow-right"></i> africa</a>
            <a href="#"><i class="fas fa-arrow-right"></i> japan</a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#home"><i class="fas fa-arrow-right"></i> home</a>
            <a href="#about"><i class="fas fa-arrow-right"></i> about</a>
            <a href="#menu"><i class="fas fa-arrow-right"></i> menu</a>
            <a href="#review"><i class="fas fa-arrow-right"></i> review</a>
            <a href="#book"><i class="fas fa-arrow-right"></i> book</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"><i class="fas fa-phone"></i> +123-456-7890</a>
            <a href="#"><i class="fas fa-phone"></i> +111-222-3333</a>
            <a href="#"><i class="fas fa-envelope"></i> coffee@gmail.com</a>
            <a href="#"><i class="fas fa-envelope"></i> Perú, Lima</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"><i class="fab fa-facebook-f"></i> facebook</a>
            <a href="#"><i class="fab fa-twitter"></i> twitter</a>
            <a href="#"><i class="fab fa-instagram"></i> instagram</a>
            <a href="#"><i class="fab fa-linkedin"></i> linkedin</a>
            <a href="#"><i class="fab fa-twitter"></i> twitter</a>
        </div>
    </div>

    <div class="credit">created by <span>Pham Thanh Long</span> </div>
</section>













<!-- SWIPER -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- Custom JS File Link  -->
<script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
