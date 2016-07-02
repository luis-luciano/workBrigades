@extends('layouts.masterComplete')

@section('title', 'Requests - Create')

@section('styles')
    
@stop

@section('scripts')

       $('.select').select2();
        
        var typologiesSelect;

        typologiesSelect=$("#typology");
        var data=({!! $tipologiesRelations !!});

        showTypologyWithProblems(data);

        typologiesSelect.change(function() {
            showTypologyWithProblems(data);
        });

        showColoniesAndSector($('#colony_id').val(),$('#typology').val());

        $('#colony_id').change(function(){
            showColoniesAndSector($(this).val(),$('#typology').val());
        });
        
        function showTypologyWithProblems(data){
            

            var typologyId = typologiesSelect.val();
            
            var typology=$.grep(data,function(typology){
                return typology.id==typologyId;
            })[0];

            

            var problemTypes = $.map(typology.problems, function(problem) {
                 return [problem.id,problem.name];
            });
            console.log(problemTypes);

            var supervisions=$.map(typology.supervisions,function(supervision){
                return supervision.name;
            });

            var html="";
            for (var id =0,problem=1; id <problemTypes.length && problem <problemTypes.length; id+=2,problem+=2) {
                html+="<option value="+problemTypes[id]+" >"+problemTypes[problem]+"</option>\n";
            };
            
            showColoniesAndSector($('#colony_id').val(),$('#typology').val());
            
            $('#problem').html(html);
            
            $('#supervisions').val(supervisions.join(',  '));
        }

        function showColoniesAndSector(idColony,idTypology){
            $.ajax({
                url:"{{ route('request.sector-brigade') }}",
                data: { 
                        colony: idColony,
                        typology: idTypology 
                      },
                dataType : 'json',
                success: function(data){ 
                                            $('#sector').text(data.sector);
                                            $('#brigade').html(data.brigades);
                                        },
                error: function(xhr,status){
                    alert("Error de comunicacion"+status+" con el servidor!!");
                },
                type:'GET'
            });
        }

@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Petición</h4>
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
--}}
    @include('partials.modals.layouts.closeModal', [
        'id' => 'searchCreateCitizenModal',
        'title' => 'Buscar o Agregar Ciudadano',
        'view' => 'admin.partials.modals.searchCreateCitizen'
    ])
{{--
    @include('partials.modals.layouts.closeModal', [
        'id' => 'editCitizenModal',
        'title' => 'Editar Ciudadano',
        'view' => 'admin.partials.modals.editCitizen',
        'attributes' => [
            'data-uri-source-data' => route('ajax.citizens.index')
        ]
    ])--}}
@stop
