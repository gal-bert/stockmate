@extends('layouts.web')

@section('title', 'Stockmate | Log Outbound')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Log Outbound Items</h1>

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                Transactions
            </div>

            <div class="card-body">
                <div class="col-md-4">
                    <label for="merchant">Buyer Merchant</label>
                    <select name="merchant" class="form-control drops" data-live-search = "true" id="merchant_list">
                        <option value="" disabled selected>-- choose merchant --</option>
                        @foreach ($merchants as $merchant)
                            <option value="{{$merchant->merchant_id}}">{{$merchant->merchant_name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <table class="table" id="products_table">
                    <thead>
                    <tr>
                        <th>SKU / Product Name</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="product0">
                        <td style="width: 33.4%">
                            <select name="products[]" class="form-control drops" data-live-search="true" id="product_list">
                                <option value="" disabled selected>-- choose product --</option>
                                @foreach ($products as $product)
                                    <option value="{{$product->product_id}}">{{$product->product_sku}} / {{$product->product_name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" name="quantities[]" class="form-control" required/>
                        </td>
                    </tr>
                    <tr id="product1"></tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-6">
                        <button id="add_row" class="btn btn-success">+ Add Row</button>
                    </div>
                    <div class="col-md-6" style="text-align: right">
                        <button id='delete_row' class="btn btn-danger"><i class="fa fa-trash"></i> Delete Row</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" onclick="return confirm('Are you sure all data is correct?')" class="btn btn-primary">Input Transaction</button>
    </form>

@endsection

@section('additional-js')

    <script>

        $('.drops').selectpicker();

        $(document).ready(function(){
            let row_number = 1;

            $("#add_row").click(function(e){
                e.preventDefault();
                let new_row_number = row_number - 1;
                $(".drops").selectpicker("destroy");
                $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
                $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
                $('.drops').selectpicker();
                row_number++;
            });

            $("#delete_row").click(function(e){
                e.preventDefault();
                if(row_number > 1){
                    $("#product" + (row_number - 1)).html('');
                    row_number--;
                }
            });
        });
    </script>
@endsection
