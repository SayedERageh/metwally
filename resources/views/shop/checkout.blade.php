@extends('layouts.app')

@section('content')

<style>
    .checkout-page {
        background: #f7f8fa;
        min-height: 100vh;
    }

    .checkout-title {
        font-weight: 800;
        color: #1f2937;
    }

    .checkout-card {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 18px;
        padding: 28px;
        box-shadow: 0 8px 30px rgba(0,0,0,.04);
    }

    .section-title {
        font-size: 20px;
        font-weight: 800;
        margin-bottom: 22px;
        color: #222;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 8px;
        color: #374151;
    }

    .form-control,
    .form-select {
        min-height: 50px;
        border-radius: 10px;
        border: 1px solid #dee2e6;
        padding: 10px 14px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 .15rem rgba(13,110,253,.10);
    }

    textarea.form-control {
        min-height: 110px;
    }

    .payment-option {
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: .2s;
    }

    .payment-option:hover {
        border-color: #0d6efd;
        background: #f8fbff;
    }

    .payment-option input {
        margin-left: 8px;
    }

    .summary-card {
        position: sticky;
        top: 90px;
    }

    .product-row {
        padding: 15px 0;
        border-bottom: 1px solid #eee;
    }

    .product-name {
        font-weight: 600;
        color: #333;
    }

    .price {
        font-weight: 700;
        white-space: nowrap;
    }

    .total-box {
        background: #f8f9fa;
        border-radius: 14px;
        padding: 18px;
    }

    .grand-total {
        font-size: 25px;
        font-weight: 900;
        color: #0d6efd;
    }

    .checkout-btn {
        min-height: 55px;
        border-radius: 12px;
        font-size: 17px;
        font-weight: 800;
    }

    .required {
        color: #dc3545;
    }

    .payment-image-box {
        display: none;
        margin-top: 15px;
        padding: 15px;
        border-radius: 12px;
        background: #f8f9fa;
    }
</style>


