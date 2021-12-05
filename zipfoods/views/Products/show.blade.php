@extends('templates/master')

@section('title')
    {{ $product['name'] }}
@endsection

@section('content')

    @if ($reviewSaved)
        <div test="review-confirmation" class="alert alert-success">Thank you, your review was submitted!</div>
    @endif

    @if ($app->errorsExist())
        <div class='alert alert-danger'>
            Please correct the errors below
        </div>
    @endif

    <div id='product-show'>
        <h2>{{ $product['name'] }}</h2>

        <img src='/images/products/{{ $product['sku'] }}.jpg' class='product-thumb'>

        <p class='product-description'>
            {{ $product['description'] }}
        </p>

        <div class='product-price'>${{ $product['price'] }}</div>
    </div>

    <form method='POST' id='product-review' action='/products/save-review'>
        <h3>Review {{ $product['name'] }}</h3>
        <input type='hidden' name='product_id' value='{{ $product['id'] }}'>
        <input type='hidden' name='sku' value='{{ $product['sku'] }}'>
        <div class='form-group'>
            <label for='name'>Name</label>
            <input test="reviewer-name-input" type='text' class='form-control' name='name' id='name' value='{{ $app->old('name') }}'>
        </div>

        <div class='form-group'>
            <label for='review'>Review</label>
            <textarea test="review-textarea" name='review' id='review' class='form-control'>{{ $app->old('review') }}</textarea>
            (Min: 200 characters)
        </div>

        <button test="review-submit-button" type='submit' class='btn btn-primary'>Submit Review</button>
    </form>

    @if ($app->errorsExist())
        <ul class='error alert alert-danger'>
            @foreach ($app->errors() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <h3>Product Reviews</h3>
    <div id='reviews' class="reviews">
        @if (empty($reviews) != true)
            @foreach ($reviews as $review)
                <div test="review-name" class='review-name'>By: {{ $review['name'] }}</div>
                <div test="review-content">{{ $review['review'] }}</div>
                <div class='review-submitted-date'>Date: {{ $review['submitted_date'] }}</div>
                <hr>
            @endforeach
        @else
            <div class="center">No product reviews available yet.</div>      
        @endif
    </div>

    <a href='/products'>&larr; Return to all products</a>
@endsection
