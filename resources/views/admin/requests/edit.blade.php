@extends('layouts.masterComplete')

@section('title', 'Petición - Editar')

@section('styles')
    
@stop

@section('scripts')
        
       $('.select').select2();
       $('#request_priority_id').val(2).trigger('change');
        
        var typologiesSelect=$("#typology");
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

            var supervisions=$.map(typology.supervisions,function(supervision){
                return supervision.name;
            });

            var html="";
            for (var id =0,problem=1; id <problemTypes.length && problem <problemTypes.length; id+=2,problem+=2) {
                html+="<option value="+problemTypes[id]+" >"+problemTypes[problem]+"</option>\n";
            };
            
            showColoniesAndSector($('#colony_id').val(),$('#typology').val());
            
            var problems=$('#problem');
            problems.html(html);
            problems.select2();
            $('#supervisions').val(supervisions.join(',  '));
        }

        function showColoniesAndSector(idColony,idTypology){
            $.ajax({
                type:'GET',
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
                    alert("Error de comunicacion "+status+" con el servidor!!");
                }
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
                    {!! Form::model(['route' => 'requests.update', 'id' => 'createRequestForm']) !!}
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
        'title' => 'Agregar Ciudadano',
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
