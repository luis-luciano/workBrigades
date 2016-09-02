var profilePhoto = $('#profilePhoto').attr('src'); //Save path to actual profile photo when preview a new one
var coverPhoto = $('#coverPhoto').attr('src'); //Save path to actual cover photo when preview a new one
var profilePhotoHasChange = false; // Dirty Flag
var coverPhotoHasChange = false; // Dirty Flag

thead = $('table#dataTable thead'); //Save table header when this changes to list

backgroundColorStatus($('.status')); //Add background color status to state field

clickableRow() // Add event clickable on row when it's a table

$('.require-asterisk').append(' <i class="fa fa-asterisk" aria-hidden="true" style="color:blue"></i>');

//If device is tablet or celphone convert initial table to list and initial backgroundColorStatus to textColorStatus
if ($(window).width() < 992) {
  convertTableIntoList();
  textColorStatus($('.status'));
}

// On resize window change table to list and backgroudnColorStatus to textColorStatus and viceversa
$(window).resize(function() {
  if ($(window).width() < 992) {
    convertTableIntoList();
    textColorStatus($('.status'));
  } else {
    convertListIntoTable();
    clickableRow();
    backgroundColorStatus($('.status'));
  }
});

$('.btn-floating-edit-info-contact').click(function() {
  $('#edit-info-contact-modal').modal();
});

$('input[name=profilePhoto]').change(function() {
  profilePhotoHasChange = true;
  $('.header-action').removeClass('invisible');
  previewImage(this, '#profilePhoto');
});

$('input[name=coverPhoto]').change(function() {
  coverPhotoHasChange = true;
  $('.header-action').removeClass('invisible');
  previewImage(this, '#coverPhoto');
});

$('[data-action="cancel"]').click(function() {
  $('.header-action').addClass('invisible');

  if (profilePhotoHasChange) {
    changeImage($('#profilePhoto'), profilePhoto);
    profilePhotoHasChange = false;
  }

  if (coverPhotoHasChange) {
    changeImage($('#coverPhoto'), coverPhoto);
    coverPhotoHasChange = false;
  }

  $('#header-form')[0].reset();
});

$('#edit-info-contact-modal').on('shown.bs.modal', function() {
  var input = $('input[name=name]');
  var strLength = input.val().length;
  input.focus();
  input[0].setSelectionRange(strLength, strLength);
});

function textColorStatus(selector) {
  $(selector).each(function() {
    $(this).css({
      'background': 'none',
      'color': $(this).attr('data-color-status')
    })
  });
}

function backgroundColorStatus(selector) {
  $(selector).each(function() {
    $(this).css({
      'background': $(this).attr('data-color-status'),
      'color': 'white'
    })
  });
}

function clickableRow() {
  $(".clickable-row").click(function() {
    window.document.location = $(this).data("href");
  });
}

function previewImage(input, container) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      changeImage(container, e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

function changeImage(container, url) {
  $(container).animate({
    'opacity': '0'
  }, 1000, function() {
    $(container).attr('src', url);
  }).animate({
    'opacity': '1'
  }, 2000);
}

function convertTableIntoList() {
  //Create a main DIV container to hold the moved table cell elements.
  var $newUl = $('<ul class="list-material" id="dataList"/>');
  //Place the DIV just above the existing table.
  $('table#dataTable').before($newUl);

  //Detach all table cells from the table, saving them in a JS object.
  var tableCells = $('table#dataTable tbody>tr').detach();

  //Loop through each item in the JS object.
  $.each(tableCells, function(count, item) {

    //get each item content
    contents = $(item).find('td').detach();

    //Create a new LI
    $newLi = $('<li class="has-action-left has-action-right"/>');
    //Create a new link to show complete information
    $link = $('<a href="' + $(item).data('href') + '" class="visible"/>');

    //DIVs to insert information
    $divLeft = $('<div class="list-action-left"><i class="ion-edit icon-circle"></i></div>');
    $divContent = $('<div class="list-content margin--left__zero"/>');
    $divRight = $('<div class="list-action-right font--color__gray"/>');

    //Add the contents of the item to the DIVs.
    $.each(contents, function(count1, item1) {
      $classname = $(item1).attr('id');
      contents1 = $(item1).contents();
      span = '<span class="' + $classname + '" id="' + count1 + '"/>';

      switch ($classname) {
      case 'title':
        $divContent.prepend($(span).append(contents1));
        break;
      case 'caption':
        $divContent.append($(span).append(contents1));
        break;
      case 'top':
        $divRight.append($(span).append(contents1));
        break;
      case 'state':
        $divRight.append($(span).append(contents1));
        break;
      case 'invisible':
        $divRight.append($(span).append(contents1));
        break;
      }
    });

    //Add the DIVs to the link
    $link.append($divContent, $divRight);
    //Add the LINK to the LI
    $newLi.append($link);
    //Add the new LI to the main UL container.
    $('ul.list-material').append($newLi);
    $('ul.list-material li>a:even').addClass('stripe');
  });

  //Remove the now empty original table.
  $('table#dataTable').remove();
}

function convertListIntoTable() {
  //Create a table.
  var $newTable = $('<table id="dataTable" class="table my-table-striped table-ellipsis"/>');
  $newTable.append(thead);
  $newTable.append('</tbody>');
  //Place the table just above the existing ul.
  $('ul#dataList').before($newTable);

  //Detach all li from ul, saving them in a JS object.
  var listElements = $('ul#dataList li').detach();

  //Loop through each item in the JS object.
  $.each(listElements, function(count2, item2) {
    newTr = $('<tr class="clickable-row" data-href="' + $(item2).find('a').attr("href") + '"/>');
    $('table#dataTable').append(newTr);

    //Ordenamiento de los objetos
    $($(item2).find('a>div>*')).sort(function(a, b) {
      var x = parseInt(a.id);
      var y = parseInt(b.id);
      if (x < y) return -1;
      if (x > y) return 1;
      return 0;
    }).each(function() {
      var elem = $(this);
      elem.remove();
      $(item2).append(elem);
    });

    allElements = $(item2).find('>span').detach();

    $.each(allElements, function(count3, item3) {
      classname = $(item3).attr('class');
      newTd = $('<td id="' + classname + '"/>');
      contents3 = $(item3).contents();
      $(newTd).append(contents3);
      $(newTr).append(newTd);
    });
  });
  //Remove the now empty original table.
  $('ul.list-material').remove();
}