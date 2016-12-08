 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
     
   
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih narudžbi</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="orders-list">
        <thead>
            <tr>
                <th>order_number</th>
                <th>status</th>
                <th>total</th>
                <th>shipping_methods</th>
                <th>created_at</th>
                <th>view_order_url</th>

            </tr>
        </thead>
        <tbody>
             @if (count($orders) > 0) 
                @foreach($orders as $entry)
                 <tr> 
                    <td>{{ $entry->order_number }}</td>
                    <td class="col-md-1">{{ $entry->status }}</td>
                    <td class="col-md-1">{{ $entry->total }}</td>
                    <td>{{ $entry->shipping_methods }}</td>
                    <td>{{ $entry->created_at }}</td>
                    <td class="col-md-1"> 
                        <a href="{{ $entry->view_order_url }}" target="_blank">
                            <button class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button>
                        </a> 
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<div class="text-center"> </div>
 


    <script type="text/javascript">
    $(document).ready(function() {
        
    });
    </script>