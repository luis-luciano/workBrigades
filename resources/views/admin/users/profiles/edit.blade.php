@extends('layouts.masterComplete')

@section('title', 'Perfil')

@section('scripts')
    usersController.editProfilePhoto({!! $photos !!});
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Foto de Perfil</h4>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    <div class="form-buttons buttons-on-top clearfix">
                        <div class="pull-left">
                            <a id="imageGalleryButton" class="btn btn-primary">
                                <i class="fa fa-camera"></i> Foto Actual
                            </a>
                        </div>
                        @if($user->photo->name !== "default.jpg")
                            <div class="pull-right">
                                {{--{!! Form::open(['route' => 'users.profiles.photos.destroy', 'method' => 'DELETE', 'id' => 'deleteUserPhotoForm']) !!}--}}
                                    {{--<button class="btn btn-danger" id="deleteUserPhotoButton" type="submit">
                                        <i class="fa fa-trash-o"></i> Eliminar Foto
                                    </button>
                                {{--{!! Form::close() !!}--}}
                            </div>
                        @endif
                    </div>
                    {!! Form::open(['route' => 'users.profiles.photos.update', 'files' => true, 'method' => 'PATCH']) !!}
                        <div class="form-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::file('file', ['id' => 'fileinput', 'accept' => '.jpg, .jpeg, .png']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <div class="form-buttons clearfix">
                        <div class="pull-left">
                            <a href="{{ route('users.profiles.index') }}" class="btn btn-warning" id="backButton">Regresar</a>
                        </div>
                    </div>
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
    @include('partials.modals.gallery')
@stop
