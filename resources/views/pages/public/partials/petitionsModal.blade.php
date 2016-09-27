<div class="modal fade" id="petitionsModal" role="dialog"  tabindex='-1'>
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">Conoce el estado actual de tu petición</h4>
      </div>
      {!! Form::open(['route' => 'Peticion-publica.create', 'id' => 'ShowInquiryByIdForm', 'autocomplete' => 'off']) !!}
        <div class="modal-body">
          <p class="txt-justify">Ingresa el número de folio de tu petición para realizar la busqueda.</p>
            {!! Form::label('folio', trans('requests.id'), ['class' => 'control-label']) !!}
            <div class="inputer">
                <div class="input-wrapper">
                {!! Form::text('folio', null, ['class' => 'form-control']) !!}
              </div>
            </div>
        </div>

        <div class="modal-footer">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <button type="button" class="btn btn-grey btn-ripple col-md-12" data-dismiss="modal">Cerrar</button>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <button type="submit" class="btn btn-green btn-ripple col-md-12">Aceptar</button>
          </div>
        </div>
      {!! Form::close() !!}
    </div><!--.modal-content-->
  </div>
</div>