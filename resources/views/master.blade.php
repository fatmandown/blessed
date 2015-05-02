

@include('header')


	<body>
		<div class="wrapper">
			<div id="main">
					@if (Session::has('flash_message'))
						<div class="alert alert-success">
						@if (Session::has('flash_message_important'))

						<button class="close" data-dismiss="alert" aria-hidden='true' type='button'>&times;</button>
						{{ Session::get('flash_message') }}
						@endif
						</div>

					@endif
					@yield('content')
			</div>
		</div>
	</body>

@include('footer')