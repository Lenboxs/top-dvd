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
        <h3 class="box-title"> <i class="fa fa-cog"></i> Manage Home Page</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form">
        <div class="box-body">
          <section class="grid-demo">

                <h2 class="section-title"><span>Grid Demo</span></h2>

                <div class="controls cf">
                  <div class="control search">
                    <div class="control-icon">
                      <i class="fa fa-search"></i>
                    </div>
                    <input class="control-field search-field form-control " type="text" name="search" placeholder="Search...">
                  </div>
                  <div class="control filter">
                    <div class="control-icon">
                      <i class="material-icons"></i>
                    </div>
                    <div class="select-arrow">
                      <i class="material-icons"></i>
                    </div>
                    <select class="control-field filter-field form-control">
                      <option value="" selected="">All</option>
                      <option value="red">Red</option>
                      <option value="blue">Blue</option>
                      <option value="green">Green</option>
                    </select>
                  </div>
                  <div class="control sort">
                    <div class="control-icon">
                      <i class="material-icons"></i>
                    </div>
                    <div class="select-arrow">
                      <i class="material-icons"></i>
                    </div>
                    <select class="control-field sort-field form-control">
                      <option value="order" selected="">Drag</option>
                      <option value="title">Title (drag disabled)</option>
                      <option value="color">Color (drag disabled)</option>
                    </select>
                  </div>
                  <div class="control layout">
                    <div class="control-icon">
                      <i class="material-icons"></i>
                    </div>
                    <div class="select-arrow">
                      <i class="material-icons"></i>
                    </div>
                    <select class="control-field layout-field form-control">
                      <option value="left-top" selected="">Left Top</option>
                      <option value="left-top-fillgaps">Left Top (fill gaps)</option>
                      <option value="right-top">Right Top</option>
                      <option value="right-top-fillgaps">Right Top (fill gaps)</option>
                      <option value="left-bottom">Left Bottom</option>
                      <option value="left-bottom-fillgaps">Left Bottom (fill gaps)</option>
                      <option value="right-bottom">Right Bottom</option>
                      <option value="right-bottom-fillgaps">Right Bottom (fill gaps)</option>
                    </select>
                  </div>
                </div>

                <div class="grid muuri" style="height: 720px;"></div>

                <div class="grid-footer">
                  <button class="add-more-items btn btn-primary"><i class="material-icons"></i>Add more items</button>
                </div>

              </section>
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
