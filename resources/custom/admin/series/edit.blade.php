@extends( 'admin.layouts.admin' )

@section( 'title' )
{{ $title }}
@endsection

@section( 'content' )

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">{{ !empty( $title ) ? $title : 'Edit Series' }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="{{ url( '/admin/update-series' ) }}" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <input type="hidden" name="id" value="{{ ( !empty( $series ) && !empty( $series->id ) ) ? $series->id : '' }}" />
                <input type="hidden" name="remove_image" id="remove_image" value="false" />

                <div class="form-group {{ $errors->has( 'active' ) ? ' has-error' : '' }}">
                   <label for="active" class="control-label">Active</label>
                   <div class="switch" data-toggle="switch">
                       <label>Off <input type="checkbox" name="active" class="active" id="active" {{ ( !empty( $series ) && !empty( $series->active ) && ( $series->active == 1 ) ) ? 'checked' : '' }} /><span class="toggle"></span> On</label>
                   </div>

                   @if ( $errors->has( 'active' ) )
                       <span class="help-block">
                           <strong>{{ $errors->first( 'active' ) }}</strong>
                       </span>
                   @endif
                </div>

                <div class="form-group {{ $errors->has( 'new' ) ? ' has-error' : '' }}">
                   <label for="new" class="control-label">New</label>
                   <div class="switch" data-toggle="switch">
                       <label>Off <input type="checkbox" name="new" class="new" id="new" {{ ( !empty( $series ) && !empty( $series->new ) && ( $series->new == 1 ) ) ? 'checked' : '' }} /><span class="toggle"></span> On</label>
                   </div>

                   @if ( $errors->has( 'new' ) )
                       <span class="help-block">
                           <strong>{{ $errors->first( 'new' ) }}</strong>
                       </span>
                   @endif
                </div>

                <!-- text input -->
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Name:</label>

                    <input id="name" type="text" class="form-control" name="name" value="{{ ( !empty( $series ) && !empty( $series->name ) ) ? $series->name : '' }}" required>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="control-label">Description:</label>

                    <textarea id="description" class="form-control" rows="5" name="description">{{ ( !empty( $series ) && !empty( $series->description ) ) ? $series->description : '' }}</textarea>

                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has( 'image' ) ? ' has-error' : '' }}">
        					<label for="image" class="control-label">Image</label>
        					<input class="form-control" type="file" name="image" id="image" />
        					<br />
        					@if( !empty( $series->image ) )
        						<div id="image_file">
        							<img class="profile-image img-responsive" src="{{ !empty( $series->image ) ? url( 'img/series/' . $series->image ) : '' }}" width="100" />
        							<br /><a class="btn btn-danger remove_file" id="image"><i class="fa fa-trash-o"></i> Remove file</a>
        						</div>
        					@endif

        					@if ( $errors->has( 'image' ) )
        						<span class="help-block">
        							<strong>{{ $errors->first( 'image' ) }}</strong>
        						</span>
        					@endif
        				</div>

                <div class="form-group{{ $errors->has('trailerLink') ? ' has-error' : '' }}">
                    <label for="trailerLink" class="control-label">Trailer Link:</label>

                    <input type="text" id="trailerLink" class="form-control" rows="5" value="{{ ( !empty( $series ) && !empty( $series->trailerLink ) ) ? $series->trailerLink : '' }}" name="trailerLink" />

                    @if ($errors->has('trailerLink'))
                        <span class="help-block">
                            <strong>{{ $errors->first('trailerLink') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('season') ? ' has-error' : '' }}">
                    <label for="season" class="control-label">Season:</label>

                    <select id="season" class="form-control" rows="5" name="season" required>
                      <option value="">Select a Season</option>
                      @for( $i=1; $i<=30; $i++ )
                        <option value="{{ $i }}" {{ ( !empty( $series ) && !empty( $series->season ) && $series->season == $i ) ? 'selected' : '' }}>{{ $i }}</option>
                      @endfor
                    </select>

                    @if ($errors->has('season'))
                        <span class="help-block">
                            <strong>{{ $errors->first('season') }}</strong>
                        </span>
                    @endif
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info">Save</button>
              </div>
          </div>
          </form>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
@push( 'custom-scripts' )
<script type="text/javascript" >
  $( '.remove_file' ).click( function(e) {
    $( '#remove_' + this.id ).val( 'true' );
    $( '#' + this.id + '_file' ).hide( "slow" );
  });
</script>
@endpush
