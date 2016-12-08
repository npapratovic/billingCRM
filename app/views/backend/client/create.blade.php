<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('ClientIndex') }}">Pregled svih klijenata</a></li>
    <li class="active">Dodaj klijenta</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Unos novog klijenta</h4>
    	</div>
    	<div class="col-md-2">
      		<a href="{{ URL::route('ClientIndex') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
		{{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => false)) }}
	    <div class="col-md-5"> 
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">  
                            <label for="company_name">Naziv</label>
                            {{ Form::text('company_name', isset($entry->company_name) ? $entry->company_name : null, ['class' => 'form-control', 'id' => 'company_name', 'placeholder' => 'Popuniti samo za pravne osobe']) }}
                            <small class="text-danger">{{ $errors->first('company_name') }}</small>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <div class="form-group">  
                            <label for="client_type">Tip djelatnosti</label>
                            {{ Form::select('client_type', array('d.o.o.' => 'd.o.o.', 'obrt' => 'obrt', 'j.d.o.o.' => 'j.d.o.o.', 'fiz. osoba' => 'fiz. osoba', 'bez oznake' => 'bez oznake', 'udruga' => 'udruga', 'OPG' => 'OPG', 'ustanova' => 'ustanova', 'd.d.' => 'd.d.', 'k.d.' => 'k.d.', 'DŠR' => 'DŠR', 'zadruga' => 'zadruga'), 'bez oznake', array('class'=>'form-control','style'=>'' )) }}
                            <small class="text-danger">{{ $errors->first('client_type') }}</small>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">  
                            <label for="oib">OIB</label>
                            {{ Form::text('oib', isset($entry->oib) ? $entry->oib : null, ['class' => 'form-control', 'id' => 'oib', 'placeholder' => 'Popuniti samo za pravne osobe']) }}
                            <small class="text-danger">{{ $errors->first('oib') }}</small>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">  
                            <label for="first_name">Ime klijenta</label>
                            {{ Form::text('first_name', isset($entry->first_name) ? $entry->first_name : null, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('first_name') }}</small>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                        <div class="form-group">  
                            <label for="last_name">Prezime klijenta</label>
                            {{ Form::text('last_name', isset($entry->last_name) ? $entry->last_name : null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('last_name') }}</small>
                        </div>   
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"> 
                        <div class="form-group">  
                            <label for="address">Adresa</label>  
                            {{ Form::text('address', isset($entry->address) ? $entry->address : null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('address') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3"> 
                        <div class="form-group">  
                            <label for="mjesto">Mjesto</label>  
                            {{ Form::text('mjesto', isset($entry->mjesto) ? $entry->mjesto : null, ['class' => 'form-control', 'id' => 'mjesto', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('mjesto') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">  
                            <label for="zip">Poštanski broj</label>  
                            {{ Form::text('zip', isset($entry->zip) ? $entry->zip : null, ['class' => 'form-control', 'id' => 'zip', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('zip') }}</small>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">  
                            <label for="country">Zemlja</label>
                            {{ Form::text('country', isset($entry->country) ? $entry->country : null, ['class' => 'form-control', 'id' => 'country', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('country') }}</small>
                        </div>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-4"> 
                        <div class="form-group">  
                            <label for="phone">Telefon</label>  
                            {{ Form::text('phone', isset($entry->phone) ? $entry->phone : null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3"> 
                        <div class="form-group">  
                            <label for="fax">Fax</label>  
                            {{ Form::text('fax', isset($entry->fax) ? $entry->fax : null, ['class' => 'form-control', 'id' => 'fax', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('fax') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">  
                            <label for="mobile">Mobitel</label>  
                            {{ Form::text('mobile', isset($entry->mobile) ? $entry->mobile : null, ['class' => 'form-control', 'id' => 'mobile', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('mobile') }}</small>
                        </div> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"> 
                        <div class="form-group">  
                            <label for="email">E-mail adresa</label>  
                            {{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3"> 
                        <div class="form-group">  
                            <label for="web">Internet stranica</label>  
                            {{ Form::text('web', isset($entry->web) ? $entry->web : null, ['class' => 'form-control', 'id' => 'web', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('web') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">  
                            <label for="iban">IBAN <span style="font-size: 10px;">(žiro račun)</span></label>  
                            {{ Form::text('iban', isset($entry->iban) ? $entry->iban : null, ['class' => 'form-control', 'id' => 'iban', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('iban') }}</small>
                        </div> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">  
                            <label for="note">Interna napomena <span style="font-size: 10px;">(vidljivo samo tebi)</span></label>
                            {{ Form::textarea('note', isset($entry->note) ? $entry->note : null, ['class' => 'form-control', 'id' => 'note', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('note') }}</small>
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

	    <div class="col-md-6 col-md-offset-1">
	    	    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
                <th>Naziv</th>
                <th>Adresa</th>
                <th>Kontakt</th>
                <th>OIB</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
             @if (count($entries['entries']) > 0) 
                @foreach($entries['entries'] as $entry)
                <tr>
                    <td>{{ $entry->first_name }} {{ $entry->last_name }}</td>
                    <td>{{ $entry->address }}  </td>
                    <td>{{ $entry->email}}</td>
                    <td>{{ $entry->oib}}</td>

                    <td class="col-md-1">

                        <a href="{{ URL::route('ClientEdit', array('id' => $entry->id)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                        <button type="button" id="btn-delete-client-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-client-id-{{ $entry->id }}"><i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
                @endforeach 
            @else
                <p>Nema niti jednog unešenog klijenta</p>
            @endif
        </tbody>
    </table>
	    </div>
    </div>
</div>

@if (count($entries['entries']) > 0) 
    @foreach($entries['entries'] as $entry)
    <!-- Modal {{ $entry->id }}-->
    <div class="modal fade" id="delete-client-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati klijenta: {{ $entry->first_name }}?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('ClientDestroy', array('id' => $entry->id)) }}">
                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif 
 
<script type="text/javascript">
	$(document).ready(function() {
	    $(":file").filestyle();
	    $('.editor').summernote({
	    	height: 200
	    });
    	$("#title").stringToSlug();

        @if (count($entries['entries']) > 0) 
            @foreach($entries['entries'] as $entry)
                $("#btn-delete-client-id-{{ $entry->id }}").click(function() { 
                    $('#delete-client-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

    	 $('#entries-list').DataTable( 
        	{
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.11/i18n/Croatian.json"
            }
        	})
	});
</script>
