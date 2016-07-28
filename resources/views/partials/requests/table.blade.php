<table id="dataTable" class="table my-table-striped table-ellipsis">
    <thead class="bg-blue-grey text-white">
        <tr>
           <th class="col-md-1">Folio</th>
           <th class="col-md-2">Estado</th>
           <th class="col-md-2">Problema</th>
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
                           {{--  <input type="hidden" id="_url" value="{{ action('RequestsController@edit',$request->id)}}"></a>  --}}
                                <td id="state">
                                    <div class="status text-white text-center" style="background: {{ $request->state->color }}; border-radius: 10px">
                                        {{ $request->state->label }}
                                    </div>
                                </td> 
                                <td>
                                    {{ $request->problem->name }}
                                </td>    
                                <td>
                                    <div class="status text-white text-center" style="background: {{ $request->priority->color }}; border-radius: 10px">
                                        {{ $request->priority->name }}
                                    </div>
                                </td>              
                                <td>
                                    {{ $request->concerned->full_name}}          
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