<div class="checkout-page py-5" dir="rtl">

    <div class="container">

        <div class="mb-4">

            <h2 class="checkout-title mb-2">
                إتمام الطلب
            </h2>

            <p class="text-muted mb-0">
                أدخل بياناتك لإتمام عملية الشراء وتوصيل طلبك بسهولة.
            </p>

        </div>


        <form
            action="{{ route('checkout.store') }}"
            method="POST"
            enctype="multipart/form-data"
            id="checkoutForm"
        >

            @csrf


            <div class="row g-4">


                {{-- بيانات العميل --}}

                <div class="col-lg-7">

                    <div class="checkout-card">

                        <div class="section-title">
                            بيانات الشحن
                        </div>


                        <div class="row g-3">


                            <div class="col-md-6">

                                <label class="form-label">
                                    الاسم الأول
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="first_name"
                                    class="form-control"
                                    value="{{ old('first_name') }}"
                                    placeholder="مثال: أحمد"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    الاسم الأخير
                                </label>

                                <input
                                    type="text"
                                    name="last_name"
                                    class="form-control"
                                    value="{{ old('last_name') }}"
                                    placeholder="مثال: محمد"
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    رقم الهاتف
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="tel"
                                    name="phone"
                                    class="form-control"
                                    value="{{ old('phone') }}"
                                    placeholder="01xxxxxxxxx"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    البريد الإلكتروني
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email') }}"
                                    placeholder="example@email.com"
                                >

                            </div>


                            {{-- المحافظة --}}

                            <div class="col-md-6">

                                <label class="form-label">
                                    المحافظة
                                    <span class="required">*</span>
                                </label>

                                <select
                                    name="governorate"
                                    id="governorate"
                                    class="form-select"
                                    required
                                >

                                    <option value="">
                                        اختر المحافظة
                                    </option>

                                    @foreach($governorates as $governorate)

                                        <option
                                            value="{{ $governorate->id }}"
                                            data-shipping="{{ $governorate->shipping_price }}"
                                        >
                                            {{ $governorate->name }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- المدينة --}}

                            <div class="col-md-6">

                                <label class="form-label">
                                    المدينة / المركز
                                    <span class="required">*</span>
                                </label>

                                <select
                                    name="city"
                                    id="city"
                                    class="form-select"
                                    required
                                    disabled
                                >

                                    <option value="">
                                        اختر المحافظة أولاً
                                    </option>

                                </select>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    المنطقة / الحي
                                </label>

                                <input
                                    type="text"
                                    name="area"
                                    class="form-control"
                                    value="{{ old('area') }}"
                                    placeholder="مثال: شارع..."
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    الرمز البريدي
                                </label>

                                <input
                                    type="text"
                                    name="postal_code"
                                    class="form-control"
                                    value="{{ old('postal_code') }}"
                                    placeholder="اختياري"
                                >

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    العنوان بالتفصيل
                                    <span class="required">*</span>
                                </label>

                                <textarea
                                    name="address"
                                    class="form-control"
                                    placeholder="اكتب اسم الشارع ورقم العقار والشقة وأي تفاصيل تساعد المندوب على الوصول إليك"
                                    required
                                >{{ old('address') }}</textarea>

                            </div>


                        </div>


                        <hr class="my-4">


                        {{-- الدفع --}}

                        <div class="section-title">
                            طريقة الدفع
                        </div>


                        <label class="payment-option d-block">

                            <input
                                type="radio"
                                name="payment_method"
                                value="cash_on_delivery"
                                checked
                            >

                            <strong>
                                الدفع عند الاستلام
                            </strong>

                            <div class="text-muted small mt-1">
                                ادفع قيمة الطلب عند استلامه.
                            </div>

                        </label>


                        <label class="payment-option d-block">

                            <input
                                type="radio"
                                name="payment_method"
                                value="vodafone_cash"
                            >

                            <strong>
                                Vodafone Cash
                            </strong>

                            <div class="text-muted small mt-1">
                                قم بالتحويل ثم أرفق صورة التحويل.
                            </div>

                        </label>


                        <label class="payment-option d-block">

                            <input
                                type="radio"
                                name="payment_method"
                                value="instapay"
                            >

                            <strong>
                                InstaPay
                            </strong>

                            <div class="text-muted small mt-1">
                                قم بالتحويل ثم أرفق صورة التحويل.
                            </div>

                        </label>


                        <div
                            class="payment-image-box"
                            id="paymentImageBox"
                        >

                            <label class="form-label">
                                صورة إيصال التحويل
                            </label>

                            <input
                                type="file"
                                name="payment_image"
                                class="form-control"
                                accept="image/*"
                            >

                            <small class="text-muted">
                                JPG, PNG أو WEBP — الحد الأقصى 5MB
                            </small>

                        </div>


                        <button
                            type="submit"
                            class="btn btn-primary checkout-btn w-100 mt-4"
                            id="submitButton"
                        >

                            تأكيد وإتمام الطلب

                        </button>

                    </div>

                </div>


                {{-- ملخص الطلب --}}

                <div class="col-lg-5">

                    <div class="checkout-card summary-card">

                        <div class="section-title">
                            ملخص الطلب
                        </div>


                        @foreach($cartItems as $item)

                            <div class="product-row">

                                <div class="d-flex justify-content-between gap-3">

                                    <div>

                                        <div class="product-name">
                                            {{ $item['name'] }}
                                        </div>

                                        <div class="text-muted small mt-1">

                                            الكمية:
                                            {{ $item['quantity'] }}

                                        </div>

                                    </div>


                                    <div class="price">

                                        {{ number_format($item['price'] * $item['quantity'], 2) }}

                                        ج.م

                                    </div>

                                </div>

                            </div>

                        @endforeach


                        <div class="total-box mt-4">

                            <div class="d-flex justify-content-between mb-3">

                                <span>
                                    إجمالي المنتجات
                                </span>

                                <strong>

                                    {{ number_format($subtotal, 2) }}

                                    ج.م

                                </strong>

                            </div>


                            <div class="d-flex justify-content-between mb-3">

                                <span>
                                    تكلفة الشحن
                                </span>

                                <strong id="shippingPrice">
                                    0.00 ج.م
                                </strong>

                            </div>


                            <hr>


                            <div class="d-flex justify-content-between align-items-center">

                                <span>
                                    الإجمالي النهائي
                                </span>

                                <span
                                    class="grand-total"
                                    id="grandTotal"
                                    data-subtotal="{{ $subtotal }}"
                                >

                                    {{ number_format($subtotal, 2) }}

                                    ج.م

                                </span>

                            </div>

                        </div>


                        <div class="alert alert-light border mt-4 mb-0">

                            <small>

                                🔒 بياناتك يتم استخدامها فقط لتجهيز وشحن طلبك.

                            </small>

                        </div>

                    </div>

                </div>


            </div>

        </form>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const governorate = document.getElementById('governorate');
    const city = document.getElementById('city');

    const shippingPrice = document.getElementById('shippingPrice');
    const grandTotal = document.getElementById('grandTotal');

    const subtotal = Number(
        grandTotal.dataset.subtotal
    ) || 0;


    governorate.addEventListener('change', function () {

        const governorateId = this.value;

        const selectedOption =
            this.options[this.selectedIndex];

        const shipping =
            Number(
                selectedOption.dataset.shipping
            ) || 0;


        shippingPrice.innerHTML =
            shipping.toFixed(2) + ' ج.م';


        grandTotal.innerHTML =
            (subtotal + shipping).toFixed(2) + ' ج.م';


        city.innerHTML =
            '<option value="">جاري تحميل المدن...</option>';

        city.disabled = true;


        if (!governorateId) {

            city.innerHTML =
                '<option value="">اختر المحافظة أولاً</option>';

            return;
        }


        fetch(
            `/cities/${governorateId}`
        )
        .then(response => response.json())
        .then(cities => {

            city.innerHTML =
                '<option value="">اختر المدينة / المركز</option>';


            cities.forEach(item => {

                const option =
                    document.createElement('option');

                option.value = item.id;

                option.textContent = item.name;

                city.appendChild(option);

            });


            city.disabled = false;

        })
        .catch(error => {

            console.error(error);

            city.innerHTML =
                '<option value="">تعذر تحميل المدن</option>';

            city.disabled = true;

        });

    });


    const paymentMethods =
        document.querySelectorAll(
            'input[name="payment_method"]'
        );

    const paymentImageBox =
        document.getElementById(
            'paymentImageBox'
        );


    paymentMethods.forEach(method => {

        method.addEventListener('change', function () {

            if (
                this.value === 'vodafone_cash' ||
                this.value === 'instapay'
            ) {

                paymentImageBox.style.display =
                    'block';

            } else {

                paymentImageBox.style.display =
                    'none';

            }

        });

    });


    const form =
        document.getElementById(
            'checkoutForm'
        );

    const button =
        document.getElementById(
            'submitButton'
        );


    form.addEventListener('submit', function () {

        button.disabled = true;

        button.innerHTML =
            'جاري تأكيد الطلب...';

    });

});

</script>

@endsection