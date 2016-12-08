<html>
Poštovani {{$first_name}} {{$last_name}}, šaljemo vam narudžbenicu broj {{$number}} u elektronskom obliku.
@if($comment != '')
<br>
<br>
<br>Dodatni komentar:
<br>{{$comment}}
@else

@endif
</html>