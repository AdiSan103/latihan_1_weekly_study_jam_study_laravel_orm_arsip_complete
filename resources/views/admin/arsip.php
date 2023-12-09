<!-- create -->
@foreach($categories as $item)
  <option selected value="{{$item->id}}">{{$item->judul}}</option>
@endforeach

<!-- update selecte sebelum validation -->
@if($item->id == $blog->id_category)
  <option selected value="{{$item->id}}">{{$item->judul}}</option>
@else
  <option value="{{$item->id}}">{{$item->judul}}</option>
@endif