@extends( 'templates.main' )

@section( 'content' )

<div class="content">
  <div class="content-background stripes-background"></div>
  <div class="content-overlay"></div>
    <div class="main-content">
        <div class="background-block">
        <!--div class="container"-->

          <h1 class="heading">Joyful June</h1>

          <div class="row">
              <div class="col-md-4">
                <div class="dvd">
                  <a href="{{ url( 'movie/deadpool-2' ) }}"><h4 class="dvd-name">Deadpool 2 (2018)</h4></a>
                  <a href="{{ url( 'movie/deadpool-2' ) }}">
                      <img src="{{ url( 'img/new/deadpool-2.jpg' ) }}" class="img-responsive dvd-img">
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="dvd">
                  <a href="{{ url( 'movie/annihilation' ) }}"><h4 class="dvd-name">Annihilation (2018)</h4></a>
                  <a href="{{ url( 'movie/annihilation' ) }}">
                    <img src="{{ url( 'img/new/annihilation.jpg' ) }}" class="img-responsive dvd-img">
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="dvd">
                  <a href="{{ url( 'movie/black-panther' ) }}"><h4 class="dvd-name">Black Panther (2018)</h4></a>
                  <a href="{{ url( 'movie/black-panther' ) }}">
                    <img src="{{ url( 'img/new/black-panther.jpg' ) }}" class="img-responsive dvd-img">
                  </a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="dvd">
                  <a href="{{ url( 'movie/a-wrinkle-in-time' ) }}"><h4 class="dvd-name">A Wrinkle in Time (2018)</h4></a>
                  <a href="{{ url( 'movie/a-wrinkle-in-time' ) }}">
                    <img src="{{ url( 'img/new/a-wrinkle-in-time.jpg' ) }}" class="img-responsive dvd-img">
                  </a>
                </div>
              </div>
          </div>
        <!--/div-->
        </div>
      </div>

    </div>
</div>
@endsection
