@extends( 'admin.layouts.admin' )

@section( 'title' )
{{ $title }}
@endsection

@push('styles')
<!-- Morris.js charts -->
<link rel="stylesheet" href="{{ url( 'plugins/select2/select2.min.css' ) }}">
@endpush

@section( 'content' )

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">{{ !empty( $title ) ? $title : 'Edit User' }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="{{ url( '/admin/update-user' ) }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <input type="hidden" name="id" value="{{ ( !empty( $user ) && !empty( $user->id ) ) ? $user->id : '' }}" />

                <!-- text input -->
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Name</label>

                    <input id="name" type="name" class="form-control" name="name"  value="{{ !empty( $user->name ) ? $user->name : "" }}" required />

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has( 'email' ) ? ' has-error' : '' }}">
                  <label for="email" class="control-label">Email</label>
                  <input class="form-control" type="email" name="email" id="email" value="{{ !empty( $user->email ) ? $user->email : "" }}" required />

                  @if ( $errors->has( 'email' ) )
                      <span class="help-block">
                          <strong>{{ $errors->first( 'email' ) }}</strong>
                      </span>
                  @endif
              </div>

              <div class="form-group {{ $errors->has( 'password' ) ? ' has-error' : '' }}">
                  <label for="password" class="control-label">New Password</label>
                  <input class="form-control" type="password" name="password" id="password" value="" />

                  @if ( $errors->has( 'password' ) )
                      <span class="help-block">
                          <strong>{{ $errors->first( 'password' ) }}</strong>
                      </span>
                  @endif
              </div>

              <div class="form-group">
                  <label for="password-confirm" class="control-label">Confirm Password</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
              </div>

              <div class="form-group {{ $errors->has( 'roles' ) ? ' has-error' : '' }}">
                  <label for="roles" class="control-label">Roles</label>
                  <select class="form-control select2 select-primary" name="roles[]" id="roles" multiple="multiple" data-placeholder="Select Role" style="width: 100%;">
                      @if( !empty( $roles ) )
                          @foreach( $roles as $role )
                              <option value="{{ !empty( $role->id ) ? $role->id : '' }}"
                              @foreach( $user->roles as $user_role )
                                  @if( $user_role->id == $role->id )
                                      selected
                                  @endif
                              @endforeach
                              >{{ !empty( $role->role ) ? Ucfirst( $role->role ) : "" }}</option>
                          @endforeach
                      @endif
                  </select>

                  @if ( $errors->has( 'roles' ) )
                      <span class="help-block">
                          <strong>{{ $errors->first( 'roles' ) }}</strong>
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

@push('scripts')
<script src="{{ url( 'plugins/select2/select2.full.min.js' ) }}"></script>
@endpush

@push( 'custom-scripts' )
<script type="text/javascript">
  $( '.select2' ).select2();
</script>
@endpush
