<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('DispatchIndex') }}">Pregled svih otpremnica</a></li>
    <li class="active">Uredi otpremnicu</li>
</ul>
<div class="panel-heading">
    <div class="row">
        <div class="col-md-4">
            <h4>Uredi otpremnicu</h4>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-2">
        <a href="{{ URL::route('DispatchCreatePdf', array('entry_id' => $dispatch->id)) }}" target="_blank">
        <button class="btn btn-warning btn-md pull-right" ><i class="fa fa-file-text-o"></i> Preuzmi PDF</button>
        </a>
        </div>
        <div class="col-md-2">
        <button class="btn btn-primary btn-md" id="btn-email-dispatch-id-{{ $dispatch->id }}" data-target="#email-dispatch-id-{{ $dispatch->id }}"><i class="fa fa-envelope-o"></i> Pošalji klijentu</button>
        </div>
        <div class="col-md-1">
            <a href="{{ URL::route('DispatchIndex') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
        </div>
    </div>
</div>
<div class="panel-body">
    <div class="row">
        {{ Form::model($dispatch, ['method' => 'PATCH','route'=>['admin.dispatch.update', $dispatch->id], 'files' => 'false', 'class' => 'form-horizontal']) }}
        <div class="col-md-7">
                <div class="col-md-3">
                <div class="form-group">  
                    {{ Form::label('dispatch_number', 'Broj otpremnice:') }}
                    {{ Form::text('dispatch_number', isset($dispatch->dispatch_number) ? $dispatch->dispatch_number : null, ['class' => 'form-control', 'id' => 'dispatch_number', 'placeholder' => 'Broj otpremnice']) }}
                    <small class="text-danger">{{ $errors->first('dispatch_number') }}</small>
                </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('taxable', 'Oporezivo:') }}
                    {{ Form::select('taxable', array('0' => 'Ne', '1' => 'Da'), isset($dispatch->taxable) ? $dispatch->taxable : null, array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('taxable') }}</small>
                </div>  
                    </div>

                <div class="col-md-1"></div>

                    <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('hide_amount', 'Sakrij iznose:') }}
                    {{ Form::select('hide_amount', array('0' => 'Ne', '1' => 'Da'), isset($dispatch->hide_amount) ? $dispatch->hide_amount : null, array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('hide_amount') }}</small>
                </div>   
                </div>
                <div class="clearfix"></div>

                <div class="col-md-4">
                <div class="form-group">  
                    {{ Form::label('client_id', 'Naručitelj:') }}
                    {{ Form::select('client_id', $clientlist, isset($dispatch->client_id) ? $dispatch->client_id : null, array('class' => 'form-control', 'style' => 'width:100%', 'id' => 'client_id')) }}
                    <small class="text-danger">{{ $errors->first('client_id') }}</small>
                </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-3">
                <div class="form-group">  
                    {{ Form::label('client_address', 'Adresa:') }} 
                    {{ Form::text('client_address', isset($dispatch->client_address) ? $dispatch->client_address : null, ['class' => 'form-control', 'id' => 'client_address', 'placeholder' => 'Adresa']) }}
                    <small class="text-danger">{{ $errors->first('client_address') }}</small>
                </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-3">
                <div class="form-group">  
                    {{ Form::label('client_oib', 'OIB:') }}
                    {{ Form::text('client_oib', isset($dispatch->client_oib) ? $dispatch->client_oib : null, ['class' => 'form-control', 'id' => 'client_oib', 'placeholder' => 'OIB']) }}
                    <small class="text-danger">{{ $errors->first('client_oib') }}</small>
                </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <label for="products">Proizvodi:</label>
                        @foreach($dispatchproducts as $singleproduct)  
                        <div class="col-md-12">
                        <div class="item-block no-margin-top">
                          <div class="item-form">

                          <a class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></a>

                            <div class="row">
                            <div class="col-md-12">

                <div class="col-md-12">
                <div class="form-group">  
                    {{ Form::label('product', 'Proizvod:') }} 
                    {{ Form::select('product[]', $productlist, isset($singleproduct->product_id) ? $singleproduct->product_id : null, array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'id')) }}
                    <small class="text-danger">{{ $errors->first('product') }}</small>
                        </div>
                        </div>
                <div class="col-md-2">
                        <div class="form-group">  
                    {{ Form::label('measurement', 'Jedinična mjera:') }}
                    {{ Form::select('measurement[]',  array('piece' => 'kom', 'hour' => 'sat', 'year' => 'god', 'km' => 'km', 'lit' => 'lit', 'kg' => 'kg', 'kWh' => 'kWh', 'm³' => 'm³', 't' => 't', 'm²' => 'm²', 'm' => 'm', 'day' => 'dan', 'night' => 'noć', 'kart' => 'kart', 'rč' => 'rč', 'par' => 'par', 'ml' => 'ml', 'pax' => 'pax', 'room' => 'soba', 'apt' => 'apt', 'term' => 'term', 'set' => 'set', 'pak' => 'pak', 'bod' => 'bod', 'usi' => 'usi'),isset($singleproduct->measurement) ? $singleproduct->measurement : 'piece', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('measurement') }}</small>
                </div>     
                </div> 
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('amount', 'Količina:') }}
                    {{ Form::text('amount[]', isset($singleproduct->amount) ? $singleproduct->amount : null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => '1']) }}
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('price', 'Cijena:') }}
                    {{ Form::text('price[]', isset($singleproduct->price) ? $singleproduct->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Cijena']) }}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>    
                </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('discount', 'Popust:') }}
                    {{ Form::text('discount[]', isset($singleproduct->discount) ? $singleproduct->discount : null, ['class' => 'form-control', 'id' => 'discount', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('taxpercent', 'Stopa:') }}
                    {{ Form::text('taxpercent[]', isset($singleproduct->taxpercent) ? $singleproduct->taxpercent : null, ['class' => 'form-control', 'id' => 'taxpercent', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('taxpercent') }}</small>
                </div>    
                </div>
                            </div>
                            </div>
                          </div>
                        </div>
                        </div>
              @endforeach
                        <div class="col-xs-12 col-sm-12 duplicateable-content">
                            <div class="item-block">
                                <div class="item-form">

                                    <a class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></a>

                                    <div class="row">

                <div class="col-md-12">
<div class="form-group">  
                    {{ Form::label('product', 'Proizvod:') }}
                    {{ Form::select('product[]', $productlist, isset($dispatch->product) ? $dispatch->product : null, array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'id')) }}
                    <small class="text-danger">{{ $errors->first('product') }}</small>
                        </div>
                        </div>
                <div class="col-md-2">
                        <div class="form-group">  
                    {{ Form::label('measurement', 'Jedinična mjera:') }}
                    {{ Form::select('measurement[]', array('piece' => 'kom', 'hour' => 'sat', 'year' => 'god', 'km' => 'km', 'lit' => 'lit', 'kg' => 'kg', 'kWh' => 'kWh', 'm³' => 'm³', 't' => 't', 'm²' => 'm²', 'm' => 'm', 'day' => 'dan', 'night' => 'noć', 'kart' => 'kart', 'rč' => 'rč', 'par' => 'par', 'ml' => 'ml', 'pax' => 'pax', 'room' => 'soba', 'apt' => 'apt', 'term' => 'term', 'set' => 'set', 'pak' => 'pak', 'bod' => 'bod', 'usi' => 'usi'), 'piece', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('measurement') }}</small>
                </div>     
                </div> 
                <div class="col-md-3">
                   <div class="form-group">  
                    {{ Form::label('amount', 'Količina:') }}
                    {{ Form::text('amount[]', isset($dispatch->amount) ? $dispatch->amount : null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => '1']) }}
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('price', 'Cijena:') }}
                    {{ Form::text('price[]', isset($dispatch->price) ? $dispatch->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Cijena']) }}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>    
                </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('discount', 'Popust:') }}
                    {{ Form::text('discount[]', isset($dispatch->discount) ? $dispatch->discount : null, ['class' => 'form-control', 'id' => 'discount', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('taxpercent', 'Stopa:') }}
                    {{ Form::text('taxpercent[]', isset($dispatch->taxpercent) ? $dispatch->taxpercent : null, ['class' => 'form-control', 'id' => 'taxpercent', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('taxpercent') }}</small>
                </div>    
                </div>
                                      </div>
                                  </div>
                              </div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <br>
                            <a class="btn btn-info btn-duplicator margin-bot30">Dodaj usluge</a>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">  
                    {{ Form::label('stock_label', 'Oznaka skladišta:') }}
                    {{ Form::text('stock_label', isset($dispatch->stock_label) ? $dispatch->stock_label : null, ['class' => 'form-control', 'id' => 'stock_label', 'placeholder' => 'Oznaka skladišta']) }}
                    <small class="text-danger">{{ $errors->first('stock_label') }}</small>
                </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                <div class="form-group">  
                    {{ Form::label('dispatch_employee', 'Djelatnik:') }}
                    {{ Form::text('dispatch_employee', isset($dispatch->dispatch_employee) ? $dispatch->dispatch_employee : null, ['class' => 'form-control', 'id' => 'dispatch_employee', 'placeholder' => 'Djelatnik']) }}
                    <small class="text-danger">{{ $errors->first('dispatch_employee') }}</small>
                </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                <div class="form-group">  
                    {{ Form::label('dispatch_date_ship', 'Datum isporuke:') }}
                    {{ Form::text('dispatch_date_ship', isset($dispatch->dispatch_date_ship) ? $dispatch->dispatch_date_ship : null, ['class' => 'form-control datepicker', 'id' => 'dispatch_date_ship', 'placeholder' => 'Datum']) }}
                    <small class="text-danger">{{ $errors->first('dispatch_date_ship') }}</small>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                <div class="form-group">  
                    {{ Form::label('dispatch_note', 'Napomene:') }}
                    {{ Form::textarea('dispatch_note', isset($dispatch->dispatch_note) ? $dispatch->dispatch_note : null, ['class' => 'form-control', 'id' => 'dispatch_note', 'placeholder' => 'Napomene na računu']) }}
                    <small class="text-danger">{{ $errors->first('dispatch_note') }}</small>
                    </div>
                    </div>
                  <a href="#options" class="btn btn-info margin-bottom30" data-toggle="collapse">Dodatne opcije</a>
                      <div id="options" class="collapse col-md-12">
                <div class="clearfix"></div>
                <div class="col-md-2">
                        <div class="form-group">  
                    {{ Form::label('dispatch_language', 'Jezik otpremnice:') }}
                    {{ Form::select('dispatch_language', array('croatian' => 'Hrvatski', 'english' => 'Engleski', 'german' => 'Njemački', 'french' => 'Francuski', 'italian' => 'Talijanski'), isset($dispatch->dispatch_language) ? $dispatch->dispatch_language : null, array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('dispatch_language') }}</small>
                </div>     
                </div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('valute', 'Tečaj:') }}
                    {{ Form::text('valute', isset($dispatch->valute) ? $dispatch->valute : null, ['class' => 'form-control', 'id' => 'valute', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('valute') }}</small>
                </div>    
                </div>
                      </div>
                  {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
        </div>

        {{ Form::close() }}

    </div>
</div>

    {{ Form::open(array('route' => 'DispatchSendMail', 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'method' => 'post')) }}
    {{Form::hidden('id', $dispatch->id, array('id' => 'id'))}}
    
    <!-- Modal {{ $dispatch->id }}-->
    <div class="modal fade" id="email-dispatch-id-{{ $dispatch->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Slanje otpremnice u PDF obliku klijentu: {{ $dispatch->first_name }}  {{ $dispatch->last_name }}</h4>
                </div>
                <div class="modal-body">
                                <div class="form-group">  
                                <label for="dispatch_comment">Upišite komentar ispod otpremnice:</label>
                                {{ Form::textarea('dispatch_comment', isset($dispatch->dispatch_comment) ? $dispatch->dispatch_comment : null, ['class' => 'form-control', 'id' => 'dispatch_comment']) }}
                                <small class="text-danger">{{ $errors->first('dispatch_comment') }}</small>
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
 
<script type="text/javascript">

$("#client_id").change(function() {
  $.ajax({
    url: '/admin/ajax/getAddress/' + $(this).val(),
    type: 'get',
    data: {},
    success: function(data) {
      if (data.success == true) {
        $("#client_address").val(data.info);
      } else {
        alert('Cannot find info');
      }

    },
    error: function(jqXHR, textStatus, errorThrown) {}
  });
});

</script>
 
<script type="text/javascript">
    $(document).ready(function() {
        $(":file").filestyle();

        $("#title").stringToSlug();

                $("#btn-email-dispatch-id-{{ $dispatch->id }}").click(function() { 
                    $('#email-dispatch-id-{{ $dispatch->id }}').modal('show');
                });

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
            });
    });
</script>