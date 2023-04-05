<x-app-layout>

	<!-- Main content -->
	<div id="main-content">

		<!-- main-slider -->
		<x-frontend.slider />

		{{-- <x-frontend.next-section section="resumen"/> --}}
		<!-- end main-slider -->

		<x-home-claim/>

		<!-- features -->
		{{-- <div class="sec-features-04">
			<div class="container">
				<div class="element-heading layout-2 style-3 align-center">
					<h3 class="title">
						{!! __('Nuestro objetivo <br> <strong>Tu futuro</strong>') !!}
					</h3>
				</div>
			</div>
		</div> --}}
		<!-- end features -->

		<!-- about us -->
		<x-frontend.resumen />

		{{-- <x-frontend.next-section section="courses"/> --}}
		<!-- end about us -->

		<!-- testimonial -->
		{{-- <x-frontend.testimonials /> --}}
		<!-- end testimonial -->

		<!-- news -->
		{{-- <x-frontend.latest-news :latestNews="$latestNews" /> --}}
		<!-- end news -->

		<!-- subscribe -->
		{{-- <x-frontend.subscribe /> --}}
		<!-- end subscribe -->

		<!-- about -->
		{{-- <x-frontend.wanttutor /> --}}
		<!-- end about -->
	</div>
	<!-- end Main content -->

</x-app-layout>
