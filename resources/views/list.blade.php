@foreach($items as $item)
<iframe  src="/upload/{{$item->fichier}}" style="width:100%;height:100%;"></iframe>
@endforeach