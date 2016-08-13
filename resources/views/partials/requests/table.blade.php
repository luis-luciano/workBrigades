<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed clickable-rows">
        <thead id="headTable">
            <tr>
               <th class="col-md-1">Folio</th>
               <th class="col-md-1">Fecha</th>
               <th class="col-md-1">Estado</th>
               <th class="col-md-2">Problema</th>
               <th class="col-md-1">Prioridad</th>
               <th class="col-md-2">Ciudadano</th>
               <th class="col-md-4">Domicilio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td>
                        <input type="hidden" id="_url" value="{{ action('RequestsController@edit',$request->id)}}">
                        {{ $request->id }}
                    </td>
                    <td>
                        {{ \Carbon\carbon::parse($request->created_at)->toDateString() }}
                    </td>
                    <td>
                        <div class="status" data-color-status="{{ $request->state->color }}">
                            {{ $request->state->label }}
                        </div>
                    </td> 
                    <td>
                        {{ $request->problem->name }}
                    </td>    
                    <td>
                        <div class="status" data-color-status="{{ $request->priority->color }}">
                            {{ $request->priority->name }}
                        </div>
                    </td>              
                    <td>
                        {{ $request->concerned->full_name }}
                        {{  (!empty($request->concerned->personalInformation->represent)) ? "Representa a: " . $request->concerned->personalInformation->represent : "" }}          
                    </td>  
                    <td>
                        {{ $request->colony->settlementType->name }}: {{ $request->colony->name }} <br>
                        Calle: {{ $request->street }} 
                        {{  (!empty($request->number)) ? "Número: " . $request->number : "" }}
                        {{  (!empty($request->reference)) ? "Referencia: " . $request->reference : "" }}
                    </td>  
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-left">
        {{ $requests->total() }} {{ plural('requests') }}
    </div>
    <div class="pull-right">
        {!! $requests->render() !!}
    </div>
</div> {{-- table responsive --}}