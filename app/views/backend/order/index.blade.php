 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ URL::route('OrderIndex') }}">Pregled svih narudžbi</a></li>
    
    <a href="{{ URL::route('OrderCreate') }}" class="pull-right" style="margin-top: -5px;">
        <button class="btn btn-success btn-addon btn-sm">
            <i class="fa fa-plus"></i> Dodaj novu narudžbu
        </button>
    </a>
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih narudžbi ({{ count($entries) }})</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
               
                <th>Broj narudžbe</th>
                <th>Klijent</th>
                <th>Adresa</th>
                <th>Datum narudžbe</th>
                <th>Proizvodi</th>
            </tr>
        </thead>
        <tbody>

             @foreach($entries as $val => $entry)
                <tr>
                    <td> 
                    {{ $entry->order_id }}
                    </td>
                    <td> 
                    <a href="{{ URL::route('ClientEdit', array('id' => $entry->user_id)) }}">
                    {{ $entry->first_name }}  {{ $entry->last_name }}
                    </a>
                    </td>
                    <td> {{ $entry->address }}</td>
                    <td> {{ date('d.m.Y', strtotime($entry->order_date))}}</td>
                    <td> 
                    @foreach($allproducts[$val] as $key => $product)

                  <div class="row"><div class="col-md-12">
                  @if($product['entry']->existing == '0')
                    <span style="color:lightslategray;"> {{ $product['entry']->title }}</span>
                    <span style="color:maroon;"> Nepostojeći proizvod</span>
                  @else
                   <a href="{{ URL::route('ProductEdit', array('id' => $product['entry']->id)) }}">{{ $product['entry']->title }}</a>
                   
                   @if($product['entry']->sale_price == 1)
                   <span style="color:crimson;"> Rasprodajna cijena</span>
                   @else
                   <span style="color:violet;"> Uobičajena cijena</span>
                   @endif
                   @endif
                   </div></div>
                    @endforeach
                    </td>
                    <td class="col-md-2">  

                        <a href="{{ URL::route('OrderEdit', array('id' => $entry->id)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                        <button type="button" id="btn-delete-blog-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-blog-id-{{ $entry->id }}"><i class="fa fa-times"></i>
                        </button>
                        <a href="{{ URL::route('OrderCreatePdf', array('entry_id' => $entry->id)) }}" target="_blank">
                        <button type="button" id="btn-pdf-order-id-{{ $entry->id }}" class="btn btn-warning btn-xs"><i class="fa fa-file-text-o"></i>
                        </button>
                        </a>
                        <button type="button" id="btn-email-order-id-{{ $entry->id }}" class="btn btn-primary btn-xs" data-target="#email-order-id-{{ $entry->id }}"><i class="fa fa-envelope-o"></i></i>
                        </button>
                        <a href="{{ URL::route('CreateInvoice', array('entry_id' => $entry->id)) }}">
                        <button type="button" id="btn-pdf-order-id-{{ $entry->id }}" class="btn btn-default btn-xs"><i class="fa fa-bars" aria-hidden="true"></i>
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
    <div class="modal fade" id="delete-blog-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati narudžbu:{{$entry->id}} ?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('OrderDestroy', array('id' => $entry->id)) }}">
                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
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
                $("#btn-delete-blog-id-{{ $entry->id }}").click(function() { 
                    $('#delete-blog-id-{{ $entry->id }}').modal('show');
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