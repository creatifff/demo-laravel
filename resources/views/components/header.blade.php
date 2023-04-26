<header>
    <div class="container">
        <nav>
            <a href="{{ route('page.home') }}">Home</a>
            <a href="{{ route('page.allProducts') }}">Products</a>
            <a href="{{ route('cart.index') }}">Cart</a>
            @guest
                <a href="{{ route('page.login') }}">Sign In</a>
                <a href="{{ route('page.register') }}">Sign Up</a>
            @endguest

            @auth
                <a href="">{{ \Illuminate\Support\Facades\Auth::user()->login }}</a>
                <a href="{{ route('auth.logoutUser') }}">Log Out</a>
            @endauth
        </nav>
    </div>
</header>
