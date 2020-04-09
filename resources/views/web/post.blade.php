@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-md-12 col-md-offset-2">
			<h1>{{ $post->name }}</h1>
				<div class="card">
					<div class="card-header">
						Categoría
						<a href="#">{{ $post->category->name }}</a>
					</div>

					<div class="card-body">
						@if($post->file)
							<img src="{{ $post->file }}" class="img-fluid">
						@endif

						{{ $post->excerpt }}
						<hr>
						{!! $post->body !!}
						<hr>
						Etiquetas
						@foreach($post->tags as $tag)
							<a href="#">
								{{ $tag->name }}
							</a>
						@endforeach
					</div>
				</div>
	</div>
@endsection