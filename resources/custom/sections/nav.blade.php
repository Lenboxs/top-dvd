<div class="navigation">
			<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                </div>

                <div class="collapse navbar-collapse" id="main-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <!-- Authentication Links -->
                        <li><a href="{{ route( 'home' ) }}">Home</a></li>
					              <li><a href="{{ route( 'top-10' ) }}">Top 10 Movies</a></li>
					              <li><a href="{{ route( 'top-rated' ) }}">Top Rated</a></li>
                        <li><a href="{{ route( 'movies' ) }}">DVD</a></li>
					              <li><a href="{{ route( 'contact-us' ) }}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</div>
