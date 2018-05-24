@extends( 'admin.layouts.admin' )

@section( 'title' )
{{ $title }}
@endsection

@section( 'content' )
<!-- Main content -->
    <section class="content">
<div class="row">
  <!-- left column -->
  <div class="col-md-12">



    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Settings</a></li>
        <li><a href="#tab2" data-toggle="tab">Social Media</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab1">
          <div class="row">
            <div class="col-md-12">
              <!-- form start -->
              <form role="form" method="POST" action="{{ url( '/admin/update-settings' ) }}" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="remove_logo" id="remove_logo" value="false" />

                  <div class="form-group {{ $errors->has( 'logo' ) ? ' has-error' : '' }}">
          					<label for="logo" class="control-label">Logo</label>
          					<input type="file" name="logo" id="logo" />

                    <p class="help-block">Choose the company logo.</p>

          					<br />
          					@if( !empty( $settings->logo ) )
          						<div id="logo_file">
          							<img class="profile-image img-responsive" src="{{ !empty( $settings->logo ) ? url( 'img/settings/' . $settings->logo ) : '' }}" width="200" />
          							<br /><a class="btn btn-danger remove_file" id="logo"><i class="fa fa-trash-o"></i> Remove file</a>
          						</div>
          					@endif

          					@if ( $errors->has( 'logo' ) )
          						<span class="help-block">
          							<strong>{{ $errors->first( 'logo' ) }}</strong>
          						</span>
          					@endif
          				</div>

                  <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab2">
          <div class="row">
            <div class="col-md-12">
              <!-- form start -->
                <form role="form" method="POST" action="{{ url( '/admin/update-socialmedia' ) }}">

                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                  <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Facebook:</label>

                    <input id="facebook" type="text" class="form-control" name="facebook" value="{{ !empty( $socialmedia->facebook ) ? $socialmedia->facebook : '' }}" />

                    @if ($errors->has('facebook'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebook') }}</strong>
                        </span>
                    @endif
                  </div>

                  <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Twitter:</label>

                    <input id="twitter" type="text" class="form-control" name="twitter" value="{{ !empty( $socialmedia->twitter ) ? $socialmedia->twitter : '' }}" />

                    @if ($errors->has('twitter'))
                        <span class="help-block">
                            <strong>{{ $errors->first('twitter') }}</strong>
                        </span>
                    @endif
                  </div>

                  <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Linked In:</label>

                    <input id="linkedin" type="text" class="form-control" name="linkedin" value="{{ !empty( $socialmedia->linkedin ) ? $socialmedia->linkedin : '' }}" />

                    @if ($errors->has('linkedin'))
                        <span class="help-block">
                            <strong>{{ $errors->first('linkedin') }}</strong>
                        </span>
                    @endif
                  </div>

                  <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->

  </div>
</div>
<section>
@endsection

@push( 'custom-scripts' )
<script type="text/javascript" >
  $( '.remove_file' ).click( function(e) {
    $( '#remove_' + this.id ).val( 'true' );
    $( '#' + this.id + '_file' ).hide( "slow" );
  });
</script>
@endpush
