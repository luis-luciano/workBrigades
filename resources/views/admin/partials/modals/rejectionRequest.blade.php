<div class="panel-body">
    {!! Form::model($inquiry->rejection,['route' => ['requests.unapproved', $inquiry->id],'method' => 'POST', 'id' => 'requestUnapprovedModal']) !!}
		<div class="form-content">
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
		        </div>
		    </div>
		</div><!--.form-content-->
		<div class="form-buttons form-group clearfix">
		    <div class="row">
		        <div class="col-md-12">
		            {!! Form::submit(is_null($inquiry->rejection) ? 'Rechazar petición' : 'Actualizar rechazo', ['class' => 'btn btn-success']) !!}
		        </div>
		    </div>
		</div>
    {!! Form::close() !!}
</div><!--.panel-body-->
