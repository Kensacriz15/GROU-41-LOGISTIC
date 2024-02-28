@extends('layouts.layoutMaster')

@section('content')
 <h1>Edit Inventory</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('app.inventories.update', $inventory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
