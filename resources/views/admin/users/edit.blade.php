@extends('layouts.masterComplete')

@section('title', 'Usuarios')

@section('styles')
    @parent
    
@stop

@section('scripts')

@stop

@section('content')
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel">

					<div class="panel-heading">
						<div class="panel-title">
	                        <div class="panel-title">
	                            <h4>Usuario</h4>
	                        </div>
	                        <ul class="nav nav-tabs with-panel nav-justified">
		                        <li class="active"><a href="#account" data-toggle="tab" class="btn-ripple">Cuenta</a></li>
		                        <li><a href="#personal-information" data-toggle="tab" class="btn-ripple">Información Personal</a></li>
		                    </ul>
	                    </div>

					</div><!--.panel-heading-->
					<div class="panel-body">

                    <div class="tab-content with-panel">
                        
                        <div id="account" class="tab-pane active">
                            <div class="form-buttons buttons-on-top clearfix">
                                <div class="pull-right">
                                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE', 'id' => 'deleteUserForm']) !!}
                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger', 'id' => 'deleteUserButton']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH', 'id' => 'editUserForm']) !!}

                                @include('admin.users.form', ['submitButtonText' => 'Actualizar'])

                            {!! Form::close() !!}
                        </div><!--.tab-pane-->

                        <div id="personal-information" class="tab-pane">
                            {!! Form::model($user->personalInformation, ['route' => ['personalInformations.update', $user->id], 'method' => 'PATCH', 'id' => 'editPersonalInformationForm']) !!}
                                
                                <div class="form-content">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                {!! Form::label('birthday', trans('personalInformations.birthday'), ['class' => 'control-label']) !!}
                                                <div class="inputer">
                                                    <div class="input-wrapper">
                                                        {!! Form::input('date', 'birthday', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div><!--.form-group-->
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="inputer floating-label">
                                                    <div class="input-wrapper">
                                                        {!! Form::text('represent', null, ['class' => 'form-control']) !!}
                                                        {!! Form::label('represent', trans('personalInformations.represent'), ['class' => 'control-label']) !!}
                                                    </div>
                                                </div>
                                            </div><!--.form-group-->
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="inputer floating-label">
                                                    <div class="input-wrapper">
                                                        {!! Form::text('house_phone', null, ['class' => 'form-control']) !!}
                                                        {!! Form::label('house_phone', trans('personalInformations.house_phone'), ['class' => 'control-label']) !!}
                                                    </div>
                                                </div>
                                            </div><!--.form-group-->
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="inputer floating-label">
                                                    <div class="input-wrapper">
                                                        {!! Form::text('mobile_phone', null, ['class' => 'form-control']) !!}
                                                        {!! Form::label('mobile_phone', trans('personalInformations.mobile_phone'), ['class' => 'control-label']) !!}
                                                    </div>
                                                </div>
                                            </div><!--.form-group-->
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="inputer floating-label">
                                                    <div class="input-wrapper">
                                                        {!! Form::text('fax', null, ['class' => 'form-control']) !!}
                                                        {!! Form::label('fax', trans('personalInformations.fax'), ['class' => 'control-label']) !!}
                                                    </div>
                                                </div>
                                            </div><!--.form-group-->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="inputer floating-label">
                                                    <div class="input-wrapper">
                                                        {!! Form::text('street', null, ['class' => 'form-control']) !!}
                                                        {!! Form::label('street', trans('personalInformations.street'), ['class' => 'control-label']) !!}
                                                    </div>
                                                </div>
                                            </div><!--.form-group-->
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="inputer floating-label">
                                                    <div class="input-wrapper">
                                                        {!! Form::text('number', null, ['class' => 'form-control']) !!}
                                                        {!! Form::label('number', trans('personalInformations.number'), ['class' => 'control-label']) !!}
                                                    </div>
                                                </div>
                                            </div><!--.form-group-->
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="inputer floating-label">
                                                    <div class="input-wrapper">
                                                        {!! Form::text('interior', null, ['class' => 'form-control']) !!}
                                                        {!! Form::label('interior', trans('personalInformations.interior'), ['class' => 'control-label']) !!}
                                                    </div>
                                                </div>
                                            </div><!--.form-group-->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('colony_id', trans('personalInformations.colony_id'), ['class' => 'control-label']) !!}
                                                <div class="input-wrapper">
                                                    {!! Form::select('colony_id', $colonies, null, ['class' => 'select2 form-control', 'style' => 'width: 100%']) !!}
                                                </div>
                                            </div><!--.form-group-->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="inputer floating-label">
                                                    <div class="input-wrapper">
                                                        {!! Form::text('profession', null, ['class' => 'form-control']) !!}
                                                        {!! Form::label('profession', trans('personalInformations.profession'), ['class' => 'control-label']) !!}
                                                    </div>
                                                </div>
                                            </div><!--.form-group-->
                                        </div>
                                    </div>
                                </div><!--.form-content-->
                                <div class="form-buttons form-group clearfix">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div><!--.tab-pane-->
                        
                    </div><!--.tab-content-->
                
					
					</div><!--.panel-body-->
				</div><!--.panel-->
			</div><!--.col-md-12-->
		</div><!--.row-->
@stop