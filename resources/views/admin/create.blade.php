@extends('template')

@section('main')
<div class="container">
  <!-- form : https://www.w3schools.com/tags/att_form_method.asp -->
  <!-- form for input file :  https://www.w3schools.com/php/php_file_upload.asp -->
  <form class="py-5" action="/create/action" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Judul</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul" value="{{old('judul')}}">
      
      <!-- https://laravel.com/docs/10.x/validation#working-with-error-messages -->
      @foreach ($errors->get('judul') as $message)
        <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>          
      @endforeach

    </div>
    <!-- <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Image</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="image"> 
      <div id="emailHelp" class="form-text">Test information</div>
    </div> -->

    <div class="mb-3">
      <label for="formFile" class="form-label">Masukkan Gambar</label>
      <input class="form-control" type="file" id="formFile" name="image">
      @foreach ($errors->get('image') as $message)
        <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>          
      @endforeach
    </div>

    <div class="mb-3">
      <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description">{{old('description')}}</textarea>
        <label for="floatingTextarea2">Comments</label>
      </div>
      @foreach ($errors->get('description') as $message)
        <div id="emailHelp" class="form-text text-danger">{{ $message}}</div>          
      @endforeach
    </div>
    <select class="form-select" aria-label="Default select example" name="id_category">
      @foreach($categories as $item)

      <!-- tahap2 start-->
        @if(old('id_category'))
          @if(old('id_category') == $item->id)
            <option selected value="{{$item->id}}">{{$item->judul}}</option>
          @else
          <!-- tahap-2 end -->

            <!-- tahap1 -->
            <option value="{{$item->id}}">{{$item->judul}}</option>

          <!-- tahap2 start-->
          @endif

        @else

          <option value="{{$item->id}}">{{$item->judul}}</option>
          
        @endif
        <!-- tahap-2 end -->

      @endforeach
    </select>
    <!-- untuk aksi menambah/mengirim data wajib type submit -->
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
  </form>
</div>
@endsection