@extends('layouts.app')

@section('title', 'المنتجات')

@section('content')

<main class="main">

<section id="products" class="services section" dir="rtl">

    <!-- TITLE -->
    <div class="container section-title" data-aos="fade-up">
        <h2>المنتجات</h2>
        <p>تصفح منتجاتنا حسب القسم</p>
    </div>

    <!-- CATEGORIES -->
    <div class="container mb-5 text-center" data-aos="fade-up">

        <a href="{{ route('products') }}"
           class="btn m-1 {{ !request('category') ? 'btn-primary' : 'btn-outline-primary' }}">
            الكل
        </a>

        @foreach($categories as $category)

            <a href="{{ route('products', ['category' => $category->id]) }}"
               class="btn m-1 {{ request('category') == $category->id ? 'btn-primary' : 'btn-outline-primary' }}">
                {{ $category->name }}
            </a>

        @endforeach

    </div>

    <!-- PRODUCTS -->
    <div class="container">

        <div class="row gy-4">

            @forelse($products as $product)

                <div class="col-lg-3 col-md-6">

                    <div class="card h-100 shadow-sm">

                     @if(!empty($product->images))
    <img src="{{ asset('uploads/' . $product->images[0]) }}"
         class="card-img-top"
         style="height:250px;object-fit:cover;"
         alt="{{ $product->name }}">
@endif

                        <div class="card-body text-center">

                            <h5>{{ $product->name }}</h5>

                            <h6 class="text-success">
                                {{ number_format($product->price,2) }} جنيه
                            </h6>

                            <a href="{{ route('product.details', $product->id) }}"
                               class="btn btn-primary mt-2">
                                عرض التفاصيل
                            </a>
<button onclick="addToCart(
{{ $product->id }},
'{{ $product->name }}',
{{ $product->price }}
)"
class="btn btn-warning fw-bold w-100">

<i class="fas fa-cart-plus"></i>
أضف للسلة

</button>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">
                    <h4 class="text-muted">
                        لا توجد منتجات حالياً
                    </h4>
                </div>

            @endforelse

        </div>

    </div>

</section>

</main>
<!-- Modal Cart -->
<div class="modal fade" id="cartModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" dir="rtl">

            <div class="modal-header">
                <h5 class="modal-title">سلة المشتريات</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div id="cart-items"></div>
            </div>

            <div class="modal-footer">
                <button onclick="clearCart()" class="btn btn-danger">
                    حذف السلة
                </button>

                <button onclick="sendWhatsApp()" class="btn btn-success">
                    إرسال الطلب واتساب
                </button>
            </div>

        </div>
    </div>
</div>

<script>

let cart = JSON.parse(localStorage.getItem('cart')) || {};

function addToCart(id, name, price)
{
    if(cart[id])
    {
        cart[id].qty++;
    }
    else
    {
        cart[id] = {
            id: id,
            name: name,
            price: price,
            qty: 1
        };
    }

    localStorage.setItem('cart', JSON.stringify(cart));

    updateCartCount();

    Swal.fire({
        icon: 'success',
        title: 'تمت الإضافة',
        text: 'تم إضافة المنتج للسلة',
        timer: 1200,
        showConfirmButton: false
    });
}

function updateCartCount()
{
    let total = 0;

    Object.values(cart).forEach(item => {
        total += item.qty;
    });

    const counter = document.getElementById('cart-count');

    if(counter)
    {
        counter.innerText = total;
    }
}

function openCart()
{
    let html = '';

    let totalPrice = 0;

    if(Object.keys(cart).length === 0)
    {
        html = '<p class="text-center">السلة فارغة</p>';
    }
    else
    {
        Object.values(cart).forEach(item => {

            let itemTotal = item.price * item.qty;

            totalPrice += itemTotal;

            html += `
                <div class="border rounded p-2 mb-2">

                    <strong>${item.name}</strong>

                    <br>

                    الكمية: ${item.qty}

                    <br>

                    السعر: ${item.price} جنيه

                    <br>

                    الإجمالي: ${itemTotal} جنيه

                </div>
            `;
        });

        html += `
            <div class="alert alert-success mt-3">
                إجمالي الطلب: ${totalPrice} جنيه
            </div>
        `;
    }

    document.getElementById('cart-items').innerHTML = html;

    new bootstrap.Modal(
        document.getElementById('cartModal')
    ).show();
}

function clearCart()
{
    localStorage.removeItem('cart');

    cart = {};

    updateCartCount();

    document.getElementById('cart-items').innerHTML =
        '<p class="text-center">السلة فارغة</p>';
}

function sendWhatsApp()
{
    if(Object.keys(cart).length === 0)
    {
        alert('السلة فارغة');
        return;
    }

    let text = "🛒 طلب جديد:%0A%0A";

    let total = 0;

    Object.values(cart).forEach(item => {

        let itemTotal = item.price * item.qty;

        total += itemTotal;

        text +=
        "📦 " + item.name +
        "%0Aالكمية: " + item.qty +
        "%0Aالسعر: " + item.price +
        "%0A--------------------%0A";

    });

    text += "%0A💰 الإجمالي: " + total + " جنيه";

    let phone = "201044946388";

    window.open(
        "https://wa.me/" + phone + "?text=" + text,
        "_blank"
    );
}

document.addEventListener('DOMContentLoaded', function()
{
    updateCartCount();
});

</script>
@endsection