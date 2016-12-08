<html>
Poštovani {{$first_name}} {{$last_name}}, šaljemo vam radni nalog broj {{$number}} u elektronskom obliku.
@if($comment != '')
<br>
<br>
<br>Dodatni komentar:
<br>{{$comment}}
@else

@endif
</html>