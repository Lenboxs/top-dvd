<div class="header">
		<nav class="navbar navbar-default navbar-static-top">
        <div class="container">

					<div class="row">

						<div class="col-md-4">

            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset( 'img/logo.jpg' ) }}" class="logo img-responsive" />
                </a>
            </div>

					</div>

					<div class="col-md-4">

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

							 <ul class="nav navbar-nav navbar-right">
										<form method="get" action="{{ url( 'search' ) }}">

												<div class = "input-group">
					               <input type="text" name="search" id="search" class="search form-control" />

					               <span class = "input-group-btn">
					                  <input type="submit" name="submit" value="Search" class="btn btn-primary search-btn">
					               </span>

					            </div><!-- /input-group -->

										</form>
                </ul>

            </div>

						</div>

						<div class="col-md-4">

							<div class="collapse navbar-collapse" id="app-navbar-collapse">

								 <ul class="nav navbar-nav navbar-right">
											<!-- Authentication Links -->
											<li><a href="{{ route('login') }}">Login</a></li>
											<li><a href="{{ route('register') }}" class="register">Register</a></li>
									</ul>

							</div>

							</div>

						</div>
        </div>
		</nav>
</div>
