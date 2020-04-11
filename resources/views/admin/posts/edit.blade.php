@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 com-md-offset-2">
			<div class="card">
				<div class="card-header">
					Editar entrada {{ $post->id }} {{ $post->name }}
				</div> <!-- <div class="card-header"> -->

				<div class="card-body">
					{!! Form::model($post, ['route' => ['posts.update', $post->id],
										   'method' => 'PUT']) 
					!!}
						@include('admin.posts.partials.form')
					{!! Form::close() !!}	
				</div> <!-- <div class="card-body"> -->
			</div> <!-- <div class="card"> -->
		</div> <!-- <div class="col-md-12 com-md-offset-2"> -->
	</div> <!-- <div class="row"> -->
</div> <!-- <div class="container"> -->
@endsection