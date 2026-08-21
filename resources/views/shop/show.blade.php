@extends('layouts.app')

@section('title', $product->name)

@section('content')

<div class="shop-product-page py-5" dir="rtl">

    <div class="container">

        <div class="product-breadcrumb mb-4">

            <a href="{{ route('home') }}">
                الرئيسية
            </a>

            <i class="bi bi-chevron-left"></i>

            <a href="{{ route('shop.index') }}">
                المنتجات
            </a>

            <i class="bi bi-chevron-left"></i>

            <span>
                {{ $product->name }}
            </span>

        </div>


        <div class="product-details-card">

            <div class="row g-5 align-items-start">


                <div class="col-lg-6">

                    <div class="product-gallery">

                        <div class="product-main-image">

                            @if($product->is_new)
                                <span class="show-product-badge new">
                                    جديد
                                </span>
                            @endif

                            @if($product->sale_price)
                                <span class="show-product-badge sale">
                                    عرض خاص
                                </span>
                            @endif


                            @if($product->images && count($product->images))

                                <img
                                    id="mainProductImage"
                                    src="{{ asset('uploads/'.$product->images[0]) }}"
                                    alt="{{ $product->name }}">

                            @else

                                <img
                                    id="mainProductImage"
                                    src="{{ asset('assets/img/no-image.png') }}"
                                    alt="{{ $product->name }}">

                            @endif

                        </div>


                        @if($product->images && count($product->images) > 1)

                            <div class="product-thumbnails">

                                @foreach($product->images as $image)

                                    <button
                                        type="button"
                                        class="product-thumbnail {{ $loop->first ? 'active' : '' }}"
                                        onclick="changeProductImage('{{ asset('uploads/'.$image) }}', this)">

                                        <img
                                            src="{{ asset('uploads/'.$image) }}"
                                            alt="{{ $product->name }}">

                                    </button>

                                @endforeach

                            </div>

                        @endif

                    </div>

                </div>


                <div class="col-lg-6">

                    <div class="product-info">

                        @if($product->category)

                            <a
                                href="{{ route('shop.index') }}"
                                class="show-product-category">

                                {{ $product->category->name }}

                            </a>

                        @endif


                        <h1 class="show-product-title">

                            {{ $product->name }}

                        </h1>


                        <div class="show-product-rating">

                            <span class="stars">
                                ★★★★★
                            </span>

                            <span>
                                تقييمات العملاء
                            </span>

                        </div>


                        <div class="show-product-price">

                            @if($product->sale_price)

                                <span class="sale-price">

                                    {{ number_format($product->sale_price,2) }}

                                    <small>
                                        ج.م
                                    </small>

                                </span>

                                <span class="original-price">

                                    {{ number_format($product->price,2) }}
                                    ج.م

                                </span>

                                @php
                                    $discount = $product->price > 0
                                        ? round((($product->price - $product->sale_price) / $product->price) * 100)
                                        : 0;
                                @endphp

                                @if($discount > 0)

                                    <span class="discount-percent">

                                        خصم {{ $discount }}%

                                    </span>

                                @endif

                            @else

                                <span class="sale-price">

                                    {{ number_format($product->price,2) }}

                                    <small>
                                        ج.م
                                    </small>

                                </span>

                            @endif

                        </div>


                        <div class="show-product-divider"></div>


                        @if($product->description)

                            <div class="show-product-description">

                                {!! nl2br(e($product->description)) !!}

                            </div>

                        @endif


                        <div class="product-stock">

                            @if($product->quantity > 0)

                                <i class="bi bi-check-circle-fill"></i>

                                متوفر في المخزون

                                <span>
                                    ({{ $product->quantity }} قطعة)
                                </span>

                            @else

                                <i class="bi bi-x-circle-fill"></i>

                                غير متوفر حاليًا

                            @endif

                        </div>


                        @if($product->branch)

                            <div class="product-branch">

                                <i class="bi bi-shop"></i>

                                متوفر في:

                                <strong>
                                    {{ $product->branch->name }}
                                </strong>

                            </div>

                        @endif


                        <div class="product-buy-area">

                            <div class="quantity-box">

                                <button
                                    type="button"
                                    onclick="changeQuantity(-1)">

                                    <i class="bi bi-dash"></i>

                                </button>

                                <input
                                    type="number"
                                    id="productQuantity"
                                    value="1"
                                    min="1"
                                    max="{{ max(1, $product->quantity) }}"
                                    readonly>

                                <button
                                    type="button"
                                    onclick="changeQuantity(1)">

                                    <i class="bi bi-plus"></i>

                                </button>

                            </div>


                           <button
                    type="button"
                    class="btn add-to-cart product-add-btn"
                    data-id="{{ $product->id }}">

                    <i class="bi bi-cart3"></i>
                    <span>أضف إلى السلة</span>

                </button>

                        </div>


                        <a
                            href="{{ route('checkout.index') }}"
                            class="buy-now-btn">

                            <i class="bi bi-lightning-charge-fill"></i>

                            شراء الآن

                        </a>


                        <div class="product-features">

                            <div class="product-feature">

                                <i class="bi bi-truck"></i>

                                <div>
                                    <strong>شحن سريع</strong>
                                    <span>توصيل لجميع المحافظات</span>
                                </div>

                            </div>


                            <div class="product-feature">

                                <i class="bi bi-shield-check"></i>

                                <div>
                                    <strong>منتجات أصلية</strong>
                                    <span>جودة نضمنها لك</span>
                                </div>

                            </div>


                            <div class="product-feature">

                                <i class="bi bi-headset"></i>

                                <div>
                                    <strong>دعم العملاء</strong>
                                    <span>نحن هنا لمساعدتك</span>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        @if($relatedProducts->count())

            <div class="related-products-section mt-5">

                <div class="section-heading">

                    <div>

                        <span>
                            اكتشف المزيد
                        </span>

                        <h2>
                            منتجات مشابهة
                        </h2>

                    </div>

                    <a href="{{ route('shop.index') }}">
                        عرض كل المنتجات
                        <i class="bi bi-arrow-left"></i>
                    </a>

                </div>


                <div class="row g-4">

                    @foreach($relatedProducts as $product)

                        @include('shop.partials.product-card')

                    @endforeach

                </div>

            </div>

        @endif

    </div>

