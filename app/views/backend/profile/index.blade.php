<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active">Uredi profil</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Uredi profil</h4>
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
		{{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => false)) }}
        @if ($mode == 'edit')
		{{ Form::hidden('id', $entry->id, array('id' => 'id')) }}
        @endif
        <div class="col-md-5"> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">  
                            <label for="username">Korisničko ime</label>
                            {{ Form::text('username', isset($entry->username) ? $entry->username : null, ['class' => 'form-control', 'id' => 'username', 'placeholder' => 'Korisničko ime']) }}
                            <small class="text-danger">{{ $errors->first('username') }}</small>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="form-group">  
                            <label for="password">Lozinka</label> 
                            {{ Form::text('password', isset($entry->password) ? $entry->password : null, ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Lozinka']) }}
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">  
                            <label for="first_name">Ime</label>
                            {{ Form::text('first_name', isset($entry->first_name) ? $entry->first_name : null, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'Ime']) }}
                            <small class="text-danger">{{ $errors->first('first_name') }}</small>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="form-group">  
                            <label for="last_name">Prezime</label> 
                            {{ Form::text('last_name', isset($entry->last_name) ? $entry->last_name : null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Prezime']) }}
                            <small class="text-danger">{{ $errors->first('last_name') }}</small>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">  
                            <label for="email">E-mail adresa</label>
                            {{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-mail adresa']) }}
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="form-group">  
                            <label for="phone">Broj telefona/mobitela</label> 
                            {{ Form::text('phone', isset($entry->phone) ? $entry->phone : null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Broj telefona/mobitela']) }}
                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                        </div>  
                    </div>
                </div>
                <div clas="row">
                  <a href="#liquidator" class="btn btn-info margin-bottom30" data-toggle="collapse">Dodatne opcije</a>
                  </div>
                <div id="liquidator" class="collapse col-md-12">
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group">  
                            <label for="bill_type">Numeracija računa</label>  
                            {{ Form::select('bill_type', array('0' => 'Fiskalna', '1' => 'Standardna'), isset($entry->bill_type) ? $entry->bill_type : null, array('class'=>'form-control','style'=>'' )) }}
                            <small class="text-danger">{{ $errors->first('bill_type') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5"> 
                        <div class="form-group">  
                            <label for="bill_dimensions">Dimenzije računa</label>  
                            {{ Form::select('bill_dimensions', array('0' => 'A4', '1' => 'POS'), isset($entry->bill_dimensions) ? $entry->bill_dimensions : null, array('class'=>'form-control','style'=>'' )) }}
                            <small class="text-danger">{{ $errors->first('bill_dimensions') }}</small>
                        </div> 
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="form-group">  
                                <label for="consumer_key">Consumer key</label>  
                                {{ Form::text('consumer_key', isset($entry->consumer_key) ? $entry->consumer_key : null, ['class' => 'form-control', 'id' => 'consumer_key', 'placeholder' => '']) }}
                                <small class="text-danger">{{ $errors->first('consumer_key') }}</small>
                            </div> 
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5"> 
                            <div class="form-group">  
                                <label for="consumer_secret">Consumer secret</label>  
                                {{ Form::text('consumer_secret', isset($entry->consumer_secret) ? $entry->consumer_secret : null, ['class' => 'form-control', 'id' => 'consumer_secret', 'placeholder' => '']) }}
                                <small class="text-danger">{{ $errors->first('consumer_secret') }}</small>
                            </div> 
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
    $(document).ready(function() {
        $(":file").filestyle();
        $('.editor').summernote({
            height: 200
        });
        $("#title").stringToSlug();
    });
</script>
