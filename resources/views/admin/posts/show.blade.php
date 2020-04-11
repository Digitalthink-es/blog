@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 com-md-offset-2">
			<div class="card">
				<div class="card-header">
					Ver entrada
				</div> <!-- <div class="card-header"> -->

				<div class="card-body">
					<p>
						<strong>Nombre</strong>
						{{ $post->name }}
					</p>
					<p>
						<strong>Slug</strong>
						{{ $post->slug }}
					</p>
					<p>
						<strong>Contenido</strong>
					</p>
					<p>
						<textarea readonly="true" rows="20" cols="100">
							{{ $post->body }}
						</textarea>
					</p>										
				</div> <!-- <div class="card-body"> -->
			</div> <!-- <div class="card"> -->
		</div> <!-- <div class="col-md-12 com-md-offset-2"> -->
	</div> <!-- <div class="row"> -->
</div> <!-- <div class="container"> -->
@endsection