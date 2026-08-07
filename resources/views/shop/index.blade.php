@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row mb-4">

        <div class="col-lg-6">

            <h2 class="fw-bold">

                جميع المنتجات

            </h2>

        </div>

        <div class="col-lg-6">

            <form>

                <input
                    type="search"
                    class="form-control"
                    placeholder="ابحث عن منتج...">

            </form>

        </div>

    </div>

    <div class="row g-4">

        @forelse($products as $product)

            @include('shop.partials.product-card')

        @empty

            <div class="col-12">

                <div class="alert alert-warning">

                    لا توجد منتجات

                </div>

            </div>

        @endforelse

    </div>

    <div class="mt-5">

        {{ $products->links() }}

    </div>

</div>

@endsection