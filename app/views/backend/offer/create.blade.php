<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('admin.offers.index') }}">Pregled svih ponuda</a></li>
    <li class="active">Dodaj ponudu</li>
</ul>
<div class="panel-heading">
    <div class="row">
        <div class="col-md-10">
            <h4>Dodaj ponudu</h4>
        </div>
        <div class="col-md-2">
            <a href="{{ URL::route('admin.offers.index') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
        </div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
		{{ Form::open(['url' => 'admin/offers', 'files' => 'true']) }}
        <div class="col-md-7">
                <div class="col-md-3">
                <div class="form-group">  
                    {{ Form::label('offer_number', 'Broj ponude:') }}  
                    {{ Form::text('offer_number', null, ['class' => 'form-control', 'id' => 'offer_number', 'placeholder' => 'Broj ponude']) }}
                    <small class="text-danger">{{ $errors->first('offer_number') }}</small>
                </div>
                </div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('tax', 'Oporezivo:') }}
                    {{ Form::select('tax', array('0' => 'Ne', '1' => 'Da'), '0', array('class'=>'form-control' )) }}
                    <small class="text-danger">{{ $errors->first('tax') }}</small>
                </div>  
                    </div>
                    <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('hide_amount', 'Sakrij iznose:') }} 
                    {{ Form::select('hide_amount', array('0' => 'Ne', '1' => 'Da'), '0', array('class'=>'form-control')) }}
                    <small class="text-danger">{{ $errors->first('hide_amount') }}</small>
                </div>  
                </div>
                <div class="clearfix"></div>

                <div class="col-md-4">
                <div class="form-group">  
                    {{ Form::label('client_id', 'Naručitelj:') }}  
                    {{ Form::select('client_id', $clientlist, null, array('class' => 'form-control', 'style' => 'width:100;', 'id' => 'client_id')) }}
                    <small class="text-danger">{{ $errors->first('client_id') }}</small>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">  
                    {{ Form::label('client_address', 'Adresa:') }}  
                    {{ Form::text('client_address', null, ['class' => 'form-control', 'id' => 'client_address', 'placeholder' => 'Adresa']) }}
                    <small class="text-danger">{{ $errors->first('client_address') }}</small>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">  
                    {{ Form::label('client_oib', 'OIB:') }}  
                    {{ Form::text('client_oib', null, ['class' => 'form-control', 'id' => 'client_oib', 'placeholder' => 'OIB']) }}
                    <small class="text-danger">{{ $errors->first('client_oib') }}</small>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <label for="education">Proizvodi:</label>  
                        <div class="item-block no-margin-top">
                          <div class="item-form">

                            <div class="row">
                            <div class="col-md-12">

                <div class="col-md-12">
                <div class="form-group">  
                    {{ Form::label('product', 'Proizvod:') }}    
                    {{ Form::select('product[]', $productlist, null, array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'id')) }}
                    <small class="text-danger">{{ $errors->first('product') }}</small>
                        </div>
                        </div>
                <div class="col-md-2">
                        <div class="form-group">  
                    {{ Form::label('measurement', 'Jedinična mjera:') }}  
                    {{ Form::select('measurement[]', array('piece' => 'kom', 'hour' => 'sat', 'year' => 'god', 'km' => 'km', 'lit' => 'lit', 'kg' => 'kg', 'kWh' => 'kWh', 'm³' => 'm³', 't' => 't', 'm²' => 'm²', 'm' => 'm', 'day' => 'dan', 'night' => 'noć', 'kart' => 'kart', 'rč' => 'rč', 'par' => 'par', 'ml' => 'ml', 'pax' => 'pax', 'room' => 'soba', 'apt' => 'apt', 'term' => 'term', 'set' => 'set', 'pak' => 'pak', 'bod' => 'bod', 'usi' => 'usi'), 'piece', array('class'=>'form-control')) }}
                    <small class="text-danger">{{ $errors->first('measurement') }}</small>
                </div>     
                </div> 
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('amount', 'Količina:') }} 
                    {{ Form::text('amount[]', null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => '1']) }}
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('price', 'Cijena:') }} 
                    {{ Form::text('price[]', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Cijena']) }}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>    
                </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('discount', 'Popust:') }} 
                    {{ Form::text('discount[]', null, ['class' => 'form-control', 'id' => 'discount', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('taxpercent', 'Stopa:') }}
                    {{ Form::text('taxpercent[]', null, ['class' => 'form-control', 'id' => 'taxpercent', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('taxpercent') }}</small>
                </div>    
                </div>
                            </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 duplicateable-content">
                            <div class="item-block">
                                <div class="item-form">

                                    <a class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></a>

                                    <div class="row">

                <div class="col-md-12">
<div class="form-group">  
                    {{ Form::label('product', 'Proizvod:') }} 
                    {{ Form::select('product[]', $productlist, null, array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'id')) }}
                    <small class="text-danger">{{ $errors->first('product') }}</small>
                        </div>
                        </div>
                <div class="col-md-2">
                        <div class="form-group">  
                    {{ Form::label('measurement', 'Jedinična mjera:') }}  
                    {{ Form::select('measurement[]', array('piece' => 'kom', 'hour' => 'sat', 'year' => 'god', 'km' => 'km', 'lit' => 'lit', 'kg' => 'kg', 'kWh' => 'kWh', 'm³' => 'm³', 't' => 't', 'm²' => 'm²', 'm' => 'm', 'day' => 'dan', 'night' => 'noć', 'kart' => 'kart', 'rč' => 'rč', 'par' => 'par', 'ml' => 'ml', 'pax' => 'pax', 'room' => 'soba', 'apt' => 'apt', 'term' => 'term', 'set' => 'set', 'pak' => 'pak', 'bod' => 'bod', 'usi' => 'usi'), 'piece', array('class'=>'form-control')) }}
                    <small class="text-danger">{{ $errors->first('measurement') }}</small>
                </div>     
                </div> 
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('amount', 'Količina:') }} 
                    {{ Form::text('amount[]', null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => '1']) }}
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('price', 'Cijena:') }} 
                    {{ Form::text('price[]', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Cijena']) }}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>    
                </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('discount', 'Popust:') }} 
                    {{ Form::text('discount[]', null, ['class' => 'form-control', 'id' => 'discount', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('taxpercent', 'Stopa:') }} 
                    {{ Form::text('taxpercent[]', null, ['class' => 'form-control', 'id' => 'taxpercent', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('taxpercent') }}</small>
                </div>    
                </div>
                                      </div>
                                  </div>
                              </div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <br>
                            <a class="btn btn-info btn-duplicator margin-bot30">Dodaj proizvod</a>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">
                        <div class="form-group">  
                    {{ Form::label('payment_way', 'Način plaćanja:') }}   
                    {{ Form::select('payment_way', array('virman' => 'Virman (bankovna transakcija)', 'preuzimanje' => 'Po preuzimanju', 'kartica' => 'Kartično plaćanje', 'paypal' => 'PayPal'), null, array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('payment_way') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                <div class="form-group">  
                    {{ Form::label('offer_start', 'Početak ponude:') }} 
                    {{ Form::text('offer_start', null, ['class' => 'form-control datepicker', 'id' => 'offer_start', 'placeholder' => 'Datum']) }}
                    <small class="text-danger">{{ $errors->first('offer_start') }}</small>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                <div class="form-group">  
                    {{ Form::label('offer_end', 'Kraj ponude:') }} 
                    {{ Form::text('offer_end', null, ['class' => 'form-control datepicker', 'id' => 'offer_end', 'placeholder' => 'Datum']) }}
                    <small class="text-danger">{{ $errors->first('offer_end') }}</small>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                <div class="form-group">  
                    {{ Form::label('invoice_note', 'Napomene:') }} 
                    {{ Form::textarea('offer_note', null, ['class' => 'form-control', 'id' => 'offer_note', 'placeholder' => 'Napomene na računu']) }}
                    <small class="text-danger">{{ $errors->first('offer_note') }}</small>
                    </div>
                    </div>
                  <a href="#options" class="btn btn-info margin-bottom30" data-toggle="collapse">Dodatne opcije</a>
                      <div id="options" class="collapse col-md-12">
                <div class="clearfix"></div>
                <div class="col-md-2">
                        <div class="form-group">  
                    {{ Form::label('offer_language', 'Jezik otpremnice:') }} 
                    {{ Form::select('offer_language', array('croatian' => 'Hrvatski', 'english' => 'Engleski', 'german' => 'Njemački', 'french' => 'Francuski', 'italian' => 'Talijanski'), 'croatian', array('class'=>'form-control' )) }}
                    <small class="text-danger">{{ $errors->first('offer_language') }}</small>
                </div>     
                </div>
                <div class="col-md-1"></div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('valute', 'Tečaj:') }}
                    {{ Form::text('valute', null, ['class' => 'form-control', 'id' => 'valute', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('valute') }}</small>
                </div>    
                </div>
                      </div>
                <div class="row">
                    <div class="col-md-12">
                    {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
                    </div>
                </div> 
	    </div>

	    {{ Form::close() }}
 
    </div>
</div>

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
	    $('.editor').summernote({
	    	height: 200
	    });

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',

            });
	});
</script>
