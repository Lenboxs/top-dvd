@extends( 'admin.layouts.admin' )

@section( 'title' )
{{ $title }}
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset( 'css/demo-grid.css' ) }}" />
@endpush

@section( 'content' )
<!-- Main content -->
    <section class="content">
<div class="row">
  <!-- left column -->
  <div class="col-md-12">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-cog"></i> Manage Top Ten Page</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="POST" action="{{ url( '/admin/update-topten' ) }}">
        <div class="box-body">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			
			<div class="form-group{{ $errors->has('heading') ? ' has-error' : '' }}">
				<label for="heading" class="control-label">Heading</label>

				<input id="heading" type="text" class="form-control" name="heading" value="{{ ( !empty( $topten ) && !empty( $topten->heading ) ) ? $topten->heading : '' }}" required>

				@if ($errors->has('heading'))
					<span class="help-block">
						<strong>{{ $errors->first('heading') }}</strong>
					</span>
				@endif
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-cog"></i> Sort Top Ten Movies</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
	  @if( !empty( $topten ) )
		  <form role="form">
			<div class="box-body">

				<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th></th>
				<th>Title</th>
				<th></th>
			</tr>
			</thead>
			<tbody class="sortable ui-sortable" data-entityname="articles">
				@if( !empty( $topten->movies ) )
					@foreach( $topten->movies as $movie )
						<tr data-itemid="{{ $movie->id }}">
							<td class="sortable-handle" style="width: 24px;"><span class="glyphicon glyphicon-sort"></span></td>
							<td style="width: 699px;">{{ $movie->name }}</td>
							<td class="grid-actions" style="width: 329px;">
								<a href="#" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="#" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
							</td>
						</tr>
					@endforeach
				@endif
					</tbody>
				</table>
				</div>
				<!-- /.box-body -->
			</form>
		@endif
        

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Publish</button>
        </div>
      
    </div>
	
	    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-cog"></i> Sort Top Ten Series</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
	  @if( !empty( $topten ) )
		  <form role="form">
			<div class="box-body">

				<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th></th>
				<th>Title</th>
				<th></th>
			</tr>
			</thead>
			<tbody class="sortable ui-sortable" data-entityname="articles">
				@if( !empty( $topten->movies ) )
					@foreach( $topten->movies as $movie )
						<tr data-itemid="{{ $movie->id }}">
							<td class="sortable-handle" style="width: 24px;"><span class="glyphicon glyphicon-sort"></span></td>
							<td style="width: 699px;">{{ $movie->name }}</td>
							<td class="grid-actions" style="width: 329px;">
								<a href="#" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="#" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
							</td>
						</tr>
					@endforeach
				@endif
					</tbody>
				</table>
				</div>
				<!-- /.box-body -->
			</form>
		@endif
        

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Publish</button>
        </div>
      
    </div>
  </div>
</div>
<section>
@endsection
 

@push( 'custom-scripts' )
<script>

    $.ajaxSetup({
        headers: {
            'X-XSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });

    var App = {};

    App.notify = {
        message: function(message, type){
            if ($.isArray(message)) {
                $.each(message, function(i, item){
                    App.notify.message(item, type);
                });
            } else {
                $.bootstrapGrowl(message, {
                    type: type,
                    delay: 4000,
                    width: 'auto'
                });
            }
        },

        danger: function(message){
            App.notify.message(message, 'danger');
        },
        success: function(message){
            App.notify.message(message, 'success');
        },
        info: function(message){
            App.notify.message(message, 'info');
        },
        warning: function(message){
            App.notify.message(message, 'warning');
        },
        validationError: function(errors){
            $.each(errors, function(i, fieldErrors){
                App.notify.danger(fieldErrors);
            });
        }
    };

    /**
     * @param  {*} requestData
     */
    var changePosition = function(requestData){

        $.ajax({
            'url': '/sort',
            'type': 'POST',
            'data': requestData,
            'success': function(data) {
                if (data.success) {
                    App.notify.success('Saved!');
                } else {
                    App.notify.validationError(data.errors);
                }
            },
            'error': function(){
                App.notify.danger('Something wrong!');
            }
        });
    };

    $(document).ready(function(){
        var $sortableTable = $('.sortable');
        if ($sortableTable.length > 0) {
            $sortableTable.sortable({
                handle: '.sortable-handle',
                axis: 'y',
                update: function(a, b){

                    var entityName = $(this).data('entityname');
                    var $sorted = b.item;

                    var $previous = $sorted.prev();
                    var $next = $sorted.next();

                    if ($previous.length > 0) {
                        changePosition({
                            parentId: $sorted.data('parentid'),
                            type: 'moveAfter',
                            entityName: entityName,
                            id: $sorted.data('itemid'),
                            positionEntityId: $previous.data('itemid')
                        });
                    } else if ($next.length > 0) {
                        changePosition({
                            parentId: $sorted.data('parentid'),
                            type: 'moveBefore',
                            entityName: entityName,
                            id: $sorted.data('itemid'),
                            positionEntityId: $next.data('itemid')
                        });
                    } else {
                        App.notify.danger('Something wrong!');
                    }
                },
                cursor: "move"
            });
        }
        $('.sortable td').each(function(){
            $(this).css('width', $(this).width() +'px');
        });
    });
</script>
@endpush