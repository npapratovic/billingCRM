


                <div class="row" style="margin-bottom:5px;">
                    <div class="col-md-3 wow fadeIn">
                        <div class="sm-st clearfix widgets">
                            <span class="sm-st-icon st-red"><i class="fa fa-user"></i></span>
                            <div class="sm-st-info">
                                <span class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">{{ $productscount['total'] }}</span> Ukupno proizvoda 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeIn">
                        <div class="sm-st clearfix widgets">
                            <span class="sm-st-icon st-violet"><i class="fa fa-male"></i></span>
                            <div class="sm-st-info">
                                  <span class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">{{ $invoicescount['total'] }}</span> Ukupno računa   
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeIn">
                        <div class="sm-st clearfix widgets">
                            <span class="sm-st-icon st-green"><i class="fa fa-truck"></i></span>
                            <div class="sm-st-info">
                                  <span class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">{{ $orderscount['total'] }}</span> Ukupno narudžbi   
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeIn">
                        <div class="sm-st clearfix widgets">
                            <span class="sm-st-icon st-blue"><i class="fa fa-certificate"></i></span>
                            <div class="sm-st-info">
                                <span class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">{{ $offerscount['total'] }}</span> Ukupno ponuda   
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-bottom:5px;">
                    <div class="col-md-3 wow fadeIn">
                        <div class="sm-st clearfix widgets">
                            <span class="sm-st-icon st-orange"><i class="fa fa-certificate"></i></span>
                            <div class="sm-st-info">
                                <span class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">{{ $dispatchcount['total'] }}</span> Ukupno otpremnica 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeIn">
                        <div class="sm-st clearfix widgets">
                            <span class="sm-st-icon st-purple"><i class="fa fa-certificate"></i></span>
                            <div class="sm-st-info">
                                  <span class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">{{ $workingordercount['total'] }}</span> Ukupno radnih naloga  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeIn">
                        <div class="sm-st clearfix widgets">
                            <span class="sm-st-icon st-lime"><i class="fa fa-ticket"></i></span>
                            <div class="sm-st-info">
                                  <span class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">{{ $narudzbenicecount['total'] }}</span> Ukupno narudžbenica
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeIn">
                        <div class="sm-st clearfix widgets">
                            <span class="sm-st-icon st-gray"><i class="fa fa-users"></i></span>
                            <div class="sm-st-info">
                                  <span class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">{{ $clientcount['total'] }}</span> Ukupno klijenata
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="bg-white">
                            <header class="panel-heading"> 
                                <div class="row">
                                    <div class="col-md-9">
                                              Proizvodi  
                                     </div>
                                    <div class="col-md-3 text-right">
                                         <a href="{{ URL::route('ProductIndex') }}"><i class="fa fa-eye"></i> Svi proizvodi</a>
                                    </div>
                                </div>
                            </header>
                            <div class="panel-body table-responsive">

                                @if (count($productsentries) > 0)
                                    <table class="table table-hover wow fadeIn" id="product-list"  data-wow-duration="1s" data-wow-delay="1s">
                                        <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Naziv</th>
                                                <th>Cijena</th>
                                                <th>Tip</th>
                                                <th>Istaknuta slika</th>
                                                <th>Akcija</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($productsentries as $entry)
                                            <tr>
                                                <td>{{ $entry->sku }}</td>
                                                <td>{{ $entry->title }}</td>
                                                <td>{{ $entry->price }}</td>
                                                <td>{{ $entry->product_type }}</td>
                                                <td>{{ $entry->image }}</td>
                                                <td> 
                                                    <a href="{{ URL::route('ProductEdit', array('id' => $entry->id)) }}">
                                                        <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <button type="button" id="btn-delete-product-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-product-id-{{ $entry->id }}"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>Nema novih proizvoda</p>
                                @endif

                            

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class=" bg-white">
                            <header class="panel-heading">
                                <div class="row">
                                    <div class="col-md-9">
                                                  Izlazni računi
                                    </div>
                                    <div class="col-md-3 text-right">
                                         <a href="{{ URL::route('admin.invoices.index') }}"><i class="fa fa-eye"></i> Svi računi</a>
                                    </div>
                                </div>
                            </header>
                            <div class="panel-body table-responsive">
 
                                @if (count($invoicesentries) > 0)
                                    <table class="table table-hover wow fadeIn" id="invoice-list"  data-wow-duration="1s" data-wow-delay="1s">
                                        <thead>
                                            <tr>
                                                <th>Broj računa</th>
                                                <th>Kupac</th>
                                                <th>Iznos računa</th>
                                                <th>Datum računa</th>
                                                <th>Rok plaćanja</th>
                                                <th>Status</th>
                                                <th>Akcija</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invoicesentries as $entry)
                                            <tr>
                                                <td>{{$entry->invoice_number}}</td>
                                                <td>{{$entry->first_name}} {{$entry->last_name}}</td>
                                                <td></td>
                                                <td>{{$entry->invoice_date}}</td>
                                                <td>{{$entry->invoice_date_deadline}}</td>
                                                <td></td>
                                                <td> 
                                                    <a href="{{ URL::route('admin.invoices.edit', array('id' => $entry->id)) }}">
                                                        <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <button type="button" id="btn-delete-invoice-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-invoice-id-{{ $entry->id }}"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>Nema novih računa</p>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt30">
                    <div class="col-md-6">
                        <div class="bg-white">
                            <header class="panel-heading">
                                <div class="row">
                                    <div class="col-md-9">
                                                Narudžbe
                                    </div>
                                    <div class="col-md-3 text-right">
                                         <a href="{{ URL::route('OrderIndex') }}"><i class="fa fa-eye"></i> Sve narudžbe</a>
                                    </div>
                                </div>
                            </header>
                            <div class="panel-body table-responsive">
 
                                @if (count($ordersentries) > 0)
                                    <table class="table table-hover wow fadeIn" id="order-list"  data-wow-duration="1s" data-wow-delay="1s">
                                        <thead>
                                            <tr>
                                                <th>Broj narudžbe</th>
                                                <th>Kupljeno</th>
                                                <th>Adresa dostave</th>
                                                <th>Datum</th>
                                                <th>Ukupno</th>
                                                <th>Akcija</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ordersentries as $entry)
                                            <tr>
                                                <td>{{$entry->id}}</td>
                                                <td>{{$entry->payment_status}}</td>
                                                <td>{{$entry->shipping_address}}</td>
                                                <td>{{ date('d.m.Y', strtotime($entry->order_date))}}</td>
                                                <td>{{$entry->orderprice}} </td>
                                                <td> 
                                                    <a href="{{ URL::route('OrderEdit', array('id' => $entry->id)) }}">
                                                        <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <button type="button" id="btn-delete-order-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-order-id-{{ $entry->id }}"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>Nema novih narudžbi</p>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                     <div class="bg-white">
                        <header class="panel-heading">
                               <div class="row">
                                    <div class="col-md-9">
                                                Izlazne ponude
                                    </div>
                                    <div class="col-md-3 text-right">
                                         <a href="{{ URL::route('OfferIndex') }}"><i class="fa fa-eye"></i> Sve ponude</a>
                                    </div>
                                </div>
                        </header>
                        <div class="panel-body table-responsive">
                               
                                @if (count($offersentries) > 0)
                                    <table class="table table-hover wow fadeIn" id="offer-list"  data-wow-duration="1s" data-wow-delay="1s">
                                        <thead>
                                            <tr>
                                                <th>Broj ponude</th>
                                                <th>Kupac</th>
                                                <th>Datum ponude</th>
                                                <th>Istek ponude</th>
                                                <th>Akcija</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($offersentries as $entry)
                                            <tr>
                                                <td>{{ $entry->offer_number }}</td>
                                                <td>{{ $entry->first_name }} {{ $entry->last_name }}</td>
                                                <td>{{ $entry->offer_start }}</td>
                                                <td>{{ $entry->offer_end }}</td>
                                                <td> 
                                                    <a href="{{ URL::route('OfferEdit', array('id' => $entry->id)) }}">
                                                        <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <button type="button" id="btn-delete-offer-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-offer-id-{{ $entry->id }}"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>Nema novih ponuda</p>
                                @endif
                        </div>
                    </div>
                  </div>
                </div>

                <div class="row mt30">
                    <div class="col-md-6">
                        <div class="bg-white">
                            <header class="panel-heading">
                                <div class="row">
                                    <div class="col-md-9">
                                                Otpremnice
                                    </div>
                                    <div class="col-md-3 text-right">
                                         <a href="{{ URL::route('DispatchIndex') }}"><i class="fa fa-eye"></i> Sve otpremnice</a>
                                    </div>
                                </div>
                            </header>
                            <div class="panel-body table-responsive">
 
                                @if (count($dispatchentries) > 0)
                                    <table class="table table-hover wow fadeIn" id="order-list"  data-wow-duration="1s" data-wow-delay="1s">
                                        <thead>
                                            <tr>
                                                <th>Broj otpremnice</th>
                                                <th>Ime kupca</th>
                                                <th>Akcija</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dispatchentries as $entry)
                                            <tr>
                                                <td>{{ $entry->dispatch_number }}</td>
                                                <td>{{ $entry->first_name }} {{ $entry->last_name }} </td>
                                                <td> 
                                                    <a href="{{ URL::route('DispatchEdit', array('id' => $entry->id)) }}">
                                                        <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <button type="button" id="btn-delete-dispatch-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-dispatch-id-{{ $entry->id }}"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>Nema novih narudžbi</p>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                     <div class="bg-white">
                        <header class="panel-heading">
                               <div class="row">
                                    <div class="col-md-9">
                                                Radni nalozi
                                    </div>
                                    <div class="col-md-3 text-right">
                                         <a href="{{ URL::route('WorkingOrderIndex') }}"><i class="fa fa-eye"></i> Svi radni nalozi</a>
                                    </div>
                                </div>
                        </header>
                        <div class="panel-body table-responsive">
                               
                                @if (count($workingorderentries) > 0)
                                    <table class="table table-hover wow fadeIn" id="offer-list"  data-wow-duration="1s" data-wow-delay="1s">
                                        <thead>
                                            <tr>
                                                <th>Broj otpremnice</th>
                                                <th>Ime kupca</th>
                                                <th>Akcija</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($workingorderentries as $entry)
                                            <tr>
                                                <td>{{ $entry->workingorder_number }}</td>
                                                <td>{{ $entry->first_name }} {{ $entry->last_name }} </td>
                                                <td> 
                                                    <a href="{{ URL::route('DispatchEdit', array('id' => $entry->id)) }}">
                                                        <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <button type="button" id="btn-delete-workingorder-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-workingorder-id-{{ $entry->id }}"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>Nema novih radnih naloga</p>
                                @endif
                        </div>
                    </div>
                  </div>
                </div>
 
                <div class="row mt30">
                    <div class="col-md-6">
                        <div class="bg-white">
                            <header class="panel-heading">
                                <div class="row">
                                    <div class="col-md-9">
                                                Narudžbenice
                                    </div>
                                    <div class="col-md-3 text-right">
                                         <a href="{{ URL::route('NarudzbeniceIndex') }}"><i class="fa fa-eye"></i> Sve narudžbenice</a>
                                    </div>
                                </div>
                            </header>
                            <div class="panel-body table-responsive">
 
                                @if (count($narudzbeniceentries) > 0)
                                    <table class="table table-hover wow fadeIn" id="order-list"  data-wow-duration="1s" data-wow-delay="1s">
                                        <thead>
                                            <tr>
                                                <th>Broj narudžbenice</th>
                                                <th>Ime kupca</th>
                                                <th>Akcija</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($narudzbeniceentries as $entry)
                                            <tr>
                                                <td>{{ $entry->narudzbenica_number }}</td>
                                                <td>{{ $entry->first_name }} {{ $entry->last_name }} </td>
                                                <td> 
                                                    <a href="{{ URL::route('NarudzbeniceEdit', array('id' => $entry->id)) }}">
                                                        <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <button type="button" id="btn-delete-narudzbenica-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-narudzbenica-id-{{ $entry->id }}"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>Nema novih narudžbenica</p>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                     <div class="bg-white">
                        <header class="panel-heading">
                               <div class="row">
                                    <div class="col-md-9">
                                                Klijenti
                                    </div>
                                    <div class="col-md-3 text-right">
                                         <a href="{{ URL::route('WorkingOrderIndex') }}"><i class="fa fa-eye"></i> Svi klijenti</a>
                                    </div>
                                </div>
                        </header>
                        <div class="panel-body table-responsive">
                               
                                @if (count($cliententries) > 0)
                                    <table class="table table-hover wow fadeIn" id="offer-list"  data-wow-duration="1s" data-wow-delay="1s">
                                        <thead>
                                            <tr>
                                                <th>Naziv klijenta</th>
                                                <th>Akcija</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cliententries as $entry)
                                            <tr>
                                                <td>{{ $entry->first_name }} {{ $entry->last_name }} </td>
                                                <td> 
                                                    <a href="{{ URL::route('ClientEdit', array('id' => $entry->id)) }}">
                                                        <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <button type="button" id="btn-delete-client-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-client-id-{{ $entry->id }}"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>Nema novih radnih naloga</p>
                                @endif
                        </div>
                    </div>
                  </div>
                </div>


                @if (count($productsentries) > 0) 
                    @foreach($productsentries as $entry)
                    <!-- Modal {{ $entry->id }}-->
                    <div class="modal fade" id="delete-product-id-{{ $entry->id }}" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pozor!</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Želite li obrisati proizvod: {{$entry->title}} ?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ URL::route('ProductDestroy', array('id' => $entry->id)) }}">
                                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                                    </a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif 

                @if (count($invoicesentries) > 0) 
                    @foreach($invoicesentries as $entry)
                    <!-- Modal {{ $entry->id }}-->
                    <div class="modal fade" id="delete-invoice-id-{{ $entry->id }}" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pozor!</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Želite li obrisati račun:{{$entry->invoice_number}} ?</p>
                                </div>
                                <div class="modal-footer">
                                      <div class="row">
                                        <div class="col-md-7">
                                        </div>
                                        <div class="col-md-2">
                                            {{ Form::open(['method' => 'DELETE', 'route'=>['admin.clients.destroy', $entry->id]]) }}
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

                @if (count($ordersentries) > 0) 
                    @foreach($ordersentries as $entry)
                    <!-- Modal {{ $entry->id }}-->
                    <div class="modal fade" id="delete-order-id-{{ $entry->id }}" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pozor!</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Želite li obrisati narudžbu:{{$entry->order_id}} ?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ URL::route('OrderDestroy', array('id' => $entry->id)) }}">
                                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                                    </a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif 

                @if (count($offersentries) > 0) 
                    @foreach($offersentries as $entry)
                    <!-- Modal {{ $entry->id }}-->
                    <div class="modal fade" id="delete-offer-id-{{ $entry->id }}" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pozor!</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Želite li obrisati ponudu:{{$entry->offer_number}} ?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ URL::route('OfferDestroy', array('id' => $entry->id)) }}">
                                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                                    </a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif 

                @if (count($dispatchentries) > 0) 
                    @foreach($dispatchentries as $entry)
                    <!-- Modal {{ $entry->id }}-->
                    <div class="modal fade" id="delete-dispatch-id-{{ $entry->id }}" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pozor!</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Želite li obrisati otpremnicu:{{$entry->dispatch_number}} ?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ URL::route('DispatchDestroy', array('id' => $entry->id)) }}">
                                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                                    </a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif 

                @if (count($workingorderentries) > 0) 
                    @foreach($workingorderentries as $entry)
                    <!-- Modal {{ $entry->id }}-->
                    <div class="modal fade" id="delete-workingorder-id-{{ $entry->id }}" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pozor!</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Želite li obrisati radni nalog:{{$entry->workingorder_number}} ?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ URL::route('WorkingOrderDestroy', array('id' => $entry->id)) }}">
                                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                                    </a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif 

                @if (count($narudzbeniceentries) > 0) 
                    @foreach($narudzbeniceentries as $entry)
                    <!-- Modal {{ $entry->id }}-->
                    <div class="modal fade" id="delete-narudzbenica-id-{{ $entry->id }}" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Pozor!</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Želite li obrisati narudžbenicu:{{$entry->narudzbenica_number}} ?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ URL::route('NarudzbeniceDestroy', array('id' => $entry->id)) }}">
                                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                                    </a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif 

                @if (count($cliententries) > 0) 
                    @foreach($cliententries as $entry)
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
                                    <p>Želite li obrisati klijenta: {{$entry->first_name}} {{$entry->last_name}}?</p>
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
        new WOW().init();

        @if (count($productsentries) > 0) 
            @foreach($productsentries as $entry)
                $("#btn-delete-product-id-{{ $entry->id }}").click(function() { 
                    $('#delete-product-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

        @if (count($invoicesentries) > 0) 
            @foreach($invoicesentries as $entry)
                $("#btn-delete-invoice-id-{{ $entry->id }}").click(function() { 
                    $('#delete-invoice-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

        @if (count($ordersentries) > 0) 
            @foreach($ordersentries as $entry)
                $("#btn-delete-order-id-{{ $entry->id }}").click(function() { 
                    $('#delete-order-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

        @if (count($offersentries) > 0) 
            @foreach($offersentries as $entry)
                $("#btn-delete-offer-id-{{ $entry->id }}").click(function() { 
                    $('#delete-offer-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

        @if (count($dispatchentries) > 0) 
            @foreach($dispatchentries as $entry)
                $("#btn-delete-dispatch-id-{{ $entry->id }}").click(function() { 
                    $('#delete-dispatch-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

        @if (count($workingorderentries) > 0) 
            @foreach($workingorderentries as $entry)
                $("#btn-delete-workingorder-id-{{ $entry->id }}").click(function() { 
                    $('#delete-workingorder-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

        @if (count($narudzbeniceentries) > 0) 
            @foreach($narudzbeniceentries as $entry)
                $("#btn-delete-narudzbenica-id-{{ $entry->id }}").click(function() { 
                    $('#delete-narudzbenica-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

        @if (count($cliententries) > 0) 
            @foreach($cliententries as $entry)
                $("#btn-delete-client-id-{{ $entry->id }}").click(function() { 
                    $('#delete-client-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 
    });
</script>
