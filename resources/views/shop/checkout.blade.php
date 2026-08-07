@extends('layouts.app')

@section('content')


<div class="container py-5">

<div class="row">


<div class="col-lg-7">


<h3 class="mb-4">
بيانات الشحن
</h3>


<form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data">

@csrf


<div class="row">


<div class="col-md-6 mb-3">

<label>
الاسم الأول
</label>

<input type="text" 
name="first_name"
class="form-control"
required>

</div>


<div class="col-md-6 mb-3">

<label>
الاسم الأخير
</label>

<input type="text" 
name="last_name"
class="form-control">

</div>


</div>

<div class="mb-3">
    <label>المدينة</label>
    <input
        type="text"
        name="city"
        class="form-control"
        required>
</div>
<div class="mb-3">

<label>
رقم الهاتف
</label>

<input type="text"
name="phone"
class="form-control"
required>

</div>


<div class="mb-3">

<label>
البريد الإلكتروني
</label>

<input type="email"
name="email"
class="form-control">

</div>



<div class="row">


<div class="col-md-6 mb-3">

<label>
المحافظة
</label>


<select name="governorate"
id="governorate"
class="form-control"
required>


<option value="">
اختر المحافظة
</option>


@foreach($shippingRates as $rate)

<option value="{{ $rate->governorate }}"
data-price="{{ $rate->price }}">

{{ $rate->governorate }}

</option>

@endforeach


</select>

</div>



<div class="col-md-6 mb-3">

<label>
المنطقة
</label>

<input type="text"
name="area"
class="form-control">

</div>


</div>

<input type="hidden" 
name="shipping"
id="shipping_input"
value="0">

<div class="mb-3">

<label>
العنوان بالتفصيل
</label>

<textarea 
name="address"
class="form-control"
required></textarea>

</div>



<hr>


<h4>
طريقة الدفع
</h4>


<div class="form-check">

<input class="form-check-input"
type="radio"
name="payment_method"
value="cash_on_delivery"
checked>

<label>
الدفع عند الاستلام
</label>

</div>



<div class="form-check">

<input class="form-check-input"
type="radio"
name="payment_method"
value="vodafone_cash">

<label>
Vodafone Cash
</label>

</div>



<div class="form-check">

<input class="form-check-input"
type="radio"
name="payment_method"
value="instapay">

<label>
InstaPay
</label>

</div>



<div class="mt-3">

<label>
صورة التحويل (للدفع الإلكتروني)
</label>

<input type="file"
name="payment_image"
class="form-control">

</div>



<button class="btn btn-primary mt-4 w-100">

تأكيد الطلب

</button>



</form>


</div>




<div class="col-lg-5">


<div class="card p-4">


<h4>
ملخص الطلب
</h4>



@foreach($cartItems as $item)

<div class="d-flex justify-content-between mb-2">


<span>
{{ $item['name'] }}
×
{{ $item['quantity'] }}
</span>


<span>
{{ $item['price'] * $item['quantity'] }}
ج
</span>


</div>


@endforeach



<hr>


<div class="d-flex justify-content-between">

<strong>
الإجمالي:
</strong>


<strong>

{{ $subtotal }}

ج

</strong>


</div>


<div class="mt-3">

التوصيل:

<span id="shipping">
0
</span>

ج

</div>


</div>


</div>



</div>

</div>
<script>

document.getElementById('governorate')
.addEventListener('change', function(){

    let price = this.options[this.selectedIndex].dataset.price;


    document.getElementById('shipping').innerHTML = price;


    document.getElementById('shipping_input').value = price;


});


</script>

@endsection