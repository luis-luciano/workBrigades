<div class="modal scale fade" id="{{ $id }}" role="dialog" aria-hidden="true"
    @if(isset($attributes))
        @foreach ($attributes as $attribute => $value)
            {{ $attribute }}="{{ $value }}"
        @endforeach
    @endif
>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $title }}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                               @include($view)
                        </div><!--.panel-->
                    </div><!--.col-md-12-->
                </div><!--.row-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!--.modal-content-->
    </div><!--.modal-dialog-->
</div><!--.modal-->
