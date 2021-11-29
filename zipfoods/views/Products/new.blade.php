@extends('templates/master')

@section('title')
    Add New Product
@endsection

@section('content')

    @if ($productSaved)
        <div class="alert alert-success">Thank you, the new product was added!</div>
    @endif

    @if ($app->errorsExist())
        <div class='alert alert-danger'>
            Please correct the errors below
        </div>
    @endif

    <form method='POST' id='product-add' action='/products/save-product'>
        <h3>Add New Product</h3>
        <div class='form-group'>
            <label for='name'>Name</label>
            <input type='text' class='form-control' name='name' id='name' value='{{ $app->old('name') }}'>
        </div>

        <div class='form-group'>
            <label for='sku'>Sku</label>
            <input type='text' class='form-control' name='sku' id='sku' value='{{ $app->old('sku') }}'>
        </div>

        <div class='form-group'>
            <label for='description'>Description</label>
            <textarea name='description' id='description' class='form-control'>{{ $app->old('description') }}</textarea>
            (Min: 10 characters)
        </div>

        <div class='form-group'>
            <label for='price'>Price</label>
            <input type='text' class='form-control' name='price' id='price' value='{{ $app->old('price') }}'>
        </div>

        <div class='form-group'>
            <label for='available'>Available</label>
            <input type='text' class='form-control' name='available' id='available' value='{{ $app->old('available') }}'>
        </div>

        <div class='form-group'>
            <label for='weight'>Weight</label>
            <input type='text' class='form-control' name='weight' id='weight' value='{{ $app->old('weight') }}'>
        </div>

        <div class='form-group'>
            <label for='perishable'>Perishable?</label>
            <input type='checkbox' class='form-check-input' name='perishable' id='perishable' {{ ($app->old("perishable") == true) ? "checked" : "" }}>
        </div>

        <button type='submit' class='btn btn-primary'>Add Product</button>
    </form>

    @if ($app->errorsExist())
        <ul class='error alert alert-danger'>
            @foreach ($app->errors() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <a href='/products' target="_blank">View all products &rarr;</a>
@endsection
