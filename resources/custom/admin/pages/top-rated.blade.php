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
        <h3 class="box-title"> <i class="fa fa-cog"></i> Manage Top Rated Page</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form">
        <div class="box-body">

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<section>
@endsection

@push('scripts')
<script src="{{ asset( 'js/web-animations.min.js' ) }}"></script>
<script src="{{ asset( 'js/hammer.min.js' ) }}"></script>
<script src="{{ asset( 'js/muuri.min.js' ) }}"></script>
<script src="{{ asset( 'js/demo-grid.js' ) }}"></script>
@endpush
