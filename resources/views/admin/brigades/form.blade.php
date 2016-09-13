@include('errors.list')
<div class="form-content">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! Form::label('name','Nombre', ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
            
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('typologies_list[]', 'Tipologia', ['class' => 'control-label']) !!}
                    <div class="input-wrapper">
                      {!! Form::select('typologies_list[]', $typologies , null, ['class' => 'select2 form-control', 'style' => 'width:100%;','multiple']) !!}
                    </div>
                </div><!--.form-group-->
                <div class="form-group">
                    {!! Form::label('sectors_list[]', 'Sector De Atencion', ['class' => 'control-label']) !!}
                    <div class="input-wrapper">
                      {!! Form::select('sectors_list[]', $sectors , null, ['class' => 'select2 form-control', 'style' => 'width:100%;','multiple']) !!}
                    </div>
                </div><!--.form-group-->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('typologies_list_default[]', 'Tipologia Default', ['class' => 'control-label']) !!}
                    <div class="input-wrapper">
                      {!! Form::select('typologies_list_default[]', $typologies , null, ['class' => 'select2 form-control', 'style' => 'width:100%;','']) !!}
                    </div>
                </div><!--.form-group-->
                <div class="form-group">
                    {!! Form::label('sectors_list_default[]', 'Sector De Atencion Default', ['class' => 'control-label']) !!}
                    <div class="input-wrapper">
                      {!! Form::select('sectors_list_default[]', $sectors , null, ['class' => 'select2 form-control', 'style' => 'width:100%;','multiple']) !!}
                    </div>
                </div><!--.form-group-->
            </div>

        </div>
      
        
        <div class="col-md-6">
            <div class="form-group">
                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        {!! Form::textArea('description', null, ['class' => 'form-control js-auto-size valid','style'=>'height:100px'] ) !!}
                        {!! Form::label('description','Descripcion De la Brigada', ['class' => 'control-label']) !!}
                    </div>
                </div>
            </div><!--.form-group-->
        </div>
</div>  

 
</div><!--.form-content-->

<div class="form-buttons form-group clearfix">
    <div class="row">
        <div class="col-md-12">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-success','id' => 'editBrigadeForm']) !!}
            <a href="{{ route('brigades.create') }}" class="btn btn-primary">Nuevo</a>
            <a href="{{ route('brigades.index') }}" class="btn btn-warning">Regresar</a>
        </div>
    </div>
</div>