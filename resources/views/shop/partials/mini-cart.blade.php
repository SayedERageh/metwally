@if(count($cartItems))

    @foreach($cartItems as $item)

        <div class="cart-item">

            <img
                src="{{ asset('uploads/'.$item['image']) }}"
                alt="{{ $item['name'] }}">

            <div class="cart-item-info">

                <div class="cart-item-title">

                    {{ $item['name'] }}

                </div>

                <div class="cart-price">

                    {{ number_format($item['price'],2) }} ج.م

                </div>

                <div class="d-flex align-items-center gap-2 mt-2">

                    <form action="{{ route('cart.decrease',$item['id']) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-light">-</button>
                    </form>

                    <strong>{{ $item['quantity'] }}</strong>

                    <form action="{{ route('cart.increase',$item['id']) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-light">+</button>
                    </form>

                    <form action="{{ route('cart.remove',$item['id']) }}"
                          method="POST"
                          class="ms-auto">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger">

                            <i class="fas fa-trash"></i>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    @endforeach

@else

<div class="text-center py-5">

    <i class="fas fa-shopping-cart fa-3x text-secondary mb-3"></i>

    <h5>السلة فارغة</h5>

    <small class="text-muted">

        لم تقم بإضافة أي منتجات بعد

    </small>

</div>

@endif