@extends('template')

@section('main')
<div class="container">
  <!-- form : https://www.w3schools.com/tags/att_form_method.asp -->
  <form class="py-5" action="/update/action" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" value="{{$blog->id}}" name="id">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Judul</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul_baru" value="{{$blog->judul}}">
      <!-- https://laravel.com/docs/10.x/validation#working-with-error-messages -->
      @foreach ($errors->get('judul_baru') as $message)
        <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>          
      @endforeach
    </div>
    <!-- asset : https://laravel.com/docs/10.x/helpers#method-asset -->
    <img src="{{asset('/storage/blog/'.$blog->image)}}" alt="">
    <div class="mb-3">
      <label for="formFile" class="form-label">Masukkan Gambar</label>
      <input class="form-control" type="file" id="formFile" name="image_baru">
      <!-- https://laravel.com/docs/10.x/validation#working-with-error-messages -->
    </div>
    <div class="mb-3">
      <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description_baru">{{$blog->description}}</textarea>
        <label for="floatingTextarea2">Comments</label>
      </div>
      <!-- https://laravel.com/docs/10.x/validation#working-with-error-messages -->
      @foreach ($errors->get('description_baru') as $message)
        <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>          
      @endforeach
    </div>
    <select class="form-select" aria-label="Default select example" name="id_category_baru">

      
      @foreach($categories as $item)

      <!-- tahap2 start-->
        @if(old('id_category_baru'))
          @if(old('id_category_baru') == $item->id)
            <option selected value="{{$item->id}}">{{$item->judul}}</option>
          @else
          <!-- tahap-2 end -->

            <!-- tahap1 -->
            <option value="{{$item->id}}">{{$item->judul}}</option>

          <!-- tahap2 start-->
          @endif

        @else

          @if($item->id == $blog->id_category)
            <option selected value="{{$item->id}}">{{$item->judul}}</option>
          @else
            <option value="{{$item->id}}">{{$item->judul}}</option>
          @endif
          
        @endif
        <!-- tahap-2 end -->

      @endforeach
    </select>
    <!-- untuk aksi menambah/mengirim data wajib type submit -->
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
  </form>
</div>
@endsection