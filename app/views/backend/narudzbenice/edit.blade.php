<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ route('admin.narudzbenice.index') }}">Pregled svih narudžbenica</a></li>
    <li class="active">Uredi narudžbenicu</li>
</ul>
<div class="panel-heading">
    <div class="row">
        <div class="col-md-4">
            <h4>Uredi narudžbenicu</h4>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-2">
        <a href="{{ URL::route('NarudzbeniceCreatePdf', array('entry_id' => $narudzbenica->id)) }}" target="_blank">
        <button class="btn btn-warning btn-md pull-right"><i class="fa fa-file-text-o"></i> Preuzmi PDF</button>
        </a>
        </div>
        <div class="col-md-2">
        <button class="btn btn-primary btn-md" id="btn-email-narudzbenica-id-{{ $narudzbenica->id }}" data-target="#email-narudzbenica-id-{{ $narudzbenica->id }}"><i class="fa fa-envelope-o"></i> Pošalji klijentu</button>
        </div>
        <div class="col-md-1">
            <a href="{{ route('admin.narudzbenice.index') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
        </div>
    </div>
</div>
<div class="panel-body">
    <div class="row">
        {{ Form::model($narudzbenica, ['method' => 'PATCH','route'=>['admin.narudzbenice.update', $narudzbenica->id], 'files' => 'false', 'class' => 'form-horizontal']) }}
        <div class="col-md-7">
                <div class="col-md-3">
                <div class="form-group">  
                    {{ Form::label('narudzbenica_number', 'Broj narudžbenice:') }}
                    {{ Form::text('narudzbenica_number', isset($narudzbenica->narudzbenica_number) ? $narudzbenica->narudzbenica_number : null, ['class' => 'form-control', 'id' => 'narudzbenica_number', 'placeholder' => 'Broj narudžbenice']) }}
                    <small class="text-danger">{{ $errors->first('narudzbenica_number') }}</small>
                </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('tax', 'Oporezivo:') }}
                    {{ Form::select('tax', array('0' => 'Ne', '1' => 'Da'), isset($narudzbenica->tax) ? $narudzbenica->tax : null, array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('tax') }}</small>
                </div>  
                    </div>

                <div class="col-md-1"></div>

                    <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('hide_amount', 'Sakrij iznose:') }}
                    {{ Form::select('hide_amount', array('0' => 'Ne', '1' => 'Da'), isset($narudzbenica->hide_amount) ? $narudzbenica->hide_amount : null, array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('hide_amount') }}</small>
                </div>   
                </div>
                <div class="clearfix"></div>

                <div class="col-md-4">
                <div class="form-group">  
                    {{ Form::label('client_id', 'Naručitelj:') }}
                    {{ Form::select('client_id', $clientlist, isset($narudzbenica->client_id) ? $narudzbenica->client_id : null, array('class' => 'form-control', 'style' => 'width:100%', 'client_id' => 'client_id')) }}
                    <small class="text-danger">{{ $errors->first('client_id') }}</small>
                </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-3">
                <div class="form-group">  
                    {{ Form::label('client_address', 'Adresa:') }}
                    {{ Form::text('client_address', isset($narudzbenica->client_address) ? $narudzbenica->client_address : null, ['class' => 'form-control', 'id' => 'client_address', 'placeholder' => 'Adresa']) }}
                    <small class="text-danger">{{ $errors->first('client_address') }}</small>
                </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-3">
                <div class="form-group">  
                    {{ Form::label('client_oib', 'OIB:') }}
                    {{ Form::text('client_oib', isset($narudzbenica->client_oib) ? $narudzbenica->client_oib : null, ['class' => 'form-control', 'id' => 'client_oib', 'placeholder' => 'OIB']) }}
                    <small class="text-danger">{{ $errors->first('client_oib') }}</small>
                </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <label for="services">Proizvodi:</label>  
                         @foreach($narudzbenicacustomer as $singlenarudzbenica)
                         <div class="col-md-12">
                        <div class="item-block no-margin-top">
                          <div class="item-form">

                          <a class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></a>

                            <div class="row">
                            <div class="col-md-12">

                <div class="col-md-12">
                <div class="form-group">  
                    {{ Form::label('product', 'Proizvod:') }}
                    {{ Form::select('product[]', $productlist, isset($singlenarudzbenica->product_id) ? $singlenarudzbenica->product_id : null, array('class' => 'form-control', 'style' => 'width:100%', 'id' => 'id')) }}
                    <small class="text-danger">{{ $errors->first('product') }}</small>
                        </div>
                        </div>
                <div class="col-md-2">
                        <div class="form-group">  
                    {{ Form::label('measurement', 'Jedinična mjera:') }}
                    {{ Form::select('measurement[]', array('piece' => 'kom', 'hour' => 'sat', 'year' => 'god', 'km' => 'km', 'lit' => 'lit', 'kg' => 'kg', 'kWh' => 'kWh', 'm³' => 'm³', 't' => 't', 'm²' => 'm²', 'm' => 'm', 'day' => 'dan', 'night' => 'noć', 'kart' => 'kart', 'rč' => 'rč', 'par' => 'par', 'ml' => 'ml', 'pax' => 'pax', 'room' => 'soba', 'apt' => 'apt', 'term' => 'term', 'set' => 'set', 'pak' => 'pak', 'bod' => 'bod', 'usi' => 'usi'), isset($singlenarudzbenica->measurement) ? $singlenarudzbenica->measurement : 'piece', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('measurement') }}</small>
                </div>     
                </div> 
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('amount', 'Količina:') }}
                    {{ Form::text('amount[]', isset($singlenarudzbenica->amount) ? $singlenarudzbenica->amount : null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => '1']) }}
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('price', 'Cijena:') }}
                    {{ Form::text('price[]', isset($singlenarudzbenica->price) ? $singlenarudzbenica->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Cijena']) }}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>    
                </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('discount', 'Popust:') }}
                    {{ Form::text('discount[]', isset($singlenarudzbenica->discount) ? $singlenarudzbenica->discount : null, ['class' => 'form-control', 'id' => 'discount', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('taxpercent', 'Stopa:') }}
                    {{ Form::text('taxpercent[]', isset($singlenarudzbenica->taxpercent) ? $singlenarudzbenica->taxpercent : null, ['class' => 'form-control', 'id' => 'taxpercent', 'placeholder' => '%']) }}
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
                    {{ Form::select('product[]', $productlist, isset($narudzbenica->product) ? $narudzbenica->product : null, array('class' => 'form-control', 'style' => 'width:100%', 'id' => 'id')) }}
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
                    {{ Form::text('amount[]', isset($narudzbenica->amount) ? $narudzbenica->amount : null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => '1']) }}
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('price', 'Cijena:') }}
                    {{ Form::text('price[]', isset($narudzbenica->price) ? $narudzbenica->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Cijena']) }}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>    
                </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('discount', 'Popust:') }}
                    {{ Form::text('discount[]', isset($narudzbenica->discount) ? $narudzbenica->discount : null, ['class' => 'form-control', 'id' => 'discount', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('taxpercent', 'Stopa:') }}
                    {{ Form::text('taxpercent[]', isset($narudzbenica->taxpercent) ? $narudzbenica->taxpercent : null, ['class' => 'form-control', 'id' => 'taxpercent', 'placeholder' => '%']) }}
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
                    {{ Form::label('payment_way', 'Način plaćanja:') }}
                    {{ Form::select('payment_way', array('virman' => 'Virman (bankovna transakcija)', 'preuzimanje' => 'Po preuzimanju', 'kartica' => 'Kartično plaćanje', 'paypal' => 'PayPal'), isset($narudzbenica->payment_way) ? $narudzbenica->payment_way : null, array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('payment_way') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                <div class="form-group">  
                    {{ Form::label('narudzbenica_start', 'Početak ponude:') }}
                    {{ Form::text('narudzbenica_start', isset($narudzbenica->narudzbenica_start) ? $narudzbenica->narudzbenica_start : null, ['class' => 'form-control datepicker', 'id' => 'narudzbenica_start', 'placeholder' => 'Datum']) }}
                    <small class="text-danger">{{ $errors->first('narudzbenica_start') }}</small>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                <div class="form-group">  
                    {{ Form::label('narudzbenica_end', 'Kraj ponude:') }}
                    {{ Form::text('narudzbenica_end', isset($narudzbenica->narudzbenica_end) ? $narudzbenica->narudzbenica_end : null, ['class' => 'form-control datepicker', 'id' => 'narudzbenica_end', 'placeholder' => 'Datum']) }}
                    <small class="text-danger">{{ $errors->first('narudzbenica_end') }}</small>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                <div class="form-group">  
                    {{ Form::label('narudzbenica_note', 'Napomene:') }}
                    {{ Form::textarea('narudzbenica_note', isset($entry->narudzbenica_note) ? $entry->narudzbenica_note : null, ['class' => 'form-control', 'id' => 'narudzbenica_note', 'placeholder' => 'Napomene na računu']) }}
                    <small class="text-danger">{{ $errors->first('invoice_note') }}</small>
                    </div>
                    </div>
                  <a href="#options" class="btn btn-info margin-bottom30" data-toggle="collapse">Dodatne opcije</a>
                      <div id="options" class="collapse col-md-12">
                <div class="clearfix"></div>
                <div class="col-md-2">
                        <div class="form-group">  
                    {{ Form::label('narudzbenica_language', 'Jezik otpremnice:') }}
                    {{ Form::select('narudzbenica_language', array('croatian' => 'Hrvatski', 'english' => 'Engleski', 'german' => 'Njemački', 'french' => 'Francuski', 'italian' => 'Talijanski'), 'croatian', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('dispatch_language') }}</small>
                </div>     
                </div>
                <div class="col-md-1"></div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('valute', 'Tečaj:') }}
                    {{ Form::text('valute', isset($narudzbenica->valute) ? $narudzbenica->valute : null, ['class' => 'form-control', 'id' => 'valute', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('valute') }}</small>
                </div>    
                </div>
                      </div>
                  {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
        </div>

        {{ Form::close() }}

    </div>
</div>

    {{ Form::open(array('route' => 'NarudzbeniceSendMail', 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'method' => 'post')) }}
    {{Form::hidden('id', $narudzbenica->id, array('id' => 'id'))}}
    
    <!-- Modal {{ $narudzbenica->id }}-->
    <div class="modal fade" id="email-narudzbenica-id-{{ $narudzbenica->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Slanje narudžbenice u PDF obliku klijentu: {{ $narudzbenica->first_name }}  {{ $narudzbenica->last_name }}</h4>
                </div>
                <div class="modal-body">
                                <div class="form-group">  
                                <label for="narudzbenica_comment">Upišite komentar ispod narudžbenice:</label>
                                {{ Form::textarea('narudzbenica_comment', isset($narudzbenica->narudzbenica_comment) ? $narudzbenica->narudzbenica_comment : null, ['class' => 'form-control', 'id' => 'narudzbenica_comment']) }}
                                <small class="text-danger">{{ $errors->first('narudzbenica_comment') }}</small>
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

                $("#btn-email-narudzbenica-id-{{ $narudzbenica->id }}").click(function() { 
                    $('#email-narudzbenica-id-{{ $narudzbenica->id }}').modal('show');
                });

           $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',

            });
    });
</script>