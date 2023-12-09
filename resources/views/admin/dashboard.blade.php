@extends('template')

@section('main')
<div class="container py-5">
  <h1>Tabel Blog</h1>
  <table class="table shadow p-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Judul</th>
        <th scope="col">Image</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <!-- https://laravel.com/docs/10.x/blade#loops -->
      <?php $i = 1; ?>
      @foreach( $items as $item)
      <tr>
        <th scope="row">{{$i++}}</th>
        <td>{{ $item->judul }}</td>
        <td>{{ $item->image }}</td>
        <td>{{ $item->description }}</td>
        <td>{{ $item->category->judul }}</td>
        <td>
          <a href="/update/{{$item->id}}" class="btn btn-primary">Update</a>
          <form action="/delete/action" method="POST">
            @csrf
            <input type="hidden" value="{{$item->id}}" name="id">
            <button type="submit" class="btn btn-danger" onclick="return confirm('yakin hapus?')">Delete</button>
          </form>
          <a href="/detail/{{$item->id}}" class="btn btn-outline-secondary">Detail</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection