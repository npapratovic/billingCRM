<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('ProductIndex') }}">Pregled svih proizvoda</a></li>
    <li class="active">Dodaj proizvod</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Unos novog proizvoda</h4>
    	</div>
    	<div class="col-md-2">
      		<a href="{{ URL::route('ProductIndex') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
    <div class="row">
    <div class="col-md-8">
        {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
               
                <div class="form-group">  
                    <label for="title">Naslov:</label>  
                    {{ Form::text('title', isset($entry->title) ? $entry->title : null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Naslov posta']) }}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>
                <div class="form-group">  
                    <label for="permalink">Poveznica:</label>  
                    {{ Form::text('permalink', isset($entry->permalink) ? $entry->permalink : null, ['class' => 'form-control', 'id' => 'permalink', 'placeholder' => 'Poveznica proizvoda']) }}
                    <small class="text-danger">{{ $errors->first('permalink') }}</small>
                </div>  

                        <div class="form-group">  
                    <label for="intro">Kratki opis proizvoda:</label>  
                    {{ Form::textarea('intro', isset($entry->intro) ? $entry->intro : null, ['class' => 'form-control editor', 'placeholder' => 'Kratki opis']) }}
                    <small class="text-danger">{{ $errors->first('intro') }}</small>
                </div>  

                        <div class="form-group">  
                    <label for="content">Opis proizvoda:</label>  
                    {{ Form::textarea('content', isset($entry->content) ? $entry->content : null, ['class' => 'form-control editor', 'placeholder' => 'Opširniji opis proizvoda']) }}
                    <small class="text-danger">{{ $errors->first('content') }}</small>
                </div>  

            <ul class="nav nav-tabs">
             <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-list-alt" aria-hidden="true"></i> Općenito</a></li>
             <li><a data-toggle="tab" href="#inventory"><i class="fa fa-list-ol" aria-hidden="true"></i> Inventar</a></li>
             <li><a data-toggle="tab" href="#shipment"><i class="fa fa-truck fa-flip-horizontal" aria-hidden="true"></i> Dostava</a></li>
             <li><a data-toggle="tab" href="#related"><i class="fa fa-link" aria-hidden="true"></i> Povezani</a></li>
             <li><a data-toggle="tab" href="#attributes"><i class="fa fa-tag" aria-hidden="true"></i>  Atributi</a></li>
             <li><a data-toggle="tab" href="#advanced"><i class="fa fa-cog" aria-hidden="true"></i>  Napredno</a></li>
             </ul>
             <div class="tab-content">
             <div id="home" class="tab-pane fade in active">
        <div class="col-md-12">
                  
                <div class="form-group">  
                    <label for="sku">SKU:</label>  
                    {{ Form::text('sku', isset($entry->sku) ? $entry->sku : null, ['class' => 'form-control', 'id' => 'sku', 'placeholder' => 'SKU proizvoda']) }}
                    <small class="text-danger">{{ $errors->first('sku') }}</small>
                </div>    
                       <div class="form-group">  
                    <label for="price">Normalna cijena:</label>  
                    {{ Form::text('price', isset($entry->price) ? $entry->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Normalna cijena proizvoda']) }}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>
                                <div class="form-group">  
                            <label for="sale_price">Snižena cijena:</label>  
                             {{ Form::text('sale_price', isset($entry->sale_price) ? $entry->sale_price : null, ['class' => 'form-control', 'id' => 'sale_price', 'placeholder' => 'Snižena cijena proizvoda']) }}
                            <small class="text-danger">{{ $errors->first('sale_price') }}</small>
                            </div>

                                <div class="form-group">  
                            <label for="purchase_note">Napomena pri kupnji:</label>  
                             {{ Form::text('purchase_note', isset($entry->purchase_note) ? $entry->purchase_note : null, ['class' => 'form-control', 'id' => 'purchase_note', 'placeholder' => 'Napomena pri kupnji proizvoda']) }}
                            <small class="text-danger">{{ $errors->first('purchase_note') }}</small>
                            </div>

                <div class="form-group">  
                    <label for="manage_stock">Provjera zalihe:</label>  
                    {{ Form::select('manage_stock', array('0' => 'Ne', '1' => 'Da'), '0', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('manage_stock') }}</small>
                </div>   

                <div class="form-group">  
                    <label for="backorders">Mogućnost ponovne narudžbe:</label>  
                    {{ Form::select('backorders', array('0' => 'Ne', '1' => 'Da'), '0', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('backorders') }}</small>
                </div>   

                       </div>
                        </div>

                        <div id="inventory" class="tab-pane fade">
                                                <div class="col-md-12">

                <div class="form-group">  
                    <label for="stock">Status zalihe:</label>  
                    {{ Form::text('stock', isset($entry->stock) ? $entry->stock : null, ['class' => 'form-control', 'id' => 'stock', 'placeholder' => 'Status zalihe proizvoda']) }}
                    <small class="text-danger">{{ $errors->first('stock') }}</small>
                </div>

                <div class="form-group">  
                    <label for="total_sales">Ukupna prodaja proizvoda:</label>  
                    {{ Form::text('total_sales', isset($entry->total_sales) ? $entry->total_sales : null, ['class' => 'form-control', 'id' => 'total_sales', 'placeholder' => 'Ukupna prodaja proizvoda']) }}
                    <small class="text-danger">{{ $errors->first('total_sales') }}</small>
                </div>

                <div class="form-group">  
                    <label for="stock_status">Ima u zalihama:</label>  
                    {{ Form::select('stock_status', array('0' => 'Ne', '1' => 'Da'), '0', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('stock_status') }}</small>
                </div>   

                       <div class="form-group">  
                    <label for="sold_individually">Prodaje se odvojeno:</label>  
                    {{ Form::select('sold_individually', array('0' => 'Ne', '1' => 'Da'), '0', array('class'=>'form-control','style'=>'' )) }}
                    <small class="text-danger">{{ $errors->first('sold_individually') }}</small>
                </div>
                        </div>
                        </div>
                        <div id="shipment" class="tab-pane fade">
                            <div class="col-md-12">
                                <div class="form-group">  
                                 <label for="weight">Težina (kg):</label>  
                                 {{ Form::text('weight', isset($entry->weight) ? $entry->weight : null, ['class' => 'form-control', 'id' => 'weight', 'placeholder' => 'Težina proizvoda']) }}
                                <small class="text-danger">{{ $errors->first('weight') }}</small>
                                <div class="space10"></div>
                                <div class="col-md-4 padding10-right">
                                <label for="length">Dužina (cm):</label>  
                                 {{ Form::text('length', isset($entry->length) ? $entry->length : null, ['class' => 'form-control', 'id' => 'length', 'placeholder' => 'Dužina proizvoda']) }}
                                <small class="text-danger">{{ $errors->first('length') }}</small>
                                </div>

                                <div class="col-md-4 no-padding">
                                <label for="width">Širina (cm):</label>  
                                 {{ Form::text('width', isset($entry->width) ? $entry->width : null, ['class' => 'form-control', 'id' => 'width', 'placeholder' => 'Širina proizvoda']) }}
                                <small class="text-danger">{{ $errors->first('width') }}</small>
                                </div>
                                <div class="col-md-4 padding10-left">

                                <label for="height">Visina (cm):</label>  
                                 {{ Form::text('height', isset($entry->height) ? $entry->height : null, ['class' => 'form-control', 'id' => 'height', 'placeholder' => 'Visina proizvoda']) }}
                                <small class="text-danger">{{ $errors->first('height') }}</small>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div id="related">

                        </div>

                        <div id="attributes" class="tab-pane fade">
                        <div class="col-md-12">
                                             <div class="form-group">
                                                    <label for="product_attribute">Atributi:</label>   
                                                            {{ Form::select('product_attribute[]', $attributelist, isset($entry->product_attribute) ? $entry->product_attribute : null, array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'id', 'multiple')) }}
                                                    <small class="text-danger">{{ $errors->first('product_attribute') }}</small>
                                         </div>
                                         </div>
                        </div>

                        <div id="advanced" class="tab-pane fade">
                        <div class="col-md-12">
                               <div class="form-group">  
                            <label for="virtual">Virtualno:</label>  
                            {{ Form::select('virtual', array('0' => 'Ne', '1' => 'Da'), '0', array('class'=>'form-control','style'=>'' )) }}
                            <small class="text-danger">{{ $errors->first('virtual') }}</small>
                        </div>
                            <div class="form-group">  
                            <label for="downloadable">Moguć download:</label>  
                            {{ Form::select('downloadable', array('0' => 'Ne', '1' => 'Da'), '0', array('class'=>'form-control','style'=>'' )) }}
                            <small class="text-danger">{{ $errors->first('downloadable') }}</small>
                        </div>

                            <div class="form-group">  
                            <label for="featured">Izdvojen proizvod:</label>  
                            {{ Form::select('featured', array('0' => 'Ne', '1' => 'Da'), '0', array('class'=>'form-control','style'=>'' )) }}
                            <small class="text-danger">{{ $errors->first('featured') }}</small>
                        </div>

                            <div class="form-group">  
                            <label for="sold_individually">Prodaje se zasebno:</label>  
                            {{ Form::select('sold_individually', array('0' => 'Ne', '1' => 'Da'), '0', array('class'=>'form-control','style'=>'' )) }}
                            <small class="text-danger">{{ $errors->first('sold_individually') }}</small>
                        </div>
 
                        </div>
                        </div>
                
        </div>

    </div>
        <div class="col-md-4">

                            <div class="form-group">  
                            <label for="product_type">Podaci o proizvodu:</label>  
                            {{ Form::select('product_type', array('1' => 'Jednostavni proizvod', '2' => 'Varijabilni proizvod', '3' => 'Grupirani proizvod', '4' => 'Affiliate/Vanjski proizvod'), '1', array('class'=>'form-control','style'=>'' )) }}
                            <small class="text-danger">{{ $errors->first('product_type') }}</small>
                        </div>

                            <div class="form-group">  
                            <label for="status">Status:</label>  
                            {{ Form::select('status', array('0' => 'Skica', '1' => 'Objavljeno'), '0', array('class'=>'form-control','style'=>'' )) }}
                            <small class="text-danger">{{ $errors->first('status') }}</small>
                        </div>

                            <div class="form-group">  
                            <label for="visibility">Vidljivost:</label>  
                            {{ Form::select('visibility', array('0' => 'Javno', '1' => 'Privatno'), '0', array('class'=>'form-control','style'=>'' )) }}
                            <small class="text-danger">{{ $errors->first('visibility') }}</small>
                        </div>

                         <div class="form-group">
                                <label for="product_category">Kategorije proizvoda:</label>   
                                        {{ Form::select('product_category[]', $categorylist, isset($entry->product_category) ? $entry->product_category : null, array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'id', 'multiple')) }}
                                <small class="text-danger">{{ $errors->first('product_category') }}</small>
                     </div>

                         <div class="form-group">
                                <label for="product_tags">Oznake proizvoda:</label>   
                                        {{ Form::select('product_tag[]', $taglist, isset($entry->product_tag) ? $entry->product_tag : null, array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'id', 'multiple')) }}
                                <small class="text-danger">{{ $errors->first('product_tag') }}</small>
                     </div>


                    <label class="col-md-12" for="image">Slika proizvoda:</label>
                    {{ Form::file('image', array('class' => 'form-control'))  }}
                    @if (isset($errors) && ($errors->first('image') != '' || $errors->first('image') != null))
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                    @endif
                    <div class="space10"></div>
                      {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
        </div>
    </div>

        {{ Form::close() }}
        

    </div>
</div>
 
<script type="text/javascript">
	$(document).ready(function() {
	    $(":file").filestyle(); 
	    $('.editor').trumbowyg({  
            fixedBtnPane: true,
            mobile: true,
            autogrow: true,
            semantic: true, 
            removeformatPasted: true,
            btnsDef: {
                // Customizables dropdowns
                align: {
                    dropdown: ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                    ico: 'justifyLeft'
                },
                image: {
                    dropdown: ['insertImage', 'upload', 'base64'],
                    ico: 'insertImage'
                }
            },
            btns: [
                ['viewHTML'],
                ['h1', 'h2', 'h3', 'h4'],
                ['strong', 'em', 'underline'],
                ['createLink', 'unlink'],
                ['image'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'], 
                ['foreColor', 'backColor'],
                ['preformatted'],
                ['fullscreen']
            ] 
        });

    	$("#title").stringToSlug();
      
 

        $(".multiselect").select2({
          tags: true
        });

	});
</script>
