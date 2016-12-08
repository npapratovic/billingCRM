 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
     
   
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih kupaca</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="customers-list">
        <thead>
            <tr>
                <th>id</th>
                <th>email</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>created_at</th>
            </tr>
        </thead>
        <tbody>
             @if (count($customers) > 0) 
                @foreach($customers as $entry)
                 <tr> 
                    <td>{{ $entry->id }}</td>
                    <td class="col-md-1">{{ $entry->email }}</td>
                    <td class="col-md-1">{{ $entry->first_name }}</td>
                    <td>{{ $entry->last_name }}</td>
                    <td>{{ $entry->created_at }}</td>

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