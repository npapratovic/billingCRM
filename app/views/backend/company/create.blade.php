<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li> 
    <li class="active">Unos podataka za tvrtku</li>
</ul>
<div class="panel-heading">
    <div class="row">
        <div class="col-md-10">
            <h4>Unos podataka za tvrtku</h4>
        </div>
        <div class="col-md-2">
            <a href="{{ URL::route('getDashboard') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
        </div>
    </div>
</div>
<div class="panel-body">

	<div class="row"> 

        {{ Form::open(['url' => 'admin/company', 'files' => 'true']) }}

        <div class="col-md-4">

            <div class="form-group"> 
                {{ Form::label('image', 'Logotip:') }}
                {{ Form::file('image', ['class'=>'form-control'])  }}
                @if (isset($errors) && ($errors->first('image') != '' || $errors->first('image') != null))
                <small class="text-danger">{{ $errors->first('image') }}</small>
                @endif
            </div> 

            <div class="form-group">
                {{ Form::label('title', 'Naziv:') }}
                {{ Form::text('title', null, ['class'=>'form-control', 'placeholder' => 'Naziv firme, obrta, udruge, agencije...']) }}
                <small class="text-danger">{{ $errors->first('title') }}</small>
            </div> 
 
            <div class="form-group">
                {{ Form::label('company_note', 'Napomene na računu:') }}
                {{ Form::textarea('company_note', null, ['class'=>'form-control', 'placeholder' => '']) }}
                <small class="text-danger">{{ $errors->first('company_note') }}</small>
            </div>  
 
            <div class="form-group">
                {{ Form::label('free_input', 'Slobodan unos:') }}
                {{ Form::textarea('free_input', null, ['class'=>'form-control', 'placeholder' => '']) }}
                <small class="text-danger">{{ $errors->first('free_input') }}</small>
            </div>  

        </div>

        <div class="col-md-4">

            <div class="form-group">
                {{ Form::label('address', 'Adresa:') }}
                {{ Form::text('address', null, ['class'=>'form-control', 'placeholder' => 'Adresa']) }}
                <small class="text-danger">{{ $errors->first('address') }}</small>
            </div>
 
             <div class="form-group">
                {{ Form::label('city', 'Mjesto:') }}
                {{ Form::text('city', null, ['class'=>'form-control', 'placeholder' => '']) }}
                <small class="text-danger">{{ $errors->first('city') }}</small>
            </div>

             <div class="form-group">
                {{ Form::label('post_number', 'Poštanski broj:') }}
                {{ Form::text('post_number', null, ['class'=>'form-control', 'placeholder' => '']) }}
                <small class="text-danger">{{ $errors->first('post_number') }}</small>
            </div>

            <div class="form-group">
                {{ Form::label('mobile_phone_number', 'Mobitel:') }}
                {{ Form::text('mobile_phone_number', null, ['class'=>'form-control', 'placeholder' => '']) }}
                <small class="text-danger">{{ $errors->first('mobile_phone_number') }}</small>
            </div>      
              
            <div class="form-group">
                {{ Form::label('website', 'Internet stranica:') }}
                {{ Form::text('website', null, ['class'=>'form-control', 'placeholder' => '']) }}
                <small class="text-danger">{{ $errors->first('website') }}</small>
            </div>      

            <div class="form-group">
                {{ Form::label('show_text', 'Prikaži tekst:') }}
                {{ Form::select('show_text', ['0' => 'Ne', '1' => 'Da'], null, ['class'=>'form-control','style'=>'' ]) }}
                <small class="text-danger">{{ $errors->first('show_text') }}</small>
            </div> 

            <div class="form-group">
                {{ Form::label('tax_percentage', 'Porezna stopa:') }}
                {{ Form::select('tax_percentage', ['0' => '0 %', '5' => '5 %', '13' => '13%', '25' => '25 %'], null, ['class'=>'form-control','style'=>'' ]) }}
                <small class="text-danger">{{ $errors->first('tax_percentage') }}</small>
            </div> 

            <div class="form-group">
                {{ Form::label('tax_base', 'Prikaži poreznu osnovicu:') }}
                {{ Form::select('tax_base', ['0' => 'Ne', '1' => 'Da'], null, ['class'=>'form-control','style'=>'' ]) }}
                <small class="text-danger">{{ $errors->first('tax_base') }}</small>
            </div> 

        </div>

        <div class="col-md-4">

            <div class="form-group">
                {{ Form::label('country', 'Zemlja:') }}
                {{ Form::text('country', null, ['class'=>'form-control', 'placeholder' => '']) }}
                <small class="text-danger">{{ $errors->first('country') }}</small>
            </div> 
 
             <div class="form-group">
                {{ Form::label('phone_number', 'Telefon:') }}
                {{ Form::text('phone_number', null, ['class'=>'form-control', 'placeholder' => '']) }}
                <small class="text-danger">{{ $errors->first('phone_number') }}</small>
            </div> 

             <div class="form-group">
                {{ Form::label('email', 'E-mail adresa:') }}
                {{ Form::text('email', null, ['class'=>'form-control', 'placeholder' => '']) }}
                <small class="text-danger">{{ $errors->first('email') }}</small>
            </div>  
                     
            <div class="form-group">
                {{ Form::label('swift', 'Swift:') }}
                {{ Form::text('swift', null, ['class'=>'form-control', 'placeholder' => '']) }}
                <small class="text-danger">{{ $errors->first('swift') }}</small>
            </div>  

            <div class="form-group">
                {{ Form::label('iban', 'IBAN:') }}
                {{ Form::text('iban', null, ['class'=>'form-control', 'placeholder' => '']) }}
                <small class="text-danger">{{ $errors->first('iban') }}</small>
            </div> 

            <div class="form-group">
                {{ Form::label('pdv_id', 'PDV ID:') }}
                {{ Form::text('pdv_id', null, ['class'=>'form-control', 'placeholder' => '']) }}
                <small class="text-danger">{{ $errors->first('pdv_id') }}</small>
            </div>  

            <div class="form-group">
                {{ Form::label('oib', 'OIB:') }}
                {{ Form::text('oib', null, ['class'=>'form-control', 'placeholder' => 'OIB']) }}
                <small class="text-danger">{{ $errors->first('oib') }}</small>
            </div> 
            <div class="form-group"> 
                {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
            </div> 
        </div>
             

        {{ Form::close() }}
  
    </div>

</div>

 
<script type="text/javascript">
    $(document).ready(function() {
        $(":file").filestyle(); 
    });
</script>
