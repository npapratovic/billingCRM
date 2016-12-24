<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('admin.invoices.index') }}">Pregled svih računa</a></li>
    <li class="active">Dodaj račun</li>
</ul>
<div class="panel-heading">
    <div class="row">
        <div class="col-md-10">
            <h4>Dodaj račun</h4>
        </div>
        <div class="col-md-2">
            <a href="{{ URL::route('admin.invoices.index') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
        </div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
		{{ Form::open(['url' => 'admin/invoices', 'files' => 'true']) }}
	    <div class="col-md-7">
                <div class="col-md-4">
	               <div class="form-group">  
                    {{ Form::label('client_id', 'Klijent:') }}
                    {{ Form::select('client_id', $clientlist, null, array('class'=>'form-control', 'style' => 'width:100%', 'id' => 'client_id')) }}  
					<small class="text-danger">{{ $errors->first('client_id') }}</small>
	               </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">  
                    {{ Form::label('invoice_number', 'Broj računa:') }}
                    {{ Form::text('invoice_number', null, ['class'=>'form-control']) }}  
                    <small class="text-danger">{{ $errors->first('invoice_number') }}</small>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">  
                    {{ Form::label('invoice_type', 'Tip računa:') }}
                    {{ Form::select('invoice_type', array('R' => 'R', 'R1' => 'R1', 'R2' => 'R2', 'bez_oznake' => 'bez oznake', 'avansni' => 'Avansni'), 'R', array('class'=>'form-control')) }}   
                    <small class="text-danger">{{ $errors->first('invoice_type') }}</small>
                    </div>  
                </div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('tax', 'Oporezivo:') }}
                    {{ Form::select('tax', array('0' => 'Ne', '1' => 'Da'), '0', array('class'=>'form-control')) }}
                    <small class="text-danger">{{ $errors->first('tax') }}</small>
                    </div>  
                </div>
                <div class="row">
                <div class="col-md-12">
                {{ Form::label('education', 'Proizvodi:') }}  
                <div class="item-block no-margin-top">
                <div class="item-form">
                <div class="row">
                <div class="col-md-12">
                <div class="col-md-12">
                    <div class="form-group">  
                    {{ Form::label('product', 'Proizvod:') }}
                    {{ Form::select('product[]', $productlist, null, array('class'=>'form-control multiselect', 'style' => 'width:100%')) }}  
                    <small class="text-danger">{{ $errors->first('product') }}</small>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">  
                    {{ Form::label('measurement', 'Jedinična mjera:') }}
                    {{ Form::select('measurement[]',  array('piece' => 'kom', 'hour' => 'sat', 'year' => 'god', 'km' => 'km', 'lit' => 'lit', 'kg' => 'kg', 'kWh' => 'kWh', 'm³' => 'm³', 't' => 't', 'm²' => 'm²', 'm' => 'm', 'day' => 'dan', 'night' => 'noć', 'kart' => 'kart', 'rč' => 'rč', 'par' => 'par', 'ml' => 'ml', 'pax' => 'pax', 'room' => 'soba', 'apt' => 'apt', 'term' => 'term', 'set' => 'set', 'pak' => 'pak', 'bod' => 'bod', 'usi' => 'usi'), 'piece', array('class'=>'form-control')) }}  
                    <small class="text-danger">{{ $errors->first('measurement') }}</small>
                    </div>     
                </div> 
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('amount', 'Količina:') }}
                    {{ Form::text('amount[]', null, ['class'=>'form-control', 'placeholder' => '1']) }}  
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                    </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <div class="form-group">  
                    {{ Form::label('price', 'Cijena:') }}
                    {{ Form::text('price[]', null, ['class'=>'form-control', 'placeholder' => '1']) }} 
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                    </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('discount', 'Popust:') }}
                    {{ Form::text('discount[]', null, ['class'=>'form-control', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                    </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1">
                    <div class="form-group">  
                    {{ Form::label('taxpercent', 'Stopa:') }}
                    {{ Form::text('taxpercent[]', null, ['class'=>'form-control', 'placeholder' => '%']) }}
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
                <div class="col-md-12">
                    <div class="form-group">  
                    {{ Form::label('product', 'Proizvod:') }}
                    {{ Form::select('product[]', $productlist, null, array('class'=>'form-control multiselect', 'style' => 'width:100%')) }}  
                    <small class="text-danger">{{ $errors->first('product') }}</small>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">  
                    {{ Form::label('measurement', 'Jedinična mjera:') }}
                    {{ Form::select('measurement[]',  array('piece' => 'kom', 'hour' => 'sat', 'year' => 'god', 'km' => 'km', 'lit' => 'lit', 'kg' => 'kg', 'kWh' => 'kWh', 'm³' => 'm³', 't' => 't', 'm²' => 'm²', 'm' => 'm', 'day' => 'dan', 'night' => 'noć', 'kart' => 'kart', 'rč' => 'rč', 'par' => 'par', 'ml' => 'ml', 'pax' => 'pax', 'room' => 'soba', 'apt' => 'apt', 'term' => 'term', 'set' => 'set', 'pak' => 'pak', 'bod' => 'bod', 'usi' => 'usi'), 'piece', array('class'=>'form-control')) }}  
                    <small class="text-danger">{{ $errors->first('measurement') }}</small>
                    </div>     
                </div> 
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <div class="form-group">  
                    {{ Form::label('amount', 'Količina:') }}
                    {{ Form::text('amount[]', null, ['class'=>'form-control', 'placeholder' => '1']) }}  
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                    </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <div class="form-group">  
                    {{ Form::label('price', 'Cijena:') }}
                    {{ Form::text('price[]', null, ['class'=>'form-control', 'placeholder' => '1']) }} 
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                    </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1">
                    <div class="form-group">  
                    {{ Form::label('discount', 'Popust:') }}
                    {{ Form::text('discount[]', null, ['class'=>'form-control', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                    </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1">
                    <div class="form-group">  
                    {{ Form::label('taxpercent', 'Stopa:') }}
                    {{ Form::text('taxpercent[]', null, ['class'=>'form-control', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('taxpercent') }}</small>
                    </div>    
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="col-xs-12 text-center"><br>
                <a class="btn btn-info btn-duplicator margin-bot30">Dodaj proizvod</a>
                </div>
                </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group"> 
                    {{ Form::label('payment_way', 'Način plaćanja:') }}
                    {{ Form::select('payment_way', array('virman' => 'Virman (bankovna transakcija)', 'preuzimanje' => 'Po preuzimanju', 'kartica' => 'Kartično plaćanje', 'paypal' => 'PayPal'), null, array('class'=>'form-control')) }}   
                    <small class="text-danger">{{ $errors->first('payment_way') }}</small>
                    </div>     
                </div> 
                <div class="col-md-2">
                    <div class="form-group">  
                    {{ Form::label('invoice_date', 'Datum računa:') }}
                    {{ Form::text('invoice_date', null, ['class'=>'form-control datepicker']) }}
                    <small class="text-danger">{{ $errors->first('invoice_date') }}</small>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">  
                    {{ Form::label('invoice_date_deadline', 'Rok plaćanja:') }}
                    {{ Form::text('invoice_date_deadline', null, ['class'=>'form-control datepicker']) }}
                    <small class="text-danger">{{ $errors->first('invoice_date_deadline') }}</small>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">  
                    {{ Form::label('invoice_date_ship', 'Datum isporuke:') }}
                    {{ Form::text('invoice_date_ship', null, ['class'=>'form-control datepicker']) }}
                    <small class="text-danger">{{ $errors->first('invoice_date_ship') }}</small>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="form-group">  
                    {{ Form::label('invoice_note', 'Napomene:') }}
                    {{ Form::textarea('invoice_note', null, ['class'=>'form-control']) }}
                    <small class="text-danger">{{ $errors->first('invoice_note') }}</small>
                    </div>
                </div>
                <a href="#options" class="btn btn-info margin-bottom30" style="margin-left:15px;" data-toggle="collapse">Dodatne opcije</a>
                <div id="options" class="collapse col-md-12">
                    <div class="form-group" style="margin-top:15px;">  
                    {{ Form::label('intern_note', 'Interna napomena:') }}
                    {{ Form::textarea('intern_note', null, ['class'=>'form-control']) }}
                    <small class="text-danger">{{ $errors->first('intern_note') }}</small>
                    </div>
                <div class="col-md-3">
                    <div class="form-group">  
                    {{ Form::label('repeat_invoice', 'Ponovi ovaj račun:') }}
                    {{ Form::select('repeat_invoice', array('0' => 'Ne', '1' => 'Da'), '0', array('class'=>'form-control')) }}
                    <small class="text-danger">{{ $errors->first('repeat_invoice') }}</small>
                    </div>  
                </div>
                <div class="clearfix"></div>
                <div class="col-md-2">
                    <div class="form-group">  
                    {{ Form::label('invoice_language', 'Jezik računa:') }}
                    {{ Form::select('invoice_language', array('croatian' => 'Hrvatski', 'english' => 'Engleski', 'german' => 'Njemački', 'french' => 'Francuski', 'italian' => 'Talijanski'), 'croatian', array('class'=>'form-control')) }}
                    <small class="text-danger">{{ $errors->first('invoice_language') }}</small>
                    </div>     
                </div>
                <div class="col-md-2">
                    <div class="form-group">  
                    {{ Form::label('valute', 'Jezik računa:') }}
                    {{ Form::text('valute', null, ['class' => 'form-control', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('valute') }}</small>
                    </div>    
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
                </div>
                </div> 
           {{ Form::close() }}
	    </div>

	  
 
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

      

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
            });
	});
</script>
