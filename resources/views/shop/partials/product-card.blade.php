<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
    <div class="product-card h-100">

        <div class="product-image-wrapper">

            <a href="{{ route('shop.show',$product->id) }}" class="product-image-link">

                @if($product->images && isset($product->images[0]))
                    <img src="{{ asset('uploads/'.$product->images[0]) }}"
                         alt="{{ $product->name }}"
                         class="product-image">
                @else
                    <img src="{{ asset('assets/img/no-image.png') }}"
                         alt="{{ $product->name }}"
                         class="product-image">
                @endif

            </a>

            <div class="product-badges">

                @if($product->is_new)
                    <span class="product-badge new">جديد</span>
                @endif

                @if($product->sale_price)
                    <span class="product-badge sale">خصم</span>
                @endif

            </div>

            <button class="product-quick-view"
                    type="button"
                    onclick="window.location.href='{{ route('shop.show',$product->id) }}'">
                <i class="bi bi-eye"></i>
            </button>

        </div>

        <div class="product-card-body">

            @if($product->category)
                <div class="product-category">
                    {{ $product->category->name }}
                </div>
            @endif

            <h5 class="product-title">
                <a href="{{ route('shop.show',$product->id) }}">
                    {{ $product->name }}
                </a>
            </h5>

            <div class="product-price">

                @if($product->sale_price)

                    <span class="current-price">
                        {{ number_format($product->sale_price,2) }}
                        <small>ج.م</small>
                    </span>

                    <span class="old-price">
                        {{ number_format($product->price,2) }}
                        ج.م
                    </span>

                @else

                    <span class="current-price">
                        {{ number_format($product->price,2) }}
                        <small>ج.م</small>
                    </span>

                @endif

            </div>

            <div class="product-actions">

                <button
                    type="button"
                    class="btn add-to-cart product-add-btn"
                    data-id="{{ $product->id }}">

                    <i class="bi bi-cart3"></i>
                    <span>أضف إلى السلة</span>

                </button>

                <a href="{{ route('shop.show',$product->id) }}"
                   class="product-details-btn">

                    <i class="bi bi-arrow-left"></i>

                </a>

            </div>

        </div>

    </div>
</div>
<style>
    .product-card{position:relative;background:#fff;border:1px solid #eee;border-radius:22px;overflow:hidden;height:100%;transition:.35s ease;box-shadow:0 5px 20px rgba(0,0,0,.04)}.product-card:hover{transform:translateY(-7px);box-shadow:0 18px 45px rgba(0,0,0,.11);border-color:#e5e5e5}.product-image-wrapper{position:relative;background:#f8f9fa;height:270px;overflow:hidden}.product-image-link{display:block;width:100%;height:100%}.product-image{width:100%;height:100%;object-fit:cover;transition:.5s ease}.product-card:hover .product-image{transform:scale(1.07)}.product-badges{position:absolute;top:14px;right:14px;display:flex;flex-direction:column;gap:7px;z-index:2}.product-badge{padding:6px 12px;border-radius:30px;color:#fff;font-size:12px;font-weight:700;box-shadow:0 4px 12px rgba(0,0,0,.12)}.product-badge.new{background:#198754}.product-badge.sale{background:#dc3545}.product-quick-view{position:absolute;top:14px;left:14px;width:40px;height:40px;border:0;border-radius:50%;background:#fff;color:#333;display:flex;align-items:center;justify-content:center;font-size:18px;box-shadow:0 5px 15px rgba(0,0,0,.12);opacity:0;transform:translateY(-8px);transition:.3s;z-index:3}.product-card:hover .product-quick-view{opacity:1;transform:translateY(0)}.product-quick-view:hover{background:#0d6efd;color:#fff}.product-card-body{padding:20px}.product-category{font-size:12px;color:#0d6efd;font-weight:600;margin-bottom:7px}.product-title{font-size:17px;font-weight:800;line-height:1.6;margin:0 0 12px;min-height:54px}.product-title a{color:#222;text-decoration:none;transition:.25s}.product-title a:hover{color:#0d6efd}.product-price{display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-bottom:18px}.current-price{font-size:19px;font-weight:800;color:#0d6efd}.current-price small{font-size:11px;font-weight:600}.old-price{font-size:13px;color:#999;text-decoration:line-through}.product-actions{display:flex;align-items:center;gap:8px}.product-add-btn{flex:1;border:0;background:#0d6efd;color:#fff;border-radius:12px;padding:11px 10px;font-family:inherit;font-weight:700;font-size:14px;display:flex;align-items:center;justify-content:center;gap:7px;transition:.3s}.product-add-btn:hover{background:#0b5ed7;color:#fff;transform:translateY(-2px);box-shadow:0 8px 18px rgba(13,110,253,.25)}.product-details-btn{width:45px;height:45px;border:1px solid #e5e5e5;border-radius:12px;display:flex;align-items:center;justify-content:center;color:#333;text-decoration:none;font-size:18px;transition:.3s}.product-details-btn:hover{background:#0d6efd;color:#fff;border-color:#0d6efd}.product-image-wrapper:after{content:"";position:absolute;inset:0;background:linear-gradient(to bottom,rgba(0,0,0,.03),transparent 35%,rgba(0,0,0,.04));pointer-events:none}@media(max-width:575px){.product-image-wrapper{height:220px}.product-card-body{padding:15px}.product-title{font-size:15px;min-height:48px}.current-price{font-size:17px}.product-add-btn{font-size:13px}.product-add-btn span{display:none}.product-quick-view{opacity:1;transform:none}} 
</style>