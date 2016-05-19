<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>PETICION</h1>
	<div class="">
        
		{!! Form::open(array('route' => 'requests.store', 'class' => 'form')) !!}
			
			{!! Form::label('problem_type','TIPO DE PROBLEMA' ,['class' => 'control-label col-sm-4']) !!}
			{!! Form::select('problem_type', $problemType , null,['class' => 'js-example-basic-single form-control']) !!}
			<br>
			{!! Form::label('typology','TIPOLOGIA' ,['class' => 'control-label col-sm-4']) !!}
			{!! Form::select('typology', $typologies , null,['class' => 'js-example-basic-single form-control']) !!}
            <br>
			{!! Form::label('supervicion','SUPERVICION IMPLICADA' ,['class' => 'control-label col-sm-4']) !!}
			{!! Form::select('supervicion', $supervicion , null,['class' => 'js-example-basic-single form-control']) !!}
            <br>
			{!! Form::label('subject','INFORMACION DEL PROBLEMA : ',['class' => 'control-label col-sm-4']) !!}
			{!! Form::text('subject', null, ["class" => "form-control", "placeholder" =>"Ingrese Nombre", "required", "title" => "INGRESE UNA DESCRIPCION ADICIONAL DEL PROBLEMA" ,"pattern" => "[a-zA-Z]{4,25}", "maxlength" => "20"]) !!}
			<br>
			{!! Form::label('subject','INFORMACION DEL PROBLEMA : ',['class' => 'control-label col-sm-4']) !!}
			{!! Form::text('subject', null, ["class" => "form-control", "placeholder" =>"Ingrese Nombre", "required", "title" => "INGRESE UNA DESCRIPCION ADICIONAL DEL PROBLEMA" ,"pattern" => "[a-zA-Z]{4,25}", "maxlength" => "20"]) !!}
						
						

		{!! Form::close() !!}
			          


    </div><!--.panel-body-->
</body>
</html>