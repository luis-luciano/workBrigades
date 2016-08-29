<div class="table-responsive">

            @foreach($requests as $brigade)
            <table class="table table-striped table-bordered table-hover table-condensed">
                <tbody>
                    <thead id="headTable">
                        <tr>
                            <th colspan="7">
                                <div class="text-center">
                                    <b>Sector {{ $brigade->first()->sector->number." ".$brigade->first()->brigade->name }}</b>
                                </div>
                            </th>
                        </tr>
                     
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
                
                @foreach($brigade as $request)
                    <tr class='clickable-row' data-href='{{ route($baseRequestRoute, $request) }}'>
                        <td>
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
            <br>
            @endforeach
    
    </div>
</div> {{-- table responsive --}}