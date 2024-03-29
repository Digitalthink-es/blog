<div class="form-group">
	{{ Form::label('name', 'Nombre de la etiqueta') }}
	{{ Form::text('name', null, ['class' => 'form-control', 
								 'id' => 'name']) 
	}}
</div>

<div class="form-group">
	{{ Form::label('slug', 'URL amigable') }}
	{{ Form::text('slug', null, ['class' => 'form-control', 
								 'id' => 'slug']) 
	}}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

@section('scripts')
	<script src="{{ asset('js/vendor/stringToSlug/jquery.min.js') }}" ></script>
	<script src="{{ asset('js/vendor/stringToSlug/speakingurl.min.js') }}"></script>
	<script src="{{ asset('js/vendor/stringToSlug/jquery.stringtoslug.min.js') }}"></script>

	<script>
		$(document).ready(function() {
		    $("#name, #slug").stringToSlug({
		    	callback:function(text){
		    		$("#slug").val(text);
		    	}
		    });
		});
	</script>
@endsection