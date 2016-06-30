<div class="panel-body">
    @include('errors.htmlList', ['form' => 'ConvertRequestToProjectForm'])
    {!! Form::model($inquiry->project, ['route' => ['requests.projects.update', $inquiry->id], 'id' => 'createRequestProjectRequestForm', 'method' => 'PUT']) !!}
		<div class="form-content">
			<div class="row">
		        <div class="col-md-6">
		            <div class="form-group">
		                {!! Form::label('start_date', 'Fecha de Inicio', ['class' => 'control-label']) !!}
		                <div class="inputer">
		                    <div class="input-wrapper">
		                        {!! Form::input('date', 'start_date', null, ['class' => 'form-control']) !!}
		                    </div>
		                </div>
		            </div><!--.form-group-->
		        </div>
		        <div class="col-md-6">
		            <div class="form-group">
		                {!! Form::label('finish_date', 'Fecha de Finalización', ['class' => 'control-label']) !!}
		                <div class="inputer">
		                    <div class="input-wrapper">
		                        {!! Form::input('date', 'finish_date', null, ['class' => 'form-control']) !!}
		                    </div>
		                </div>
		            </div><!--.form-group-->
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <div class="inputer floating-label">
		                    <div class="input-wrapper">
		                        {!! Form::textarea('justification', null, ['class' => 'form-control', 'rows' => '3']) !!}
		                        {!! Form::label('justification', 'Justificación', ['class' => 'control-label']) !!}
		                    </div>
		                </div>
		            </div><!--.form-group-->
		            @if(! is_null($inquiry->project))
		            	<small>últ. vez actualizado el <span class="full-format-date">{{ $inquiry->project->updated_at }}</span> por {{ $inquiry->project->last_editor_full_name }}</small>
	            	@endif
		        </div>
		    </div>
		</div><!--.form-content-->
		<div class="form-buttons form-group clearfix">
		    <div class="row">
		        <div class="col-md-12">
		            {!! Form::submit( is_null($inquiry->project) ? 'Convertir en Proyecto' : 'Actualizar', ['class' => 'btn btn-success']) !!}
		        </div>
		    </div>
		</div>
    {!! Form::close() !!}
</div><!--.panel-body-->
