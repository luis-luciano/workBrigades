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

    var _citizensInit = function() {
        // create citizen
        //require('../validators/citizenValidator.js')($('#createCitizenForm'));

        $('#createCitizenForm').submit(function(e) {
            e.preventDefault();
            require('../helpers/ajaxFormCall.js')({
                form: $(this),
                errorsContainer: $('#errorsHtmlListCreateCitizenForm'),
                modalContainer: $('#searchCreateCitizenModal'),
                alertText: 'store',
                afterCall: function(citizen) {
                    var selectBox = $('.citizen-search-box');
                    // set the citizen created to the citizen search box
                    require('../helpers/selectOption.js')(citizen.id, citizen.name).appendTo(selectBox);
                    selectBox.val(citizen.id).trigger('change');
                }
            });
        });
        // $('#createCitizenForm').submit(function(e) {
        //     e.preventDefault();
        //     require('../helpers/ajaxFormCall.js')({
        //         form: $(this),
        //         errorsContainer: $('#errorsHtmlListCreateCitizenForm'),
        //         modalContainer: $('#searchCreateCitizenModal'),
        //         alertText: 'store',
        //         afterCall: function(citizen) {
        //             var selectBox = $('.citizen-search-box');

        //             // set the citizen created to the citizen search box
        //             require('../helpers/selectOption.js')(citizen.id, citizen.name).appendTo(selectBox);
        //             selectBox.select2('val', citizen.id);
        //         }
        //     });
        // }); 
    };

    var _initCitizenSearchBox = function() {
        // citizens search box
        require('../helpers/select2AjaxSearchBox.js')({
            el: $(".citizen-search-box"),
            placeholder: "Nombre del Ciudadano...",
            url: $('#citizenSearchUri').val(),
            data: function(params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: _citizenSearchBoxSetup.processResults,
            escapeMarkup: _citizenSearchBoxSetup.escapeMarkup,
            minimumInputLength: 1,
            templateResult: _citizenSearchBoxSetup.templateResult,
            templateSelection: _citizenSearchBoxSetup.templateSelection,
        });
    };

    var index = function() {
        //
    };

    var create = function(tipologiesRelations,route,type) {
       $('.select').select2();
       $('#request_priority_id').val(2).trigger('change');
       _typologiesInit(tipologiesRelations,route,type);
       _citizensInit();
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