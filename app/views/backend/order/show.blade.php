<!-- Main content --> 
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('admin.orders.index') }}">Pregled svih narudžbi</a></li>
    <li class="active">Dodaj narudžbu</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-4">
    		<h4>Pregled narudžbu</h4>
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
      		<a href="{{ URL::route('admin.orders.index') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
	<div class="col-md-8">
		 	<div class="row">
		 	<div class="col-md-12">
		 	<div class="row">
		 	<div class="col-md-6">
					 <div class="form-group">  
			                    <label for="order_id">Broj narudžbe:</label>
			                    {{ Form::label('order_id', $entry->order_id, ['class' => '']) }}
			                    <small class="text-danger">{{ $errors->first('order_id') }}</small>
			                    </div>
		 	</div>
		 	</div>
		 	<div class="row">
		 	<div class="col-md-4">
		 	<div class="form-group">  
	                <label for="user">Klijent:</label>  
					{{ Form::label('user', $entry['client'][0]->first_name . ' ' . $entry['client'][0]->last_name, ['class' => '']) }}
	            </div>
	            </div>

	            <div class="col-md-1"></div>
	            <div class="col-md-5">
	                            <div class="form-group">  
                    <label for="order_date">Datum isporuke:</label>
                    {{ Form::label('order_date', isset($entry->order_date) ? $entry->order_date : null, ['class' => '', 'id' => 'order_date', 'placeholder' => 'Datum isporuke']) }}
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
			 			    <div class="form-group  imported-items">
					        	<div class="col-md-6">
						          <div class="form-group">  
					                    <label for="order_date">Proizvod:</label>
					                    {{ Form::label('productname', $singleorder['importedorderproducts'][0]->name, ['class' => '']) }}
					                    </div>
					        	</div>
					        	<div class="col-md-4">
						         <div class="form-group">  
					                    <label for="order_date">Količina:</label>
					                    {{ Form::label('quantity', $singleorder['importedorderproducts'][0]->quantity, ['class' => '']) }}
					                    </div>

					            </div>
					        </div>
					    </div>
					    </div>
					    </div>
					</div>
			@endforeach
		
		    </div>
		 
         
      	<div class="row">
      	<div class="col-md-3">
		        <div class="form-group">
		            <label for="shipping_way">Način dostave:</label>
		            {{ Form::label('shipping_way', $entry->shipping_way, ['class' => '']) }}
		        </div>
	</div>
	<div class="col-md-1"></div>
      	<div class="col-md-4">
		        <div class="form-group">
		            <label for="payment_way">Naćin plaćanja: </label>
		            {{ Form::label('payment_way', $entry->payment_way, ['class' => '']) }}
		        </div>
	</div>
	<div class="col-md-1"></div>
	      	<div class="col-md-3">
		        <div class="form-group">
		            <label for="payment_status">Status narudžbe: </label>
		            {{ Form::label('payment_status', $entry->payment_status, ['class' => '']) }}
		        </div>
	</div>
	</div>
	<div class="row">
	      	<div class="col-md-3">
			 <div class="form-group">  
	                    <label for="billing_address">Adresa računa:</label>
	                    {{ Form::label('billing_address', $entry->billing_address, ['class' => '']) }}
	                    <small class="text-danger">{{ $errors->first('billing_address') }}</small>
	                    </div>
	</div>
	<div class="col-md-1"></div>
	<div class="col-md-3">
			 <div class="form-group">  
	                    <label for="shipping_address">Adresa dostave:</label>
	                    {{ Form::label('shipping_address', $entry->shipping_address, ['class' => '']) }}
	                    <small class="text-danger">{{ $errors->first('shipping_address') }}</small>
	                    </div>
	</div>
	</div>
	        	<div class="form-group">
                <label for="note">Napomena</label>
               	{{ Form::label('note', $entry->note, ['class' => 'form-control editor']) }}
				<small class="text-danger">{{ $errors->first('note') }}</small>
            </div> 
	</div> 

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