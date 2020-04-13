@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-md-12 col-md-offset-2">
			<h1>Lista de artículos</h1>
			
				@foreach($posts as $post)
					<div class="card">
						<!-- Si existe una imagen del post se muestra -->
						@if($post->file)
							<img src="{{ $post->file }}" class="card-img-top">
						@endif

						<div class="card-body">
							
							<h5 class="card-title">
								<strong>{{ $post->name }}</strong>
							</h5>
						
							<p class="card-text">
								{{ $post->excerpt }}
							</p>

							<a href="{{ route('post', $post->slug) }}" class="btn btn-primary">Leer más</a>
						</div> <!-- <div class="card-body"> -->
					</div> <!-- <div class="card"> -->

					<br/>
				@endforeach

				<!-- Botones de paginación -->
				{{ $posts->render() }}		
		</div>
	</div>
@endsection