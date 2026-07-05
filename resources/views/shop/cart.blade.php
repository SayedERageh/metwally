@extends('layouts.app')
@section('title', 'سلة المشتريات')

@section('content')
<div class="container py-5" dir="rtl">

    <h2 class="mb-4">سلة المشتريات</h2>

    {{-- حالة السلة الفاضية --}}
    <div id="cart-empty" class="text-center py-5" style="display: none;">
        <i class="fas fa-shopping-basket fa-4x text-muted opacity-25 mb-3"></i>
        <h5 class="text-muted">سلتك فاضية</h5>
        <a href="{{ route('products') }}" class="btn btn-warning mt-3">
            تسوق الآن
        </a>
    </div>

    {{-- المحتوى الرئيسي --}}
    <div id="cart-content" class="row g-4">

        {{-- عمود المنتجات --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">

                    <div class="px-4 py-3 border-bottom">
                        <span id="cart-count" class="text-muted small">0 منتجات في سلتك</span>
                    </div>

                    <div id="cart-items">
                        {{-- المنتجات هتتحط هنا بالـ JS --}}
                    </div>

                </div>
            </div>
        </div>

        {{-- عمود الملخص --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm sticky-top" style="top: 80px;">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">ملخص الطلب</h5>

                    <div id="cart-summary">
                        {{-- تفاصيل السعر هتتحط هنا --}}
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between fw-bold fs-5 mb-3">
                        <span>الإجمالي</span>
                        <span id="cart-total" class="text-warning">0 ج.م</span>
                    </div>

                    <a href="#" class="btn btn-warning w-100 fw-bold py-2">
                        إتمام الشراء
                        <i class="fas fa-arrow-left ms-1"></i>
                    </a>

                    <a href="{{ route('products') }}" class="btn btn-outline-secondary w-100 mt-2">
                        <i class="fas fa-arrow-right me-1"></i>
                        متابعة التسوق
                    </a>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@push('scripts')
<script>
const CSRF = document.querySelector('meta[name="csrf-token"]').content;

async function loadCart() {
    const res  = await fetch('/cart', { headers: { 'Accept': 'application/json' } });
    const data = await res.json();
    renderCart(data);
}

function renderCart(data) {
    const isEmpty  = data.cart.length === 0;

    document.getElementById('cart-empty').style.display   = isEmpty ? '' : 'none';
    document.getElementById('cart-content').style.display = isEmpty ? 'none' : '';

    if (isEmpty) return;

    // عدد المنتجات
    document.getElementById('cart-count').textContent = `${data.count} منتجات في سلتك`;

    // الإجمالي
    document.getElementById('cart-total').textContent =
        Number(data.total).toLocaleString('ar-EG') + ' ج.م';

    // المنتجات
    document.getElementById('cart-items').innerHTML = data.cart.map(item => `
        <div class="d-flex align-items-center gap-3 px-4 py-3 border-bottom" id="row-${item.id}">

            ${item.image
                ? `<img src="${item.image}" width="70" height="70"
                        class="rounded object-fit-cover border" alt="${item.name}">`
                : `<div class="bg-light rounded d-flex align-items-center
                        justify-content-center border" style="width:70px;height:70px;">
                        <i class="fas fa-image text-muted"></i>
                   </div>`
            }

            <div class="flex-grow-1">
                <p class="mb-1 fw-semibold">${item.name}</p>
                <p class="mb-0 text-warning fw-bold">
                    ${Number(item.price).toLocaleString('ar-EG')} ج.م
                </p>
            </div>

            <div class="d-flex align-items-center gap-2">
                <button onclick="cartAction('decrease', ${item.id})"
                        class="btn btn-sm btn-outline-secondary px-2">−</button>
                <span class="fw-bold px-1">${item.quantity}</span>
                <button onclick="cartAction('increase', ${item.id})"
                        class="btn btn-sm btn-outline-secondary px-2">+</button>
            </div>

            <button onclick="cartAction('remove', ${item.id})"
                    class="btn btn-sm btn-outline-danger">
                <i class="fas fa-trash-alt"></i>
            </button>

        </div>
    `).join('');

    // ملخص الأسعار
    document.getElementById('cart-summary').innerHTML = data.cart.map(item => `
        <div class="d-flex justify-content-between small text-muted mb-2">
            <span>${item.name} × ${item.quantity}</span>
            <span>${Number(item.price * item.quantity).toLocaleString('ar-EG')} ج.م</span>
        </div>
    `).join('');
}

async function cartAction(action, id) {
    const method = action === 'remove' ? 'DELETE' : 'POST';
    const res = await fetch(`/cart/${action}/${id}`, {
        method,
        headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' }
    });
    const data = await res.json();
    if (data.success) renderCart(data);
}

document.addEventListener('DOMContentLoaded', loadCart);
</script>
@endpush