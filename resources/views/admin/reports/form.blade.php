<div class="row">
    @role("administrator|supervisor")
    <div class="col-md-3">
        <div class="control-group">
            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="ion-android-calendar"></i></span>
                    <div class="inputer">
                        <div class="input-wrapper">
                            {!! Form::text('date_range', Request::get('date_range', "01/01/2014 - " . dateToday('d/m/Y')), ['class' => 'form-control daterange-picker']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    @endrole

    @role("administrator|supervisor")
    <div class="col-md-5">
        <div class="form-group">
            {!! Form::multipleSelectPicker('supervisions[]', $supervisions, Request::get('supervisions'), ['title' => plural('supervisions'),'data-width' => '100%']) !!} 
        </div><!--.form-group-->
    </div>
    @endrole

    @if(auth()->check() && !auth()->user()->hasRole("administrator|supervisor"))
    <div class="col-md-3">
        <div class="control-group">
            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="ion-android-calendar"></i></span>
                    <div class="inputer">
                        <div class="input-wrapper">
                            {!! Form::text('date_range', Request::get('date_range', "01/01/2014 - " . dateToday('d/m/Y')), ['class' => 'form-control daterange-picker','width'=>'100%']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    @endif

    <div class="col-md-3">
        <div class="pull-right">
            <div class="form-group">
                <button id="searchButton" class="btn btn-primary "><i class="fa fa-search"></i> Buscar</button>
                <input type="hidden" value="{{ route('reports.index') }}" id="routeSearchRequest">
                <a href="{{ route('reports.index') }}" class="btn btn-purple"><i class="fa fa-eye"></i> Ver todos</a>
            </div>
        </div>
    </div>

</div> 