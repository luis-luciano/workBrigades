<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
	<script type="text/javascript">
	var typologiesSelect;
		$(document).ready(function(){
			typologiesSelect=$("#typology");
			var datos=({!! $prueba !!});
			
			showTypologyWithProblems(datos);
			
			typologiesSelect.change(function() {
				showTypologyWithProblems(datos);
			});
		});

		function showTypologyWithProblems(datos){
			
			var typologyId = typologiesSelect.val();

			var typology=$.grep(datos,function(typology){
				return typology.id==typologyId;
			})[0];

			var problemTypes = $.map(typology.problem_types, function(problem) {
                 return [problem.id,problem.name];
            });

			var html="";
            for (var id =0,problem=1; id <problemTypes.length && problem <problemTypes.length; id+=2,problem+=2) {
            	html+="<option value="+problemTypes[id]+" >"+problemTypes[problem]+"</option>\n";
            };
            $('#problem_type').html(html);
            console.log(html);
		}

	</script>
</head>
<body>
	<h1>PETICION </h1>
		<h2>{{ $date }}</h2>
	<div class="">
        
		{!! Form::open(array('route' => 'requests.store', 'class' => 'form')) !!}
			<h3>Datos del problema</h3>
			
			{!! Form::label('problem_type','TIPO DE PROBLEMA' ,['class' => 'control-label col-sm-4']) !!}
			{!! Form::select('problem_type', $problemType , null,['class' => 'js-example-basic-single form-control']) !!}
			<br>
			{!! Form::label('typology','TIPOLOGIA' ,['class' => 'control-label col-sm-4']) !!}
			{!! Form::select('typology', $typologies , null,['class' => 'js-example-basic-single form-control']) !!}
            
			{!! Form::label('supervicion','SUPERVICION IMPLICADA' ,['class' => 'control-label col-sm-4']) !!}
			{!! Form::select('supervicion', $supervicion , null,['class' => 'js-example-basic-single form-control']) !!}
            <br>

            {!! Form::label('subject','INFORMACION ADICIONAL DEL PROBLEMA : ',['class' => 'control-label col-sm-4']) !!}
			<br>	{!! Form::textArea('subject', null, ["class" => "form-control", "placeholder" =>"Ingrese Datos adicionales que sean de ayuda para detectar el problema", "required", "title" => "INGRESE UNA DESCRIPCION ADICIONAL DEL PROBLEMA" ,"pattern" => "[a-zA-Z]{4,25}", "maxlength" => "20"]) !!}
			<br>
			{!! Form::label('stree','AVENIDA O CALLE',['class' => 'control-label col-sm-4']) !!}
			{!! Form::text('stree', null, ["class" => "form-control", "placeholder" =>"Avenida o Calle", "required", "maxlength" => "20"]) !!}
			{!! Form::label('stree','NUMERO',['class' => 'control-label col-sm-4']) !!}
			{!! Form::text('stree', null, ["class" => "form-control", "placeholder" =>"#######", "required", "maxlength" => "20"]) !!}
			<br>
            {!! Form::label('streets','ENTRE AVENIDAS O CALLES',['class' => 'control-label col-sm-4']) !!}
			{!! Form::text('stree', null, ["class" => "form-control", "placeholder" =>"Entre Avenidas o Calles", "required", "maxlength" => "20"]) !!}
			<br>
			{!! Form::label('subject','REFENCIA : ',['class' => 'control-label col-sm-4']) !!}
			<br>	{!! Form::textArea('subject', null, ["class" => "form-control", "placeholder" =>"Ingrese Datos adicionales que sean de ayuda para detectar el problema", "required", "title" => "INGRESE UNA DESCRIPCION ADICIONAL DEL PROBLEMA" ,"pattern" => "[a-zA-Z]{4,25}", "maxlength" => "20"]) !!}
		
			<br>
			{!! Form::label('colony','COLONIA' ,['class' => 'control-label col-sm-4']) !!}
			{!! Form::select('colony', $supervicion , null,['class' => 'js-example-basic-single form-control']) !!}
			
			{!! Form::label('sector','SECTOR' ,['class' => 'control-label col-sm-4']) !!}
			{!! Form::select('sector', $supervicion , null,['class' => 'js-example-basic-single form-control']) !!}
			<br>
            {!! Form::label('priority','PRIORIDAD' ,['class' => 'control-label col-sm-4']) !!}
			{!! Form::select('sector', $supervicion , null,['class' => 'js-example-basic-single form-control']) !!}
			
			{!! Form::label('brigade','BRIGADA DE ATENCION' ,['class' => 'control-label col-sm-4']) !!}
			{!! Form::select('brigade', $brigades , null,['class' => 'js-example-basic-single form-control']) !!}

            <h3>Datos del Usuario</h3>
			{!! Form::label('name','Ingrese Nombre Completo:',['class' => 'control-label col-sm-4']) !!}
			{!! Form::text('name', null, ["class" => "form-control", "placeholder" =>"Nombre", "required", "maxlength" => "20"]) !!}
			{!! Form::text('paternal_surname', null, ["class" => "form-control", "placeholder" =>"Apellido Paterno", "required", "maxlength" => "20"]) !!}
			{!! Form::text('pater_surname', null, ["class" => "form-control", "placeholder" =>"Apellido Materno", "maxlength" => "20"]) !!}
			<br>
			{!! Form::label('phone','Telefono : ',['class' => 'control-label col-sm-4']) !!}
			{!! Form::text('phone', null, ["class" => "form-control", "placeholder" =>"2719999999", "maxlength" => "10"]) !!}
			
			{!! Form::label('email','E-mail : ',['class' => 'control-label col-sm-4']) !!}
			{!! Form::text('email', null, ["class" => "form-control", "placeholder" =>"example@example.com",  "maxlength" => "40"]) !!}
			
						
						

		{!! Form::close() !!}
			          


    </div><!--.panel-body-->
</body>
</html>