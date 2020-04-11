@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 com-md-offset-2">
			<div class="card">
				<div class="card-header">
					Lista de categorías
					<a href="{{ route ('categories.create') }}" class="btn btn-sm btn-primary float-right">
						Crear
					</a>
				</div> <!-- <div class="card-header"> -->

				<div class="card-body">
					<table class="table table-stripped table-hover">
						<thead>
							<th width="10px">Id</th>
							<th>Nombre</th>
							<th colspan="3">Acciones</th>
						</thead>
							
						<tbody>
							@foreach($categories as $category)
								<tr>
									<td width="10px">{{ $category->id }}</td>
									<td>{{ $category->name }}</td>
									<td width="10px">
										<a href="{{ route ('categories.show', $category->id) }}" class="btn btn-sm btn-secondary">
											Ver
										</a>
									</td>
									<td width="10px">
										<a href="{{ route ('categories.edit', $category->id) }}" class="btn btn-sm btn-secondary">
											Editar
										</a>
									</td>
									<td width="10px">
										{!! Form::open(['route' => ['categories.destroy', $category->id],
										'method' => 'DELETE'
										]) !!}
										    <button class="btn btn-sm btn-danger">Eliminar</button>
										{!! Form::close() !!}	
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>

					{{ $categories->render() }}
				</div> <!-- <div class="card-body"> -->
			</div> <!-- <div class="card"> -->
		</div> <!-- <div class="col-md-12 com-md-offset-2"> -->
	</div> <!-- <div class="row"> -->
</div> <!-- <div class="container"> -->
@endsection