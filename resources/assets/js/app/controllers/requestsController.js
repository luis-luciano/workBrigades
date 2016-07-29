module.exports = (function ($) {

    var _typologiesInit=function(tipologiesRelations,route){
        var typologiesSelect=$("#typology");
        var coloniesSelect=$('#colony_id');

        var showTypologyWithProblems= function(){
            var html="";
            var problems=$('#problem');
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

            showColoniesAndSector($('#colony_id').val(),$('#typology').val());
            
            problems.html(html);
            problems.select2();
            $('#supervisions').val(supervisions.join(',  '));

        }.bind(typologiesSelect,tipologiesRelations);

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

        showTypologyWithProblems();

        typologiesSelect.change(function() {
            showTypologyWithProblems();
        });

        showColoniesAndSector(coloniesSelect.val(),typologiesSelect.val());

        coloniesSelect.change(function(){
            showColoniesAndSector($(this).val(),typologiesSelect.val());
        });
    };

    var index = function() {
        //
    };

    var create = function(tipologiesRelations,route) {
       $('.select').select2();
       $('#request_priority_id').val(2).trigger('change');
       _typologiesInit(tipologiesRelations,route);
    };

    var edit = function() {
       
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);