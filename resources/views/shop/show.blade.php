@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row">

        <div class="col-lg-6">

            <img
                src="{{ asset('uploads/' . ($product->images[0] ?? 'no-image.png')) }}"
                class="img-fluid rounded shadow">

        </div>

        <div class="col-lg-6">

            <h2 class="fw-bold">
                {{ $product->name }}
            </h2>

            <hr>

            @if($product->sale_price)

                <h3 class="text-danger">

                    {{ number_format($product->sale_price,2) }} ج.م

                </h3>

                <del class="text-muted">

                    {{ number_format($product->price,2) }} ج.م

                </del>

            @else

                <h3>

                    {{ number_format($product->price,2) }} ج.م

                </h3>

            @endif

            <p class="mt-4">

                {{ $product->description }}

            </p>

            <div class="mt-4">

                <form action="{{ route('cart.add',$product->id) }}" method="POST">

                    @csrf

                    <button class="btn btn-primary btn-lg">

                        🛒 أضف إلى السلة

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection