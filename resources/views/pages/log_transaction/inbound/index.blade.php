@extends('layouts.web')

@section('title', 'Stockmate | Log Inbound')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Log Inbound Items</h1>

    <form method="post" action="#" enctype="multipart/form-data">
        <div class="form-group">
            <label for="itemName">Item Name</label>
            <input type="text" class="form-control" id="itemName" name="itemName">
        </div>
        <div class="form-group">
            <label for="itemName">Item Quantity</label>
            <input type="number" class="form-control" id="itemName" name="itemQuantity">
        </div>
        <div class="form-group">
            <label for="itemName">Item Expired Date</label>
            <input type="date" class="form-control" id="itemName" name="itemExpiredDate">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
