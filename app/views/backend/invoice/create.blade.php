<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('InvoiceIndex') }}">Pregled svih računa</a></li>
    <li class="active">Dodaj račun</li>
</ul>
<div class="panel-heading">
    <div class="row">
        <div class="col-md-10">
            <h4>Dodaj račun</h4>
        </div>
        <div class="col-md-2">
            <a href="{{ URL::route('InvoiceIndex') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
        </div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
		{{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
	    <div class="col-md-7">
                <div class="col-md-4">
	            <div class="form-group">  
	                <label for="client_id">Klijent:</label>  
					{{ Form::select('client_id', $clientlist, isset($entry->client_id) ? $entry->client_id : null, array('class' => 'form-control', 'style' => 'width:100%', 'client_id' => 'client_id')) }}
					<small class="text-danger">{{ $errors->first('client_id') }}</small>
	            </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                <div class="form-group">  
                    <label for="invoice_number">Broj računa:</label>  
                    {{ Form::text('invoice_number', isset($newinvoicenumber) ? $newinvoicenumber : null, ['class' => 'form-control', 'id' => 'invoice_number', 'placeholder' => 'Broj računa']) }}
                    <small class="text-danger">{{ $errors->first('invoice_number') }}</small>
                </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1">
                        <div class="form-group">  
                    <label for="invoice">Tip računa:</label>  
                    {{ Form::select('invoice_type', array('R' => 'R', 'R1' => 'R1', 'R2' => 'R2', 'bez_oznake' => 'bez oznake', 'avansni' => 'Avansni'), 'R', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('invoice_type') }}</small>
                </div>  
                    </div>

                <div class="col-md-1"></div>

                    <div class="col-md-1">
                   <div class="form-group">  
                    <label for="tax">Oporezivo:</label>
                    {{ Form::select('tax', array('0' => 'Ne', '1' => 'Da'), '0', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('tax') }}</small>
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
                    <label for="product">Proizvod:</label>  
                    {{ Form::select('product[]', $productlist, isset($entry->product) ? $entry->product : null, array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'product')) }}
                    <small class="text-danger">{{ $errors->first('product') }}</small>
                        </div>
                        </div>
                <div class="col-md-2">
                        <div class="form-group">  
                    <label for="measurement">Jedinična mjera:</label>  
                    {{ Form::select('measurement[]', array('piece' => 'kom', 'hour' => 'sat', 'year' => 'god', 'km' => 'km', 'lit' => 'lit', 'kg' => 'kg', 'kWh' => 'kWh', 'm³' => 'm³', 't' => 't', 'm²' => 'm²', 'm' => 'm', 'day' => 'dan', 'night' => 'noć', 'kart' => 'kart', 'rč' => 'rč', 'par' => 'par', 'ml' => 'ml', 'pax' => 'pax', 'room' => 'soba', 'apt' => 'apt', 'term' => 'term', 'set' => 'set', 'pak' => 'pak', 'bod' => 'bod', 'usi' => 'usi'), 'piece', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('measurement') }}</small>
                </div>     
                </div> 
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    <label for="amount">Količina:</label>
                    {{ Form::text('amount[]', isset($entry->amount) ? $entry->amount : null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => '1']) }}
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    <label for="price">Cijena:</label>
                    {{ Form::text('price[]', isset($entry->price) ? $entry->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Cijena']) }}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>    
                </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1">
                   <div class="form-group">  
                    <label for="discount">Popust:</label>
                    {{ Form::text('discount[]', isset($entry->discount) ? $entry->discount : null, ['class' => 'form-control', 'id' => 'discount', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    <label for="taxpercent">Stopa:</label>
                    {{ Form::text('taxpercent[]', isset($entry->taxpercent) ? $entry->taxpercent : null, ['class' => 'form-control', 'id' => 'taxpercent', 'placeholder' => '%']) }}
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
                    <label for="product">Proizvod:</label>  
                    {{ Form::select('product[]', $productlist, isset($entry->product) ? $entry->product : null, array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'product')) }}
                    <small class="text-danger">{{ $errors->first('product') }}</small>
                        </div>
                        </div>
                <div class="col-md-2">
                        <div class="form-group">  
                    <label for="measurement">Jedinična mjera:</label>
                    {{ Form::select('measurement[]', array('piece' => 'kom', 'hour' => 'sat', 'year' => 'god', 'km' => 'km', 'lit' => 'lit', 'kg' => 'kg', 'kWh' => 'kWh', 'm³' => 'm³', 't' => 't', 'm²' => 'm²', 'm' => 'm', 'day' => 'dan', 'night' => 'noć', 'kart' => 'kart', 'rč' => 'rč', 'par' => 'par', 'ml' => 'ml', 'pax' => 'pax', 'room' => 'soba', 'apt' => 'apt', 'term' => 'term', 'set' => 'set', 'pak' => 'pak', 'bod' => 'bod', 'usi' => 'usi'), 'piece', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('measurement') }}</small>
                </div>     
                </div> 
                <div class="col-md-3">
                   <div class="form-group">  
                    <label for="amount">Količina:</label>
                    {{ Form::text('amount[]', isset($entry->amount) ? $entry->amount : null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => '1']) }}
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    <label for="price">Cijena:</label>
                    {{ Form::text('price[]', isset($entry->price) ? $entry->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Cijena']) }}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>    
                </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1">
                   <div class="form-group">  
                    <label for="discount">Popust:</label>
                    {{ Form::text('discount[]', isset($entry->discount) ? $entry->discount : null, ['class' => 'form-control', 'id' => 'discount', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    <label for="taxpercent">Porez. stopa:</label>
                    {{ Form::text('taxpercent[]', isset($entry->taxpercent) ? $entry->taxpercent : null, ['class' => 'form-control', 'id' => 'taxpercent', 'placeholder' => '%']) }}
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
                    <label for="payment_way">Način plaćanja:</label>  
                   {{ Form::select('payment_way', array('virman' => 'Virman (bankovna transakcija)', 'preuzimanje' => 'Po preuzimanju', 'kartica' => 'Kartično plaćanje', 'paypal' => 'PayPal'), isset($entry->payment_way) ? $entry->payment_way : null, array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('payment_way') }}</small>
                </div>     
                </div> 
                <div class="col-md-1"></div>
                <div class="col-md-2">
                <div class="form-group">  
                    <label for="invoice_date">Datum računa:</label>
                    {{ Form::text('invoice_date', isset($entry->invoice_date) ? $entry->invoice_date : null, ['class' => 'form-control datepicker', 'id' => 'invoice_date', 'placeholder' => 'Datum']) }}
                    <small class="text-danger">{{ $errors->first('invoice_date') }}</small>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                <div class="form-group">  
                    <label for="invoice_date_deadline">Rok plaćanja:</label>
                    {{ Form::text('invoice_date_deadline', isset($entry->invoice_date_deadline) ? $entry->invoice_date_deadline : null, ['class' => 'form-control datepicker', 'id' => 'invoice_date_deadline', 'placeholder' => 'Datum']) }}
                    <small class="text-danger">{{ $errors->first('invoice_date_deadline') }}</small>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                <div class="form-group">  
                    <label for="invoice_date_ship">Datum isporuke:</label>
                    {{ Form::text('invoice_date_ship', isset($entry->invoice_date_ship) ? $entry->invoice_date_ship : null, ['class' => 'form-control datepicker', 'id' => 'invoice_date_ship', 'placeholder' => 'Datum']) }}
                    <small class="text-danger">{{ $errors->first('invoice_date_ship') }}</small>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                <div class="form-group">  
                    <label for="invoice_note">Napomene:</label>
                    {{ Form::textarea('invoice_note', isset($entry->invoice_note) ? $entry->invoice_note : null, ['class' => 'form-control', 'id' => 'invoice_note', 'placeholder' => 'Napomene na računu']) }}
                    <small class="text-danger">{{ $errors->first('invoice_note') }}</small>
                    </div>
                    </div>
                  <a href="#options" class="btn btn-info margin-bottom30" data-toggle="collapse">Dodatne opcije</a>
                      <div id="options" class="collapse col-md-12">
                    <div class="form-group">  
                    <label for="intern_note">Interna napomena:</label>
                    {{ Form::textarea('intern_note', isset($entry->intern_note) ? $entry->intern_note : null, ['class' => 'form-control', 'id' => 'intern_note', 'placeholder' => 'Napomena vidljiva samo vama']) }}
                    <small class="text-danger">{{ $errors->first('intern_note') }}</small>
                    </div>
                    <div class="col-md-2">
                   <div class="form-group">  
                    <label for="repeat_invoice">Ponovi ovaj račun:</label>
                    {{ Form::select('repeat_invoice', array('0' => 'Ne', '1' => 'Da'), '0', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('repeat_invoice') }}</small>
                </div>  
                </div>
                <div class="clearfix"></div>
                <div class="col-md-2">
                        <div class="form-group">  
                    <label for="invoice_language">Jezik računa:</label>
                    {{ Form::select('invoice_language', array('croatian' => 'Hrvatski', 'english' => 'Engleski', 'german' => 'Njemački', 'french' => 'Francuski', 'italian' => 'Talijanski'), 'croatian', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('invoice_language') }}</small>
                </div>     
                </div>
                <div class="col-md-1"></div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    <label for="valute">Tečaj:</label>
                    {{ Form::text('valute', isset($entry->valute) ? $entry->valute : null, ['class' => 'form-control', 'id' => 'valute', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('valute') }}</small>
                </div>    
                </div>
                      </div>

	              {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
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
    	$("#title").stringToSlug();

        @if (count($entries['entries']) > 0) 
            @foreach($entries['entries'] as $entry)
                $("#btn-delete-tag-id-{{ $entry->id }}").click(function() { 
                    $('#delete-tag-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
            });
	});
</script>
