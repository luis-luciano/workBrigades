@if($errors->any())
	<div id="errorsList" class="alert alert-danger-transparent" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<ul>
	        @foreach ($errors->all() as $error)
	            <li><small>* {{ $error }}</small></li>
	        @endforeach
        </ul>
       
	</div>
@endif


