module.exports = (function ($) {

    var _typologiesInit=function(tipologiesRelations,route,type){
        var typologiesSelect=$("#typology");
        var coloniesSelect=$('#colony_id');
        var problems=$('#problem');

        var showTypologyWithProblems= function(){
            var html="";   
            var typologyId = typologiesSelect.val();
            
            var typology=$.grep(tipologiesRelations,function(typology){
                return typology.id==typologyId;
            })[0];

            var problemTypes = $.map(typology.problems, function(problem) {
                 return [{id: problem.id,name: problem.name}];
            });

            var supervisions=$.map(typology.supervisions,function(supervision){
                return supervision.name;
            });
            
            $.each(problemTypes, function(index, problem) {
                html+="<option value="+problem.id+" >"+problem.name+"</option>\n";
            });

            showColoniesAndSector(coloniesSelect.val(),typologiesSelect.val());
            
            problems.html(html);
            problems.select2();
            $('#supervisions').val(supervisions.join(',  '));

        }.bind(typologiesSelect,tipologiesRelations,problems,coloniesSelect);

        var showColoniesAndSector=function(idColony,idTypology){
            $.ajax({
                type:'GET',
                url: route,
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
        }.bind(route);

        if(type != 'edit')
        {
            showTypologyWithProblems();
        }

        typologiesSelect.change(function() {
            showTypologyWithProblems();
        });

        coloniesSelect.change(function(){
            showColoniesAndSector($(this).val(),typologiesSelect.val());
        });
    };

    var index = function() {
        //
    };

    var create = function(tipologiesRelations,route,type) {
       $('.select').select2();
       $('#request_priority_id').val(2).trigger('change');
       _typologiesInit(tipologiesRelations,route,type);
    };

    var edit = function(tipologiesRelations,route,type) {
       $('.select').select2();
       _typologiesInit(tipologiesRelations,route,type);
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);