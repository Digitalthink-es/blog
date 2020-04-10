@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 com-md-offset-2">
			<div class="card">
				<div class="card-header">
					Ver etiqueta
				</div> <!-- <div class="card-header"> -->

				<div class="card-body">
					<p>
						<strong>Nombre</strong>
						{{ $tag->name }}
					</p>
					<p>
						<strong>Slug</strong>
						{{ $tag->slug }}
					</p>					
				</div> <!-- <div class="card-body"> -->
			</div> <!-- <div class="card"> -->
		</div> <!-- <div class="col-md-12 com-md-offset-2"> -->
	</div> <!-- <div class="row"> -->
</div> <!-- <div class="container"> -->
@endsection