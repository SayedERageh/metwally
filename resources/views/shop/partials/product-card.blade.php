<div class="col-lg-3 col-md-4 col-sm-6">

    <div class="card border-0 shadow-sm rounded-4 h-100">

        <a href="{{ route('shop.show',$product->id) }}">

            <img
                src="{{ asset('uploads/'.$product->images[0]) }}"
                class="card-img-top"
                style="height:250px;object-fit:cover;">

        </a>

        <div class="card-body">

            @if($product->is_new)

                <span class="badge bg-success mb-2">
                    جديد
                </span>

            @endif

            <h6 class="fw-bold">

                {{ $product->name }}

            </h6>

            @if($product->sale_price)

                <h5 class="text-danger">

                    {{ number_format($product->sale_price,2) }} ج.م

                </h5>

                <small>

                    <del>

                        {{ number_format($product->price,2) }}

                    </del>

                </small>

            @else

                <h5>

                    {{ number_format($product->price,2) }} ج.م

                </h5>

            @endif

        </div>

        <div class="card-footer bg-white border-0">
<button
    class="btn btn-primary w-100 add-to-cart"
    data-id="{{ $product->id }}">

    <i class="fas fa-shopping-cart"></i>

    أضف إلى السلة

</button>
            <a
                href="{{ route('shop.show',$product->id) }}"
                class="btn btn-outline-dark w-100">

                عرض المنتج

            </a>

        </div>

    </div>

</div>

<Script>
    function loadMiniCart(){

    fetch('/mini-cart')

    .then(res=>res.json())

    .then(data=>{

        console.log(data);

    });

}
</Script>