@extends('layouts.app')

@section('title', $product->name)

@section('content')

<main class="main" dir="rtl">

<div class="container py-5">

    <div class="row">

        <!-- الصور -->
        <div class="col-md-6">

            @if(!empty($product->images))

                <img src="{{ asset('uploads/' . $product->images[0]) }}"
                     class="img-fluid rounded shadow"
                     alt="{{ $product->name }}">

            @endif

        </div>

        <!-- البيانات -->
        <div class="col-md-6">

            <h2 class="mb-3">
                {{ $product->name }}
            </h2>

            <p>
                <strong>القسم:</strong>
                {{ $product->category?->name }}
            </p>

            <h4 class="text-success mb-3">
                {{ number_format($product->price,2) }} جنيه
            </h4>

            @if($product->quantity > 0)

                <span class="badge bg-success">
                    متوفر بالمخزون
                </span>

            @else

                <span class="badge bg-danger">
                    غير متوفر
                </span>

            @endif

            <hr>

            <div class="mt-4">
                {!! $product->description !!}
            </div>

            <div class="mt-4">

             <form action="{{ route('cart.add',$product->id) }}" method="POST">
    @csrf
<button
    type="button"
    class="btn btn-warning btn-lg add-to-cart"
    data-id="{{ $product->id }}">

    <i class="fas fa-shopping-cart"></i>
    إضافة للسلة

</button>
</form>
            </div>

        </div>

    </div>

</div>

</main>

@endsection