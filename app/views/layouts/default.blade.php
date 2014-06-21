@include('snippets.sn_page_top')

@include('snippets.sn_header')
	<!-- Notifications -->
	@include('notifications')
	<!-- ./ notifications -->
	<!-- Content -->
	@yield('content')
	<!-- ./ content -->
@include('snippets.sn_footer')

@include('snippets.sn_page_bottom')