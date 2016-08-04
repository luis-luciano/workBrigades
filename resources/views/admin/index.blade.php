@extends('layouts.masterComplete')

@section('title', 'Funcionario - index')

@section('content')
	<div>
		<h2>
			Funcionario Logeado
			{{ Auth::user()->roles->lists('label') }}
		</h2>
	</div>
@stop