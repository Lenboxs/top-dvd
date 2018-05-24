@extends( 'layouts.app' )

@section( 'title' )

@endsection

@section( 'template' )
	
	@includeif( 'sections.header' )
		
	@includeif( 'sections.nav' )

	@yield( 'content' )
	
	@includeif( 'sections.footer' )

@endsection