@extends('layouts.masterComplete')

@section('title', 'Requests - Create')

@section('scripts')
    var typologiesSelect;

        $('.select2').select2();
        
        $(document).ready(function(){
            typologiesSelect=$("#typology");
            var datos=({!! $prueba !!});

            setDefaultSelector()
            
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

            var supervisions=$.map(typology.supervisions,function(supervision){
                return supervision.name;
            });

            var html="";
            for (var id =0,problem=1; id <problemTypes.length && problem <problemTypes.length; id+=2,problem+=2) {
                html+="<option value="+problemTypes[id]+" >"+problemTypes[problem]+"</option>\n";
            };
            
            
            $('#problem_types').html(html);
            setDefaultSelector();
            console.log($('#problem_types > option[value="1"]').text());
            $('#supervisions').val(supervisions.join(',  '));
        }

        function setDefaultSelector(){
            //var default=$('#problem_types > option[value="1"]').text();
            $('#select2-problem_types-container').text($('#problem_types > option[value="1"]').text());
            $('#select2-problem_types-container').attr('title',$('#problem_types > option[value="1"]').text());
        }

@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Peticiones</h4>
                    </div>
                </div><!--.panel-heading-->
               <div class="panel-body">
                    {!! Form::open(['route' => 'requests.store', 'id' => 'createRequestForm']) !!}
                        @include('admin.requests.form', ['submitButtonText' => 'Guardar', 'type' => 'create'])
                    {!! Form::close() !!} 
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div><!--.row-->
{{--
    @include('partials.modals.layouts.closeModal', [
        'id' => 'createColonyModal',
        'title' => 'Agregar Colonia',
        'view' => 'admin.partials.modals.createColony'
    ])
    @include('partials.modals.layouts.closeModal', [
        'id' => 'searchCreateCitizenModal',
        'title' => 'Buscar o Agregar Ciudadano',
        'view' => 'admin.partials.modals.searchCreateCitizen'
    ])
    @include('partials.modals.layouts.closeModal', [
        'id' => 'editCitizenModal',
        'title' => 'Editar Ciudadano',
        'view' => 'admin.partials.modals.editCitizen',
        'attributes' => [
            'data-uri-source-data' => route('ajax.citizens.index')
        ]
    ])--}}
@stop