</div>


<script>

function changeProductImage(image, button){

    document.getElementById('mainProductImage').src = image;

    document.querySelectorAll('.product-thumbnail')
        .forEach(item => item.classList.remove('active'));

    button.classList.add('active');

}

function changeQuantity(value){

    const input = document.getElementById('productQuantity');

    let quantity = parseInt(input.value) + value;

    const max = parseInt(input.max);

    if(quantity < 1) quantity = 1;

    if(quantity > max) quantity = max;

    input.value = quantity;

}

</script>

@endsection
<style>
    .shop-product-page{background:#f8f9fb;min-height:70vh}.product-breadcrumb{display:flex;align-items:center;gap:10px;color:#888;font-size:14px}.product-breadcrumb a{color:#555;text-decoration:none;font-weight:600}.product-breadcrumb a:hover{color:#0d6efd}.product-breadcrumb i{font-size:11px}.product-details-card{background:#fff;border-radius:28px;padding:35px;box-shadow:0 10px 40px rgba(0,0,0,.05);border:1px solid #eee}.product-gallery{position:sticky;top:100px}.product-main-image{height:520px;background:#f8f9fa;border-radius:24px;position:relative;overflow:hidden;display:flex;align-items:center;justify-content:center}.product-main-image img{width:100%;height:100%;object-fit:contain;transition:.3s}.show-product-badge{position:absolute;top:20px;right:20px;color:#fff;padding:8px 15px;border-radius:30px;font-size:13px;font-weight:700;z-index:2}.show-product-badge.new{background:#198754}.show-product-badge.sale{background:#dc3545;top:65px}.product-thumbnails{display:flex;gap:12px;margin-top:15px;overflow-x:auto;padding:3px}.product-thumbnail{width:82px;height:82px;min-width:82px;border:2px solid #eee;border-radius:14px;background:#fff;padding:4px;cursor:pointer;transition:.3s;overflow:hidden}.product-thumbnail img{width:100%;height:100%;object-fit:cover;border-radius:9px}.product-thumbnail:hover,.product-thumbnail.active{border-color:#0d6efd;box-shadow:0 5px 15px rgba(13,110,253,.15)}.show-product-category{display:inline-block;color:#0d6efd;text-decoration:none;background:#eef5ff;padding:7px 13px;border-radius:30px;font-size:13px;font-weight:700;margin-bottom:12px}.show-product-title{font-size:34px;font-weight:800;line-height:1.5;color:#222;margin:0 0 12px}.show-product-rating{display:flex;align-items:center;gap:10px;font-size:13px;color:#999}.stars{color:#ffc107;letter-spacing:2px;font-size:18px}.show-product-price{display:flex;align-items:center;gap:15px;flex-wrap:wrap;margin-top:25px}.sale-price{font-size:32px;font-weight:900;color:#0d6efd}.sale-price small{font-size:15px}.original-price{font-size:16px;color:#999;text-decoration:line-through}.discount-percent{background:#fff0f0;color:#dc3545;padding:6px 10px;border-radius:8px;font-size:12px;font-weight:800}.show-product-divider{height:1px;background:#eee;margin:25px 0}.show-product-description{font-size:15px;line-height:2;color:#666;margin-bottom:20px}.product-stock{display:flex;align-items:center;gap:7px;color:#198754;font-weight:700;font-size:14px;margin-bottom:10px}.product-stock i{font-size:18px}.product-stock span{color:#999;font-weight:500}.product-branch{display:flex;align-items:center;gap:8px;background:#f8f9fa;border-radius:12px;padding:12px 15px;font-size:14px;color:#666;margin:18px 0}.product-branch i{color:#0d6efd;font-size:18px}.product-buy-area{display:flex;gap:12px;margin-top:25px}.quantity-box{height:52px;display:flex;align-items:center;border:1px solid #ddd;border-radius:13px;overflow:hidden;background:#fff}.quantity-box button{width:45px;height:100%;border:0;background:#f8f9fa;font-size:20px;color:#333;cursor:pointer}.quantity-box button:hover{background:#0d6efd;color:#fff}.quantity-box input{width:50px;height:100%;border:0;text-align:center;font-size:16px;font-weight:800;outline:none}.show-add-cart{flex:1;border:0;border-radius:13px;background:#0d6efd;color:#fff;font-family:inherit;font-size:16px;font-weight:800;transition:.3s}.show-add-cart:hover{background:#0b5ed7;transform:translateY(-2px);box-shadow:0 10px 25px rgba(13,110,253,.25)}.buy-now-btn{height:52px;margin-top:12px;border-radius:13px;background:#212529;color:#fff;text-decoration:none;display:flex;align-items:center;justify-content:center;gap:8px;font-weight:800;transition:.3s}.buy-now-btn:hover{background:#000;color:#fff;transform:translateY(-2px)}.product-features{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-top:25px;padding-top:20px;border-top:1px solid #eee}.product-feature{display:flex;align-items:center;gap:9px}.product-feature>i{font-size:24px;color:#0d6efd}.product-feature strong{display:block;font-size:12px;color:#333}.product-feature span{display:block;font-size:10px;color:#999;margin-top:3px}.related-products-section{padding-top:15px}.section-heading{display:flex;align-items:end;justify-content:space-between;margin-bottom:25px}.section-heading span{font-size:13px;color:#0d6efd;font-weight:700}.section-heading h2{font-size:28px;font-weight:900;margin:5px 0 0}.section-heading a{color:#333;text-decoration:none;font-weight:700;font-size:14px}.section-heading a:hover{color:#0d6efd}@media(max-width:991px){.product-gallery{position:static}.product-main-image{height:450px}.show-product-title{font-size:28px}.product-details-card{padding:25px}}@media(max-width:575px){.product-details-card{padding:15px;border-radius:20px}.product-main-image{height:350px;border-radius:18px}.product-thumbnail{width:65px;height:65px;min-width:65px}.show-product-title{font-size:23px}.sale-price{font-size:27px}.product-buy-area{gap:8px}.quantity-box button{width:38px}.quantity-box input{width:42px}.show-add-cart{font-size:13px}.product-features{grid-template-columns:1fr}.section-heading{align-items:start;gap:15px;flex-direction:column}.section-heading h2{font-size:23px}}
</style>