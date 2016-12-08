 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ URL::route('TrashIndex') }}">Pregled svih obrisanih sadržaja</a></li>
    
    
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih obrisanih sadržaja</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
            <?php $itemnumber = 1; ?>
            @foreach($items as $key=>$value) 
            <?php $itemnumber++; ?>
            <th>{{ $value }}</th>
            @endforeach
            </tr>
        </thead>
        <tbody>
        @foreach($entries as $key=>$value)
         <tr>
            @foreach($indexes as $index)
                @if($index == "full_name")
                <td>{{$value->first_name}} {{$value->last_name}}</td>
                @elseif ($index == "deleted_at")
                <td>{{ date('d. m. Y.', strtotime($value->deleted_at)) }}</td>
                @elseif ($index == "button")
                <td class="col-md-1">  
                    <a href="{{ URL::route('TrashRestore', array('id' => $value->id, 'trashed' => $trashed)) }}">
                        <button class="btn btn-success btn-xs"><i class="fa fa-undo"></i></button>
                    </a>
                </td>
                @elseif ($index == "image")
                <td>
                <img src="{{ url('/') }}/uploads/frontend/{{ $folder }}/thumbs/{{ $value->image }}" class="blog-post-image img-responsive" style="width:200px; height:100px;" />
                </td>
                @elseif ($index == "foldername")
                @else
                <td>{{$value->$index}}</td>
                @endif
            @endforeach
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@if (count($entries) > 0) 
    @foreach($entries as $entry)
    
    <div class="modal fade" id="delete-blog-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                @if($trashed != 'media')
                    <p>Želite li vratiti blog post: {{ $entry->title }}?</p>
                @endif
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('TrashRestore', array('id' => $entry->id, 'trashed' => $trashed)) }}">
                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif 

<div>{{$entries->links()}}</div>

    <script type="text/javascript">
    $(document).ready(function() {
        @if (count($entries) > 0) 
            @foreach($entries as $entry)
                $("#btn-delete-blog-id-{{ $entry->id }}").click(function() { 
                    $('#delete-blog-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 
       
    });
    </script>