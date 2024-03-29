<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('admin.clients.index') }}">Pregled svih klijenata</a></li>
    <li class="active">Dodaj klijenta</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Unos novog klijenta</h4>
    	</div>
    	<div class="col-md-2">
      		<a href="{{ URL::route('admin.clients.index') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
	   {{ Form::open(['url' => 'admin/clients', 'files' => 'true']) }}
	    <div class="col-md-5"> 
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">  
                            {{ Form::label('company_name', 'Naziv:') }}
                            {{ Form::text('company_name', null, ['class'=>'form-control']) }}
                            <small class="text-danger">{{ $errors->first('company_name') }}</small>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <div class="form-group">  
                            {{ Form::label('client_type', 'Tip djelatnosti:') }}
                            {{ Form::select('client_type', array('d.o.o.' => 'd.o.o.', 'obrt' => 'obrt', 'j.d.o.o.' => 'j.d.o.o.', 'fiz. osoba' => 'fiz. osoba', 'bez oznake' => 'bez oznake', 'udruga' => 'udruga', 'OPG' => 'OPG', 'ustanova' => 'ustanova', 'd.d.' => 'd.d.', 'k.d.' => 'k.d.', 'DŠR' => 'DŠR', 'zadruga' => 'zadruga'), 'bez oznake', array('class'=>'form-control' )) }}
                            <small class="text-danger">{{ $errors->first('client_type') }}</small>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">  
                            {{ Form::label('oib', 'OIB:') }}
                            {{ Form::text('oib', null, ['class'=>'form-control']) }}
                            <small class="text-danger">{{ $errors->first('oib') }}</small>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">  
                            {{ Form::label('first_name', 'Ime klijenta:') }}
                            {{ Form::text('first_name', null, ['class'=>'form-control']) }}
                            <small class="text-danger">{{ $errors->first('first_name') }}</small>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                        <div class="form-group">  
                            {{ Form::label('last_name', 'Prezime klijenta:') }}
                            {{ Form::text('last_name', null, ['class'=>'form-control']) }}
                            <small class="text-danger">{{ $errors->first('last_name') }}</small>
                        </div>   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"> 
                        <div class="form-group">  
                            {{ Form::label('address', 'Adresa:') }}
                            {{ Form::text('address', null, ['class'=>'form-control']) }}
                            <small class="text-danger">{{ $errors->first('address') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3"> 
                        <div class="form-group"> 
                            {{ Form::label('mjesto', 'Mjesto:') }}
                            {{ Form::text('mjesto', null, ['class'=>'form-control']) }}
                            <small class="text-danger">{{ $errors->first('mjesto') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">
                            {{ Form::label('zip', 'Poštanski broj:') }}
                            {{ Form::text('zip', null, ['class'=>'form-control']) }}
                            <small class="text-danger">{{ $errors->first('zip') }}</small>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">  
                            {{ Form::label('country', 'Zemlja:') }}
                            {{ Form::text('country', null, ['class'=>'form-control']) }}
                            <small class="text-danger">{{ $errors->first('country') }}</small>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-4"> 
                        <div class="form-group">  
                            {{ Form::label('phone', 'Telefon:') }}
                            {{ Form::text('phone', null, ['class'=>'form-control']) }}
                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3"> 
                        <div class="form-group">  
                            {{ Form::label('fax', 'Fax:') }}
                            {{ Form::text('fax', null, ['class'=>'form-control']) }}
                            <small class="text-danger">{{ $errors->first('fax') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">  
                            {{ Form::label('mobile', 'Mobitel:') }}
                            {{ Form::text('mobile', null, ['class'=>'form-control']) }}  
                            <small class="text-danger">{{ $errors->first('mobile') }}</small>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"> 
                        <div class="form-group">  
                            {{ Form::label('email', 'E-mail adresa:') }}
                            {{ Form::text('email', null, ['class'=>'form-control']) }}  
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3"> 
                        <div class="form-group">  
                            {{ Form::label('web', 'Internet stranica:') }}
                            {{ Form::text('web', null, ['class'=>'form-control']) }}
                            <small class="text-danger">{{ $errors->first('web') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">  
                            {{ HTML::decode(Form::label('iban', 'IBAN: <span style="font-size: 10px;">(žiro račun)</span>')) }}
                            {{ Form::text('iban', null, ['class'=>'form-control']) }}
                            <small class="text-danger">{{ $errors->first('iban') }}</small>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">  
                            {{ HTML::decode(Form::label('note', 'Interna napomena: <span style="font-size: 10px;">(vidljivo samo tebi)</span>')) }}
                            {{ Form::textarea('note', null, ['class'=>'form-control']) }}
                            <small class="text-danger">{{ $errors->first('note') }}</small>
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
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                <tr>
                    <td>{{ $entry->first_name }} {{ $entry->last_name }}</td>
                    <td>{{ $entry->address }}  </td>
                    <td>{{ $entry->email}}</td>
                    <td>{{ $entry->oib}}</td>

                    <td class="col-md-1">

                        <a href="{{ URL::route('admin.clients.edit', array('id' => $entry->id)) }}">
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

@if (count($entries) > 0) 
    @foreach($entries as $entry)
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
                    <div class="row">
                        <div class="col-md-7">
                        </div>
                        <div class="col-md-2">
                            {{ Form::open(['method' => 'DELETE', 'route'=>['admin.services.destroy', $entry->id]]) }}
                            {{ Form::submit('Uredu', ['class' => 'btn btn-default', 'data-ok' => 'modal']) }}
                            {{ Form::close() }} 
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div> 
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

        @if (count($entries) > 0) 
            @foreach($entries as $entry)
                $("#btn-delete-client-id-{{ $entry->id }}").click(function() { 
                    $('#delete-client-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

    	
	});
</script>
