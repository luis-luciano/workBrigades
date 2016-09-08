<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed">
        <thead id="headTable">
            <tr>
               <th class="col-md-1">Folio</th>
               <th class="col-md-1">Fecha</th>
               <th class="col-md-1">Estado</th>
               
               @if(auth()->user()->hasRole("administrator|supervisor"))
                    <th class="col-md-1">Supervision</th>
               @endif

               <th class="col-md-{{ auth()->user()->hasRole('administrator|supervisor') ? '1' : '2' }}">Problema</th>
               <th class="col-md-1">Prioridad</th>
               <th class="col-md-2">Ciudadano</th>
               <th class="col-md-4">Domicilio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr class='clickable-row' data-href='{{ route($baseRequestRoute, $request) }}'>
                    <td>
                        {{ $request->id }}
                    </td>
                    <td>
                        {{ $request->date_created_short }}
                    </td>
                    <td>
                        <div class="status" data-color-status="{{ $request->state->color }}">
                            {{ $request->state->label }}
                        </div>
                    </td>
                    @if(auth()->user()->hasRole("administrator|supervisor"))
                        <td>
                            {{ $request->supervisions->last()->name }} 
                        </td> 
                    @endif
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
                        {{ (!empty($request->street)) ? "Dirección: " . $request->street. " ": "" }}
                        {{ (!empty($request->number)) ? "Número: " . $request->number." ": "" }}
                        {{ (!empty($request->between_streets)) ? "Entre: " . $request->between_streets." ": "" }}
                        {{ (!empty($request->reference)) ? "Referencia: " . $request->reference." ": "" }}
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