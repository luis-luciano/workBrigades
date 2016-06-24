@section('scripts')
	$("#dataTable>tbody>tr").on("click", function(e)
   {
       var url = $(this).find("#_url").val();
       if( e.which == 2 ) {
           e.preventDefault();
           var win = window.open(url, '_blank');
           win.focus();
           return;
      }
       window.location.href =  url;
   });
@stop