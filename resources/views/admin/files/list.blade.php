<ul class="list-material files-list">
	@foreach ($files as $file)
		<li class="has-action-left has-action-right file-item">
			<div class="list-action-left">
				@include('admin.files.types.icons.'.$file->type)
			</div>
			<div class="list-content">
				<span class="title"><a href="{{ route('requests.files.show', [$inquiry->id, $file->id]) }}" class="list-item-title" target="_blank">{{ $file->display_name }}</a></span>
				{{--<span class="caption">Subido por: {{ $file->owner->full_name }}</span>--}}
			</div>
			{{--<div class="list-action-right">
				<span class="top format-date-from-now">{{ $file->created_at }}</span>
				@if($currentUser->can('destroy', $file))
					{!! Form::open(['route' => ['requests.files.destroy', $inquiry->id, $file->id], 'method' => 'DELETE', 'class' => 'delete-request-file-form']) !!}
						<button class="bottom Button--Naked" type="submit" title="Eliminar">
	                        <i class="ajax-action ion-trash-b"></i>
	                    </button>
					{!! Form::close() !!}
				@endif
			</div>--}}
		</li>
	@endforeach
</ul>