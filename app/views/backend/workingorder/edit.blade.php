<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ route('admin.workingorder.index') }}">Pregled svih radnih naloga</a></li>
    <li class="active">Uredi radni nalog</li>
</ul>
<div class="panel-heading">
    <div class="row">
        <div class="col-md-4">
            <h4>Uredi radni nalog</h4>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-2">
        <a href="{{ URL::route('WorkingOrderCreatePdf', array('workingorder_id' => $workingorder->id)) }}" target="_blank">
        <button class="btn btn-warning btn-md pull-right"><i class="fa fa-file-text-o"></i> Preuzmi PDF</button>
        </a>
        </div>
        <div class="col-md-2">
        <button class="btn btn-primary btn-md" id="btn-email-workingorder-id-{{ $workingorder->id }}" data-target="#email-workingorder-id-{{ $workingorder->id }}"><i class="fa fa-envelope-o"></i> Pošalji klijentu</button>
        </div>
        <div class="col-md-1">
            <a href="{{ route('admin.workingorder.index') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
        </div>
    </div>
</div>
<div class="panel-body">
    <div class="row">
        {{ Form::model($workingorder, ['method' => 'PATCH','route'=>['admin.workingorder.update', $workingorder->id], 'files' => 'false', 'class' => 'form-horizontal']) }}
        <div class="col-md-7">
                <div class="col-md-3">
                <div class="form-group">  
                    {{ Form::label('workingorder_number', 'Broj radnog naloga:') }}
                    {{ Form::text('workingorder_number', isset($workingorder->workingorder_number) ? $workingorder->workingorder_number : null, ['class' => 'form-control', 'id' => 'workingorder_number', 'placeholder' => 'Broj radnog naloga']) }}
                    <small class="text-danger">{{ $errors->first('workingorder_number') }}</small>
                </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('taxable', 'Oporezivo:') }}
                    {{ Form::select('taxable', array('0' => 'Ne', '1' => 'Da'), isset($workingorder->taxable) ? $workingorder->taxable : null, array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('taxable') }}</small>
                </div>  
                    </div>

                <div class="col-md-1"></div>

                    <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('hide_amount', 'Sakrij iznose:') }}
                    {{ Form::select('hide_amount', array('0' => 'Ne', '1' => 'Da'), isset($workingorder->hide_amount) ? $workingorder->hide_amount : null, array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('hide_amount') }}</small>
                </div>   
                </div>
                <div class="clearfix"></div>

                <div class="col-md-4">
                <div class="form-group">  
                    {{ Form::label('client_id', 'Naručitelj:') }} 
                    {{ Form::select('client_id', $clientlist, isset($workingorder->client_id) ? $workingorder->client_id : null, array('class' => 'form-control', 'style' => 'width:100%', 'id' => 'client_id')) }}
                    <small class="text-danger">{{ $errors->first('client_id') }}</small>
                </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-3">
                <div class="form-group">  
                    {{ Form::label('client_address', 'Adresa:') }}
                    {{ Form::text('client_address', isset($workingorder->client_address) ? $workingorder->client_address : null, ['class' => 'form-control', 'id' => 'client_address', 'placeholder' => 'Adresa']) }}
                    <small class="text-danger">{{ $errors->first('client_address') }}</small>
                </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-3">
                <div class="form-group">  
                    {{ Form::label('client_oib', 'OIB:') }} 
                    {{ Form::text('client_oib', isset($workingorder->client_oib) ? $workingorder->client_oib : null, ['class' => 'form-control', 'id' => 'client_oib', 'placeholder' => 'OIB']) }}
                    <small class="text-danger">{{ $errors->first('client_oib') }}</small>
                </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <label for="services">Usluge:</label>
                        @foreach($workingorderservices as $singleservice)    
                        <div class="col-md-12">
                        <div class="item-block no-margin-top">
                          <div class="item-form">

                          <a class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></a>

                            <div class="row">
                            <div class="col-md-12">

                <div class="col-md-12">
                <div class="form-group">  
                    {{ Form::label('service', 'Usluga:') }}
                    {{ Form::select('service[]', $servicelist, isset($singleservice->service_id) ? $singleservice->service_id : null,  array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'id')) }}
                    <small class="text-danger">{{ $errors->first('service') }}</small>
                        </div>
                        </div>
                <div class="col-md-2">
                        <div class="form-group">  
                    {{ Form::label('measurement', 'Jedinična mjera:') }}
                    {{ Form::select('measurement[]', array('piece' => 'kom', 'hour' => 'sat', 'year' => 'god', 'km' => 'km', 'lit' => 'lit', 'kg' => 'kg', 'kWh' => 'kWh', 'm³' => 'm³', 't' => 't', 'm²' => 'm²', 'm' => 'm', 'day' => 'dan', 'night' => 'noć', 'kart' => 'kart', 'rč' => 'rč', 'par' => 'par', 'ml' => 'ml', 'pax' => 'pax', 'room' => 'soba', 'apt' => 'apt', 'term' => 'term', 'set' => 'set', 'pak' => 'pak', 'bod' => 'bod', 'usi' => 'usi'), isset($singleservice->measurement) ? $singleservice->measurement : 'piece', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('measurement') }}</small>
                </div>     
                </div> 
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('amount', 'Količina:') }}
                    {{ Form::text('amount[]', isset($singleservice->amount) ? $singleservice->amount : null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => '1']) }}
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('price', 'Cijena:') }}
                    {{ Form::text('price[]', isset($singleservice->price) ? $singleservice->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Cijena']) }}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>    
                </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('discount', 'Popust:') }}
                    {{ Form::text('discount[]', isset($singleservice->discount) ? $singleservice->discount : null, ['class' => 'form-control', 'id' => 'discount', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('taxpercent', 'Stopa:') }}
                    {{ Form::text('taxpercent[]', isset($singleservice->taxpercent) ? $singleservice->taxpercent : null, ['class' => 'form-control', 'id' => 'taxpercent', 'placeholder' => '%']) }}
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
                    {{ Form::label('service', 'Usluga:') }}
                    {{ Form::select('service[]', $servicelist, isset($workingorder->service) ? $workingorder->service : null, array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'id')) }}
                    <small class="text-danger">{{ $errors->first('service') }}</small>
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
                    {{ Form::text('amount[]', isset($workingorder->amount) ? $workingorder->amount : null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => '1']) }}
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('price', 'Cijena:') }}
                    {{ Form::text('price[]', isset($workingorder->price) ? $workingorder->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Cijena']) }}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>    
                </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('discount', 'Popust:') }}
                    {{ Form::text('discount[]', isset($workingorder->discount) ? $workingorder->discount : null, ['class' => 'form-control', 'id' => 'discount', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    {{ Form::label('taxpercent', 'Stopa:') }}
                    {{ Form::text('taxpercent[]', isset($workingorder->taxpercent) ? $workingorder->taxpercent : null, ['class' => 'form-control', 'id' => 'taxpercent', 'placeholder' => '%']) }}
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
          
                <div class="col-md-2">
                <div class="form-group">  
                    {{ Form::label('workingorder_employee', 'Djelatnik:') }} 
                    {{ Form::text('workingorder_employee', isset($workingorder->workingorder_employee) ? $workingorder->workingorder_employee : null, ['class' => 'form-control', 'id' => 'workingorder_employee', 'placeholder' => 'Djelatnik']) }}
                    <small class="text-danger">{{ $errors->first('workingorder_employee') }}</small>
                </div>
                </div>
                <div class="col-md-1"></div>
                 <div class="col-md-2">
                <div class="form-group">  
                    {{ Form::label('workingorder_date_ship', 'Datum isporuke:') }}
                    {{ Form::text('workingorder_date_ship', isset($workingorder->workingorder_date_ship) ? $workingorder->workingorder_date_ship : null, ['class' => 'form-control datepicker', 'id' => 'workingorder_date_ship', 'placeholder' => 'Datum']) }}
                    <small class="text-danger">{{ $errors->first('workingorder_date_ship') }}</small>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                <div class="form-group">  
                    {{ Form::label('workingorder_note', 'Opis kvara:') }}
                    {{ Form::textarea('workingorder_note', isset($workingorder->workingorder_note) ? $workingorder->workingorder_note : null, ['class' => 'form-control', 'id' => 'workingorder_note', 'placeholder' => 'Unesite opis kvara ili napomene']) }}
                    <small class="text-danger">{{ $errors->first('workingorder_note') }}</small>
                    </div>
                    </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                <div class="form-group">  
                    {{ Form::label('workingorder_description', 'Opis rada:') }}
                    {{ Form::textarea('workingorder_description', isset($workingorder->workingorder_description) ? $workingorder->workingorder_description : null, ['class' => 'form-control', 'id' => 'workingorder_description', 'placeholder' => 'Opis radova']) }}
                    <small class="text-danger">{{ $errors->first('workingorder_description') }}</small>
                    </div>
                    </div>

                  {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
        </div>

        {{ Form::close() }}

    </div>
</div>

    {{ Form::open(array('action' => 'WorkingOrderSendMail', 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'method' => 'post')) }}
    {{Form::hidden('id', $workingorder->id, array('id' => 'id'))}}

    <!-- Modal {{ $workingorder->id }}-->
    <div class="modal fade" id="email-workingorder-id-{{ $workingorder->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Slanje radnog naloga u PDF obliku klijentu: {{ $workingorder->first_name }}  {{ $workingorder->last_name }}</h4>
                </div>
                <div class="modal-body">
                                <div class="form-group">  
                                <label for="workingorder_comment">Upišite komentar ispod radnog naloga:</label>
                                {{ Form::textarea('workingorder_comment', isset($workingorder->workingorder_comment) ? $workingorder->workingorder_comment : null, ['class' => 'form-control', 'id' => 'workingorder_comment']) }}
                                <small class="text-danger">{{ $errors->first('workingorder_comment') }}</small>
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

                $("#btn-email-workingorder-id-{{ $workingorder->id }}").click(function() { 
                    $('#email-workingorder-id-{{ $workingorder->id }}').modal('show');
                });

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
            });
    });
</script>