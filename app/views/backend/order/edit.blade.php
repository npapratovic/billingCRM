<!-- Main content --> 
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('OrderIndex') }}">Pregled svih narudžbi</a></li>
    <li class="active">Dodaj narudžbu</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-4">
    		<h4>Uredi narudžbu</h4>
    	</div>
    	<div class="col-md-3"></div>
    	<div class="col-md-2">
    	<a href="{{ URL::route('OrderCreatePdf', array('entry_id' => $entry->id)) }}" target="_blank">
    	<button class="btn btn-warning btn-md pull-right"><i class="fa fa-file-text-o"></i> Preuzmi PDF</button>
    	</a>
    	</div>
    	<div class="col-md-2">
    	<button class="btn btn-primary btn-md" id="btn-email-order-id-{{ $entry->id }}" data-target="#email-order-id-{{ $entry->id }}"> <i class="fa fa-envelope-o"></i> Pošalji klijentu</button>
    	</div>
    	<div class="col-md-1">
      		<a href="{{ URL::route('OrderIndex') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
	<div class="col-md-8">
		{{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}

		 {{ Form::hidden('id', $entry->id, array('id' => 'id')) }}
		 	<div class="row">
		 	<div class="col-md-12">
		 	<div class="row">
		 	<div class="col-md-6">
					 <div class="form-group">  
			                    <label for="order_id">Broj narudžbe:</label>
			                    {{ Form::text('order_id', isset($entry->order_id) ? $entry->order_id : null, ['class' => 'form-control', 'id' => 'order_id', 'placeholder' => 'Broj narudžbe']) }}
			                    <small class="text-danger">{{ $errors->first('order_id') }}</small>
			                    </div>
		 	</div>
		 	</div>
		 	<div class="row">
		 	<div class="col-md-4">
		 	<div class="form-group">  
	                <label for="user_id">Klijent:</label>  
					{{ Form::select('user_id', $clientslist, isset($entry->user_id) ? $entry->user_id : null, array('class' => 'form-control', 'style' => 'width:100%', 'id' => 'user_id', 'required')) }} 
					<small class="text-danger">{{ $errors->first('user_id') }}</small>
	            </div>
	            </div>

	            <div class="col-md-1"></div>
	            <div class="col-md-5">
	                            <div class="form-group">  
                    <label for="order_date">Datum isporuke:</label>
                    {{ Form::text('order_date', isset($entry->order_date) ? $entry->order_date : null, ['class' => 'form-control datepicker margin-bot30', 'id' => 'order_date', 'placeholder' => 'Datum']) }}
                    <small class="text-danger">{{ $errors->first('order_date') }}</small>
                    </div>
                    </div>
	            </div>
	            </div>
	            </div>
 
 			<div class="row">
			
			@foreach($orderbycustomer as $singleorder)
			<div class="col-md-12">
					<div class="item-block">
						<div class="item-form">

			 			<div class="row">
			 			    <div class="form-group">
					        	<div class="col-md-6">
				            		<div class="input-group">
			               			<span class="input-group-addon">Proizvod</span> 
			          				{{ Form::select('products_array[]', $productlist, isset($singleorder->product_id) ? $singleorder->product_id : null, array('class' => 'form-control selector', 'style' => 'width:100%', 'id' => 'id', 'required')) }}
			          				</div>
					        	</div>
					        	<div class="col-md-4">
					            	<div class="input-group">
			                   			<span class="input-group-addon">Količina</span> 
										{{ Form::text('quantity[]', isset($singleorder->quantity) ? $singleorder->quantity : null, ['class' => 'form-control', 'id' => 'quantity', 'placeholder' => 'Unesite željenu količinu']) }}
									<small class="text-danger">{{ $errors->first('quantity') }}</small>
			              			</div>

					            </div>
					                        <div class="col-md-1"></div>
					            		 <div class="col-md-1">
					            		<a class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></a>
					            		</div>
					        </div>
					    </div>
					    </div>
					    </div>
					</div>
			@endforeach
		
		    </div>
		 
         
<div class="duplicateable-content">
	<div class="item-block">
		<div class="item-form">  
			<div class="row product-between">		 
				<div class="col-md-12">
			 			<div class="row">
			 			    <div class="form-group">
					        	<div class="col-md-6">
				            		<div class="input-group">
			               			<span class="input-group-addon">Proizvod</span> 
			          				{{ Form::select('products_array[]', $productlist, isset($entry->id) ? $entry->id : null, array('class' => 'form-control selector', 'style' => 'width:100%', 'id' => 'id', 'required')) }}
			          				</div>
					        	</div>
					        	<div class="col-md-4">
					            	<div class="input-group">
			                   			<span class="input-group-addon">Količina</span> 
										{{ Form::text('quantity[]', isset($entry->quantity) ? $entry->quantity : null, ['class' => 'form-control', 'id' => 'quantity', 'placeholder' => 'Unesite željenu količinu']) }}
									<small class="text-danger">{{ $errors->first('quantity') }}</small>
			              			</div>
					            </div>
					            <div class="col-md-1"></div>
							 <div class="col-md-1">
							<a class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></a>
							</div>
					        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
  		 
      	<div class="col-md-11">
        <a class="btn btn-success btn-duplicator margin-bot30">Dodaj proizvod</a>
      	</div>
      	<div class="row">
      	<div class="col-md-3">
		        <div class="form-group">
		            <label for="shipping_way">Način dostave:</label>
		            {{ Form::select('shipping_way', array('overseas' => 'Overseas', 'cityexpress' => 'Cityexpress', 'hrvatskaposta' => 'Hrvatska pošta', 'tisakpaketi' => 'Tisak paketi', 'dpd' => 'DPD', 'dhl' => 'DHL', 'gls' => 'GLS', 'intereuropa' => 'Intereuropa'), isset($entry->shipping_way) ? $entry->shipping_way : null, array('class'=>'form-control','style'=>'' )) }}
		        </div>
	</div>
	<div class="col-md-1"></div>
      	<div class="col-md-4">
		        <div class="form-group">
		            <label for="payment_way">Naćin plaćanja: </label>
		            {{ Form::select('payment_way', array('virman' => 'Virman (bankovna transakcija)', 'preuzimanje' => 'Po preuzimanju', 'kartica' => 'Kartično plaćanje', 'paypal' => 'PayPal'), isset($entry->payment_way) ? $entry->payment_way : null, array('class'=>'form-control','style'=>'' )) }}
		        </div>
	</div>
	<div class="col-md-1"></div>
	      	<div class="col-md-3">
		        <div class="form-group">
		            <label for="payment_status">Status narudžbe: </label>
		            {{ Form::select('payment_status', array('obrada' => 'Obrada uplate', 'procesuiranje' => 'Precesuiranje', 'cekanje' => 'Na čekanju', 'zavrseno' => 'Završeno', 'otkazano' => 'Otkazano', 'refundirano' => 'Refundirano', 'neuspjesno' => 'Neuspješno'), isset($entry->payment_status) ? $entry->payment_status : null, array('class'=>'form-control','style'=>'' )) }}
		        </div>
	</div>
	</div>
	<div class="row">
	      	<div class="col-md-3">
			 <div class="form-group">  
	                    <label for="billing_address">Adresa računa:</label>
	                    {{ Form::text('billing_address', isset($entry->billing_address) ? $entry->billing_address : null, ['class' => 'form-control', 'id' => 'billing_address', 'placeholder' => 'Adresa računa']) }}
	                    <small class="text-danger">{{ $errors->first('billing_address') }}</small>
	                    </div>
	</div>
	<div class="col-md-1"></div>
	<div class="col-md-3">
			 <div class="form-group">  
	                    <label for="shipping_address">Adresa dostave:</label>
	                    {{ Form::text('shipping_address', isset($entry->shipping_address) ? $entry->shipping_address : null, ['class' => 'form-control', 'id' => 'shipping_address', 'placeholder' => 'Adresa dostave']) }}
	                    <small class="text-danger">{{ $errors->first('shipping_address') }}</small>
	                    </div>
	</div>
	</div>
	        	<div class="form-group">
                <label for="note">Napomena</label>
               	{{ Form::textarea('note', isset($entry->note) ? $entry->note : null, ['class' => 'form-control editor', 'placeholder' => 'Napomena']) }}
				<small class="text-danger">{{ $errors->first('note') }}</small>
            </div> 
            	   	<div class="col-md-1 pull-right"> 
		    {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
		</div>
	</div> 
 {{ Form::close() }}

</div> 

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

<script type="text/javascript">

$("#user_id").change(function() {
  $.ajax({
    url: '/admin/ajax/getAddress/' + $(this).val(),
    type: 'get',
    data: {},
    success: function(data) {
      if (data.success == true) {
        $("#billing_address").val(data.info);
        $("#shipping_address").val(data.info);
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

                $("#btn-email-order-id-{{ $entry->id }}").click(function() { 
                    $('#email-order-id-{{ $entry->id }}').modal('show');
                });

	                $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
            });
		$("#title").stringToSlug();
	});
</script>