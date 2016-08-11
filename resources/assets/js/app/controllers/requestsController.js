module.exports = (function ($) {

    var _typologiesInit=function(tipologiesRelations,route){
        var typologiesSelect=$("#typology");
        var coloniesSelect=$('#colony_id');
        var problems=$('#problem');
        var typeRequest=$('#typeRequest');

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
                                            $('#brigade_id').html(data.brigades);

                                            if(typeRequest.val() != "edit"){
                                                $('#brigade_id').val(data.defaultId).trigger('change');
                                            }
                                        },
                error: function(xhr,status){
                    alert("Error de comunicacion "+status+" con el servidor!!");
                }
            });
        }.bind(route);

        var showColonies=function(){
            var uri=$('#colonySearchUri').val();
            var typologyId=$('#typology').val();
            var colonyId=$('#colony_id').val();

            $.getJSON(uri, {
                colony: colonyId,
                typology: typologyId
            })
            .done(function(msg) {
                alert(msg);

            })
            .fail(function(data) {
                throw new Error("Error while loading.");
            });
        }
        if(typeRequest.val() != "edit")
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

        _initCitizenSearchBox();
    };

    var _editCitizenModalInit = function() {
        var citizenSearchBox = $('.citizen-search-box');
        var editCitizenForm = $('#editCitizenForm');

        _editCitizenModalButtonState();

        citizenSearchBox.change(function() {
            _editCitizenModalButtonState();
        });

        $('#editCitizenModal').on('shown.bs.modal', function() {
            var citizenId = citizenSearchBox.val();
            var uri = $(this).data('uriSourceData') + "/" + citizenId;

            $.getJSON(uri, {
                include: "personal_information"
            })
                .done(function(citizen) {
                    $.each(citizen, function(attribute, value) {
                        editCitizenForm.find("[name='" + _.snakeCase(attribute) + "']").val(value).trigger("change").trigger("keyup");
                    });

                    editCitizenForm.attr('action', uri);
                })
                .fail(function(data) {
                    throw new Error("Error while loading.");
                });
        });

        //falta citizen validator
        //
        editCitizenForm.submit(function(e) {
            e.preventDefault();
            require('../helpers/ajaxFormCall.js')({
                form: $(this),
                errorsContainer: $('#errorsHtmlListEditCitizenForm'),
                modalContainer: $('#editCitizenModal'),
                alertText: 'update',
                afterCall: function(citizen) {
                    var selectBox = $('.citizen-search-box option:selected');
                    // update text the citizen selected to the citizen search box
                    selectBox.text(citizen.name);
                    $('.citizen-search-box').select2();
                }
            });
        });

    }

    var _editCitizenModalButtonState = function() {
        if ($('.citizen-search-box').val() !== null) {
            $('#editCitizenModalButton').show();
        } else {
            $('#editCitizenModalButton').hide();
        }
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

    var _citizenSearchBoxSetup = {
        processResults: function(data, page) {
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            
            page.page= page.page || 1;

            return {
                results: data.items,
                pagination: {
                    more: (page.page * 30)<data.total_count
                }
            };
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        templateResult: function(citizen) {
            if (citizen.loading) return 'Buscando...';

            var markup = citizen.name;

            return markup;
        },
        templateSelection: function(citizen) {
            return citizen.name || citizen.text;
        },
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

    var create = function(tipologiesRelations,route) {
       $('#request_priority_id').val(2).trigger('change');
       _typologiesInit(tipologiesRelations,route);
       _citizensInit();
       _editCitizenModalInit();
    };

    var edit = function(tipologiesRelations,route) {
       _typologiesInit(tipologiesRelations,route);
       _citizensInit();
       _editCitizenModalInit();

       FileInput.init({
            el: $("#fileinput"),
            form: $("#fileinput").closest('form'),
            maxFileSize: 25600,
            maxFileCount: 10,
            allowedFileExtensions: ['png', 'jpg', 'jpeg', 'pdf'],
        });
       
       $('#fileinput').on('fileuploaded', function(event, data, previewId, index) {
            location.reload();
        });
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);