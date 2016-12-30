 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ URL::route('admin.orders.index') }}">Pregled svih narudžbi</a></li>
    
    <a href="{{ URL::route('admin.orders.create') }}" class="pull-right" style="margin-top: -5px;">
        <button class="btn btn-success btn-addon btn-sm">
            <i class="fa fa-plus"></i> Dodaj novu narudžbu
        </button>
    </a>
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih narudžbi </h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
               
                <th>Broj narudžbe</th>
                <th>Klijent</th>
                <th>Adresa dostave</th>
                <th>Datum narudžbe</th>
                <th>Proizvodi</th>
                <th>Iznos</th>
                <th>Akcije</th>

            </tr>
        </thead>
        <tbody>
             @foreach($entries as $val => $entry)
                <tr>
                    <td> 
                        {{ $entry->order_id }}
                    </td>
                    <td> 
                        {{  $entry['client'][0]->first_name }}  {{ $entry['client'][0]->last_name }}
                    </td>
                    <td> 
                        {{ $entry->shipping_address }}
                    </td>
                    <td class="text-center"> 
                        {{ date('d.m.Y', strtotime($entry->order_date))}}
                    </td>
                    <td> 
                          @foreach($entry['orderProducts'] as $key => $product)  
                            <div class="row">
                                <div class="col-md-12">
                                  @if( $product->product_id == '0')
                                      <span style="color:lightslategray;"> {{ $product->product_name }}</span>
                                      <span style="color:maroon;"> Nepostojeći proizvod</span>
                                  @else
                                      @if($product->type == 'service')
                                        <a href="{{ URL::route('admin.services.edit', array('id' => $product->product_id)) }}">{{ $product->product_name }}</a>
                                      @else
                                        <a href="{{ URL::route('ProductEdit', array('id' => $product->product_id)) }}">{{ $product->product_name }}</a>
                                       @endif
                                  @endif
                                </div>
                            </div>  
                        @endforeach  
                    </td>
                    <td class="text-right">
                        {{ $entry->price }}kn
                    </td>
                    <td class="col-md-2"> 
                        @if($entry->show_only == '1')
                            <a href="{{ URL::route('admin.orders.show', array('id' => $entry->id)) }}">
                                <button class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button>
                            </a>
                        @else
                            <a href="{{ URL::route('admin.orders.edit', array('id' => $entry->id)) }}">
                                <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                            </a>
                        @endif 

                        <button type="button" id="btn-delete-order-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-order-id-{{ $entry->id }}">
                            <i class="fa fa-times"></i>
                        </button>
                        <a href="{{ URL::route('OrderCreatePdf', array('entry_id' => $entry->id)) }}" target="_blank">
                            <button type="button" id="btn-pdf-order-id-{{ $entry->id }}" class="btn btn-warning btn-xs">
                                <i class="fa fa-file-text-o"></i>
                            </button>
                        </a>
                        <button type="button" id="btn-email-order-id-{{ $entry->id }}" class="btn btn-primary btn-xs" data-target="#email-order-id-{{ $entry->id }}">
                            <i class="fa fa-envelope-o"></i></i>
                        </button>
                        <a href="{{ URL::route('CreateInvoice', array('entry_id' => $entry->id)) }}">
                            <button type="button" id="btn-pdf-order-id-{{ $entry->id }}" class="btn btn-default btn-xs">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                        </a>
                    </td>
                </tr>
            
            @endforeach
        </tbody>
    </table>
</div>
      
@if (count($entries) > 0) 
    @foreach($entries as $entry)
    {{ Form::open(array('route' => 'OrderSendMail', 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'method' => 'post')) }}
    {{Form::hidden('id', $entry->id, array('id' => 'id'))}}
    
    <!-- Modal {{ $entry->id }}-->
    <div class="modal fade" id="email-order-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Slanje narudžbe u PDF obliku klijentu: {{ $entry->first_name }}  {{ $entry->last_name }}</h4>
                </div>
                <div class="modal-body">
                                <div class="form-group">  
                                <label for="order_comment">Upišite komentar ispod narudžbe:</label>
                                {{ Form::textarea('order_comment', isset($entry->order_comment) ? $entry->order_comment : null, ['class' => 'form-control', 'id' => 'order_comment']) }}
                                <small class="text-danger">{{ $errors->first('order_comment') }}</small>
                                </div>
                </div>
                <div class="modal-footer">
                    {{ Form::button('Pošalji ', array('type' => 'submit', 'class' => 'btn btn-default')) }}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
    @endforeach
@endif 


@if (count($entries) > 0) 
    @foreach($entries as $entry)
    <!-- Modal {{ $entry->id }}-->
    <div class="modal fade" id="delete-order-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati narudžbu: {{$entry->order_id}} ?</p>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-7">
                        </div>
                        <div class="col-md-2">
                            {{ Form::open(['method' => 'DELETE', 'route'=>['admin.orders.destroy', $entry->id]]) }}
                            {{ Form::submit('Uredu', ['class' => 'btn btn-default', 'data-ok' => 'modal']) }}
                            {{ Form::close() }} 
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif 

<div class="text-center">{{$entries->links()}}</div>

    <script type="text/javascript">
    $(document).ready(function() {
        @if (count($entries) > 0) 
            @foreach($entries as $entry)
                $("#btn-delete-order-id-{{ $entry->id }}").click(function() { 
                    $('#delete-order-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

        @if (count($entries) > 0) 
            @foreach($entries as $entry)
                $("#btn-email-order-id-{{ $entry->id }}").click(function() { 
                    $('#email-order-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

    });
    </script>