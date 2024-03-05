@extends('layouts/layoutMaster')

@section('content')
  <div class="card"> 
    <div class="card-header">
      <h1>Public Biddings</h1>
    </div>
    <div class="card-body">
      <div class="input-group mb-3"> 
        <input type="text" class="form-control" placeholder="Search biddings..." id="biddingSearch">
        <button class="btn btn-primary" type="button">Search</button>
      </div>

      <table class="table mt-3">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($biddings as $bidding)
          <tr>
            <td>{{ $bidding->id }}</td>
            <td>{{ $bidding->product->name }}</td>
            <td>{{ $bidding->start_date }}</td>
            <td>{{ $bidding->end_date }}</td>
            <td>
              <a href="{{ route('app.biddings.show', $bidding->id) }}" class="btn btn-sm btn-primary">View</a>
              <a href="{{ route('app.biddings.edit', $bidding->id) }}" class="btn btn-sm btn-secondary">Edit</a>
              <form action="{{ route('app.biddings.destroy', $bidding->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this bidding?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>

      <div style="text-align: center; margin: 20px;">
        <a href="{{ route('app.biddings.create') }}" class="btn btn-primary">Create Bidding</a>
      </div>
      <div style="text-align: center; margin: 20px;">
        <a href="{{ route('app.products.index') }}" class="btn btn-warning">List a Product</a>
      </div>
    </div>
  </div>
@endsection
