@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-md-12 col-md-offset-2">
			<h1>Lista de artículos</h1>
			
				@foreach($posts as $post)
					<div class="card">
						<div class="card-header">
							{{ $post->name }}
						</div>

						<div class="card-body">
							@if($post->file)
								<img src="{{ $post->file }}" class="img-fluid">
							@endif

							{{ $post->excerpt }}
							<a href="{{ route('post', $post->slug) }}" class="float-right">Leer más</a>
						</div>
					</div>

					<br/>
				@endforeach

				<!-- Botones de paginación -->
				{{ $posts->render() }}		
		</div>
	</div>
@endsection