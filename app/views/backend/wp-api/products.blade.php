 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
     
   
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih proizvoda</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
                <th>Id</th>
                <th>Naslov</th>
                <th>Permalink</th>
                <th>Opis</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                 <tr> 
                    <td>{{ $entry->id }}</td>
                    <td class="col-md-1">{{ $entry->title }}</td>
                    <td class="col-md-1">{{ $entry->permalink }}</td>
                    <td>{{ $entry->short_description }}</td>
                    <td class="col-md-1">

                        <a href="{{ $entry->permalink }}" target="_blank">
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