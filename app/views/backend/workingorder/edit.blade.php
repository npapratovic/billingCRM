<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('WorkingOrderIndex') }}">Pregled svih radnih naloga</a></li>
    <li class="active">Uredi radni nalog</li>
</ul>
<div class="panel-heading">
    <div class="row">
        <div class="col-md-4">
            <h4>Uredi radni nalog</h4>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-2">
        <a href="{{ URL::route('WorkingOrderCreatePdf', array('entry_id' => $entry->id)) }}" target="_blank">
        <button class="btn btn-warning btn-md pull-right"><i class="fa fa-file-text-o"></i> Preuzmi PDF</button>
        </a>
        </div>
        <div class="col-md-2">
        <button class="btn btn-primary btn-md" id="btn-email-workingorder-id-{{ $entry->id }}" data-target="#email-workingorder-id-{{ $entry->id }}"><i class="fa fa-envelope-o"></i> Pošalji klijentu</button>
        </div>
        <div class="col-md-1">
            <a href="{{ URL::route('WorkingOrderIndex') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
        </div>
    </div>
</div>
<div class="panel-body">
    <div class="row">
        {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
        {{Form::hidden('id', $entry->id, array('id' => 'id'))}}
        <div class="col-md-7">
                <div class="col-md-3">
                <div class="form-group">  
                    <label for="workingorder_number">Broj radnog naloga:</label>  
                    {{ Form::text('workingorder_number', isset($entry->workingorder_number) ? $entry->workingorder_number : null, ['class' => 'form-control', 'id' => 'workingorder_number', 'placeholder' => 'Broj radnog naloga']) }}
                    <small class="text-danger">{{ $errors->first('workingorder_number') }}</small>
                </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1">
                   <div class="form-group">  
                    <label for="taxable">Oporezivo:</label>
                    {{ Form::select('taxable', array('0' => 'Ne', '1' => 'Da'), isset($entry->taxable) ? $entry->taxable : null, array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('taxable') }}</small>
                </div>  
                    </div>

                <div class="col-md-1"></div>

                    <div class="col-md-2">
                   <div class="form-group">  
                    <label for="hide_amount">Sakrij iznose:</label> 
                    {{ Form::select('hide_amount', array('0' => 'Ne', '1' => 'Da'), isset($entry->hide_amount) ? $entry->hide_amount : null, array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('hide_amount') }}</small>
                </div>   
                </div>
                <div class="clearfix"></div>

                <div class="col-md-4">
                <div class="form-group">  
                    <label for="client_id">Naručitelj:</label>  
                    {{ Form::select('client_id', $clientlist, isset($entry->client_id) ? $entry->client_id : null, array('class' => 'form-control', 'style' => 'width:100%', 'id' => 'client_id')) }}
                    <small class="text-danger">{{ $errors->first('client_id') }}</small>
                </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-3">
                <div class="form-group">  
                    <label for="client_address">Adresa:</label>  
                    {{ Form::text('client_address', isset($entry->client_address) ? $entry->client_address : null, ['class' => 'form-control', 'id' => 'client_address', 'placeholder' => 'Adresa']) }}
                    <small class="text-danger">{{ $errors->first('client_address') }}</small>
                </div>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-3">
                <div class="form-group">  
                    <label for="client_oib">OIB:</label>  
                    {{ Form::text('client_oib', isset($entry->client_oib) ? $entry->client_oib : null, ['class' => 'form-control', 'id' => 'client_oib', 'placeholder' => 'OIB']) }}
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
                    <label for="service">Usluga:</label>  
                    {{ Form::select('service[]', $servicelist, isset($singleservice->service_id) ? $singleservice->service_id : null,  array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'id')) }}
                    <small class="text-danger">{{ $errors->first('service') }}</small>
                        </div>
                        </div>
                <div class="col-md-2">
                        <div class="form-group">  
                    <label for="measurement">Jedinična mjera:</label>  
                    {{ Form::select('measurement[]', array('piece' => 'kom', 'hour' => 'sat', 'year' => 'god', 'km' => 'km', 'lit' => 'lit', 'kg' => 'kg', 'kWh' => 'kWh', 'm³' => 'm³', 't' => 't', 'm²' => 'm²', 'm' => 'm', 'day' => 'dan', 'night' => 'noć', 'kart' => 'kart', 'rč' => 'rč', 'par' => 'par', 'ml' => 'ml', 'pax' => 'pax', 'room' => 'soba', 'apt' => 'apt', 'term' => 'term', 'set' => 'set', 'pak' => 'pak', 'bod' => 'bod', 'usi' => 'usi'), isset($singleservice->measurement) ? $singleservice->measurement : 'piece', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('measurement') }}</small>
                </div>     
                </div> 
                <div class="col-md-3">
                   <div class="form-group">  
                    <label for="amount">Količina:</label>
                    {{ Form::text('amount[]', isset($singleservice->amount) ? $singleservice->amount : null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => '1']) }}
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                   <div class="form-group">  
                    <label for="price">Cijena:</label>
                    {{ Form::text('price[]', isset($singleservice->price) ? $singleservice->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Cijena']) }}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>    
                </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1">
                   <div class="form-group">  
                    <label for="discount">Popust:</label>
                    {{ Form::text('discount[]', isset($singleservice->discount) ? $singleservice->discount : null, ['class' => 'form-control', 'id' => 'discount', 'placeholder' => '%']) }}
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                </div>    
                </div>
                <div class="col-md-1"></div>
                   <div class="col-md-1">
                   <div class="form-group">  
                    <label for="taxpercent">Stopa:</label>
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
                    <label for="service">Usluga:</label>  
                    {{ Form::select('service[]', $servicelist, isset($entry->service) ? $entry->service : null, array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'id')) }}
                    <small class="text-danger">{{ $errors->first('service') }}</small>
                        </div>
                        </div>
                <div class="col-md-2">
                        <div class="form-group">  
                    <label for="measurement">Jedinična mjera:<el>  
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
                    <label for="taxpercent">Stopa:</label>
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
                            <a class="btn btn-info btn-duplicator margin-bot30">Dodaj usluge</a>
                        </div>


                    </div>
                </div>
          
                <div class="col-md-2">
                <div class="form-group">  
                    <label for="workingorder_employee">Djelatnik:</label>  
                    {{ Form::text('workingorder_employee', isset($entry->workingorder_employee) ? $entry->workingorder_employee : null, ['class' => 'form-control', 'id' => 'workingorder_employee', 'placeholder' => 'Djelatnik']) }}
                    <small class="text-danger">{{ $errors->first('workingorder_employee') }}</small>
                </div>
                </div>
                <div class="col-md-1"></div>
                 <div class="col-md-2">
                <div class="form-group">  
                    <label for="workingorder_date_ship">Datum isporuke:</label>
                    {{ Form::text('workingorder_date_ship', isset($entry->workingorder_date_ship) ? $entry->workingorder_date_ship : null, ['class' => 'form-control datepicker', 'id' => 'workingorder_date_ship', 'placeholder' => 'Datum']) }}
                    <small class="text-danger">{{ $errors->first('workingorder_date_ship') }}</small>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                <div class="form-group">  
                    <label for="workingorder_note">Opis kvara:</label>
                    {{ Form::textarea('workingorder_note', isset($entry->workingorder_note) ? $entry->workingorder_note : null, ['class' => 'form-control', 'id' => 'workingorder_note', 'placeholder' => 'Unesite opis kvara ili napomene']) }}
                    <small class="text-danger">{{ $errors->first('workingorder_note') }}</small>
                    </div>
                    </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                <div class="form-group">  
                    <label for="workingorder_description">Opis radova:</label>
                    {{ Form::textarea('workingorder_description', isset($entry->workingorder_description) ? $entry->workingorder_description : null, ['class' => 'form-control', 'id' => 'workingorder_description', 'placeholder' => 'Opis radova']) }}
                    <small class="text-danger">{{ $errors->first('workingorder_description') }}</small>
                    </div>
                    </div>

                  {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
        </div>

        {{ Form::close() }}

    </div>
</div>

    {{ Form::open(array('action' => 'WorkingOrderSendMail', 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'method' => 'post')) }}
    {{Form::hidden('id', $entry->id, array('id' => 'id'))}}

    <!-- Modal {{ $entry->id }}-->
    <div class="modal fade" id="email-workingorder-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Slanje radnog naloga u PDF obliku klijentu: {{ $entry->first_name }}  {{ $entry->last_name }}</h4>
                </div>
                <div class="modal-body">
                                <div class="form-group">  
                                <label for="workingorder_comment">Upišite komentar ispod radnog naloga:</label>
                                {{ Form::textarea('workingorder_comment', isset($entry->workingorder_comment) ? $entry->workingorder_comment : null, ['class' => 'form-control', 'id' => 'workingorder_comment']) }}
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
        $('.editor').summernote({
            height: 200
        });
        $("#title").stringToSlug();

                $("#btn-email-workingorder-id-{{ $entry->id }}").click(function() { 
                    $('#email-workingorder-id-{{ $entry->id }}').modal('show');
                });

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
            });
    });
</script>