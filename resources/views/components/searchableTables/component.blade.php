@if($modelInstance->count() === 0)
    <p>No se encontraron {{ $elements }}. Vuelva a intentarlo <a class="btn btn-floating-sm btn-indigo" href="{{ route($routePrefix . 'index') }}" ><i class="fa fa-refresh" aria-hidden="true"></i></a></p>
@else
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['method' => 'GET' , 'id' => $elements.'SearchForm']) !!}
                <div class="row" style="padding-bottom: 2em;">
                    <div class="col-md-1">
                        <div class="form-group">
                            {!! Form::select('limit', ['10' => '10', '15' => '15', '20' => '20', $$elements->total() => 'Todos'], $$elements->perPage(), ['class' => 'selecter', 'onchange' => 'this.form.submit()', 'data-width' => '100%']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="inputer">
                                <div class="input-wrapper">
                                    {!! Form::text('q', Request::get('q'), ['class' => 'form-control', 'placeholder' => 'Buscar...']) !!}
                                </div>
                            </div>
                        </div><!--.form-group-->
                    </div>
                    <div class="col-md-3 col-md-offset-4">  
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                            <a href="{{ route($routePrefix . 'index') }}" class="btn btn-purple">Ver todos</a>
                            {{-- <a onClick="window.print()" class="btn btn-info">Imprimir</a> --}}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed clickable-rows" id="dataTable">
                    <thead>
                        <tr>
                            @yield($elements.'TableHeader')
                        </tr>
                    </thead>
                    <tbody>
                        @yield($elements.'TableBody')
                    </tbody>
                </table>
            </div>
            <div class="pull-left">
                {{ $$elements->total() }} {{ $elements }}
            </div>
            <div class="pull-right">
                {!! $$elements->render() !!}
            </div>
        </div>
    </div>
@endif