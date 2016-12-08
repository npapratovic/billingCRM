<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active">Moja tvrtka</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Moja tvrtka</h4>
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
		{{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
        @if ($mode == 'edit')
		{{ Form::hidden('id', $entry->id, array('id' => 'id')) }}
        @endif
        <div class="col-md-5"> 
                <div class="row">
                @if ($mode == 'edit')
                @if ($entry->image != null || $entry->image != '')
                        <div class="form-group">
                            <label class="col-md-12" for="image">Trenutni logotip:</label> 
                            <div class="col-md-12">
                                {{ HTML::image(URL::to('/') . '/uploads/frontend/category/thumbs/' . $entry->image, $entry->title) }}
                            </div>
                        </div>
                @endif
                @endif
                        <div class="form-group"> 
                            <label class="col-md-12" for="image">Logotip</label>
                            <div class="col-md-12"> 
                                {{ Form::file('image', array('class' => 'form-control'))  }}
                                @if (isset($errors) && ($errors->first('image') != '' || $errors->first('image') != null))
                            <small class="text-danger">{{ $errors->first('image') }}</small>
                                @endif
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">  
                            <label for="title">Naziv</label>
                            {{ Form::text('title', isset($entry->title) ? $entry->title : null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Naziv firme, obrta, udruge, agencije...']) }}
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <div class="form-group">  
                            <label for="oib">OIB</label> 
                            {{ Form::text('oib', isset($entry->oib) ? $entry->oib : null, ['class' => 'form-control', 'id' => 'oib', 'placeholder' => 'OIB']) }}
                            <small class="text-danger">{{ $errors->first('oib') }}</small>
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
                            <label for="city">Mjesto</label>  
                            {{ Form::text('city', isset($entry->city) ? $entry->city : null, ['class' => 'form-control', 'id' => 'city', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('city') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">  
                            <label for="post_number">Poštanski broj</label>  
                            {{ Form::text('post_number', isset($entry->post_number) ? $entry->post_number : null, ['class' => 'form-control', 'id' => 'post_number', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('post_number') }}</small>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
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
                            <label for="phone_number">Telefon</label>  
                            {{ Form::text('phone_number', isset($entry->phone_number) ? $entry->phone_number : null, ['class' => 'form-control', 'id' => 'phone_number', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('phone_number') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3"> 
                        <div class="form-group">  
                            <label for="email">E-mail adresa</label>  
                            {{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => '@']) }}
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">  
                            <label for="iban">IBAN</label>  
                            {{ Form::text('iban', isset($entry->iban) ? $entry->iban : null, ['class' => 'form-control', 'id' => 'iban', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('iban') }}</small>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">  
                            <label for="company_note">Napomene na računu</label>
                            {{ Form::textarea('company_note', isset($entry->company_note) ? $entry->company_note : null, ['class' => 'form-control', 'id' => 'company_note', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('company_note') }}</small>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-2"> 
                        <div class="form-group">  
                            <label for="tax_percentage">Porezna stopa</label>  
                            {{ Form::select('tax_percentage', array('0' => '0 %', '5' => '5 %', '13' => '13%', '25' => '25 %'), isset($entry->tax_percentage) ? $entry->tax_percentage : null, array('class'=>'form-control','style'=>'' )) }}
                            <small class="text-danger">{{ $errors->first('tax_percentage') }}</small>
                        </div> 
                    </div>
                </div>
                <div clas="row">
                  <a href="#liquidator" class="btn btn-info margin-bottom30" data-toggle="collapse">Glavni likvidator</a>
                  </div>
                <div id="liquidator" class="collapse col-md-12">
                <div class="row">
                    <div class="col-md-4"> 
                        <div class="form-group">  
                            <label for="first_name">Ime</label>  
                            {{ Form::text('first_name', isset($entry->first_name) ? $entry->first_name : null, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('first_name') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4"> 
                        <div class="form-group">  
                            <label for="last_name">Prezime</label>  
                            {{ Form::text('last_name', isset($entry->last_name) ? $entry->last_name : null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('last_name') }}</small>
                        </div> 
                    </div>
                    </div>
                </div>

                <div clas="row">
                  <a href="#options" class="btn btn-info margin-bottom30" data-toggle="collapse">Dodatne opcije</a>
                  </div>
                <div id="options" class="collapse col-md-12">
                <div class="row">
                    <div class="col-md-4"> 
                        <div class="form-group">  
                            <label for="mobile_phone_number">Mobitel</label>  
                            {{ Form::text('mobile_phone_number', isset($entry->mobile_phone_number) ? $entry->mobile_phone_number : null, ['class' => 'form-control', 'id' => 'mobile_phone_number', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('mobile_phone_number') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4"> 
                        <div class="form-group">  
                            <label for="website">Internet stranica</label>  
                            {{ Form::text('website', isset($entry->website) ? $entry->website : null, ['class' => 'form-control', 'id' => 'website', 'placeholder' => 'http://']) }}
                            <small class="text-danger">{{ $errors->first('website') }}</small>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"> 
                        <div class="form-group">  
                            <label for="swift">Swift</label>  
                            {{ Form::text('swift', isset($entry->swift) ? $entry->swift : null, ['class' => 'form-control', 'id' => 'swift', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('swift') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4"> 
                        <div class="form-group">  
                            <label for="pdv_id">PDV ID</label>  
                            {{ Form::text('pdv_id', isset($entry->pdv_id) ? $entry->pdv_id : null, ['class' => 'form-control', 'id' => 'pdv_id', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('pdv_id') }}</small>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">  
                            <label for="free_input">Slobodan unos</label>
                            {{ Form::text('free_input', isset($entry->free_input) ? $entry->free_input : null, ['class' => 'form-control', 'id' => 'free_input', 'placeholder' => '']) }}
                            <small class="text-danger">{{ $errors->first('free_input') }}</small>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-4"> 
                        <div class="form-group">  
                            <label for="show_text">Prikaži tekst</label>  
                            {{ Form::select('show_text', array('0' => 'Ne', '1' => 'Da'), isset($entry->show_text) ? $entry->show_text : null, array('class'=>'form-control','style'=>'' )) }}
                            <small class="text-danger">{{ $errors->first('show_text') }}</small>
                        </div> 
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4"> 
                        <div class="form-group">  
                            <label for="tax_base">Prikaži poreznu osnovicu</label>  
                            {{ Form::select('tax_base', array('0' => 'Ne', '1' => 'Da'), isset($entry->tax_base) ? $entry->tax_base : null, array('class'=>'form-control','style'=>'' )) }}
                            <small class="text-danger">{{ $errors->first('tax_base') }}</small>
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
