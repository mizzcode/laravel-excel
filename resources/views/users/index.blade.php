@extends('layouts.main')

@section('container')
<div class="card m-5">
    <div class="card-header">
          <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#importModal">
        Import Users Excel
    </button>
        
    <a href="{{ route('export') }}" class="btn btn-success">Export Excel</a>

    </div>
    <div class="card-body">
        <table class="table table-success table-striped text-center table-bordered">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
          </table>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="importModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Import Excel</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="formFile" class="form-label">Import Your Data Users Excel</label>
                <input class="form-control" type="file" id="formFile" name="excel">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection