@extends( 'templates.main' )

@section( 'content' )

<h1>Contact Us</h1>

<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="{{ route( 'contact' ) }}" method="post">
          <fieldset>
            <legend class="text-center">Contact us</legend>

						<input type="hidden" name="_token" value="{{ csrf_token() }}" />

						@if( Session::has( 'success' ) )
							<p class="alert alert-success">{{ Session::get( 'success' ) }}</p>
						@endif

						<!-- Branch input-->
            <div class="form-group{{ $errors->has( 'contact_branch' ) ? ' has-error' : '' }}">
              <label class="col-md-3 control-label" for="contact_branch">Select a branch:</label>
              <div class="col-md-9">
								<select id="contact_branch" name="contact_branch" class="form-control">
									<option value="">Select a Branch</option>
									<option value="George">George</option>
									<option value="Knysna">Knysna</option>
								</select>

								@if( $errors->has( 'contact_branch' ) )
                    <span class="help-block">
                        <strong>{{ $errors->first( 'contact_branch' ) }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <!-- Name input-->
            <div class="form-group{{ $errors->has( 'contact_name' ) ? ' has-error' : '' }}">
              <label class="col-md-3 control-label" for="contact_name">Name</label>
              <div class="col-md-9">
                <input id="contact_name" name="contact_name" type="text" placeholder="Your name" class="form-control">

								@if( $errors->has( 'contact_name' ) )
                    <span class="help-block">
                        <strong>{{ $errors->first( 'contact_name' ) }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <!-- Email input-->
            <div class="form-group{{ $errors->has( 'contact_email' ) ? ' has-error' : '' }}">
              <label class="col-md-3 control-label" for="contact_email">Your E-mail</label>
              <div class="col-md-9">
                <input id="contact_email" name="contact_email" type="text" placeholder="Your email" class="form-control">
								@if( $errors->has( 'contact_email' ) )
                    <span class="help-block">
                        <strong>{{ $errors->first( 'contact_email' ) }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <!-- Message body -->
            <div class="form-group{{ $errors->has( 'contact_message' ) ? ' has-error' : '' }}">
              <label class="col-md-3 control-label" for="contact_message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="contact_message" name="contact_message" placeholder="Please enter your message here..." rows="5"></textarea>
								@if( $errors->has( 'contact_message' ) )
                    <span class="help-block">
                        <strong>{{ $errors->first( 'contact_message' ) }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="contact_submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>

@endsection
