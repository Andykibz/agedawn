@component('mail::message')
# New Order

A new order amounting to **KES {{ $invoice }}** has been placed by **{{ $name }}** on _{{ date("jS M Y", $date) }}_ at *{{ date("H:i ", $date) }} Hs*

@component('mail::table')
| Item Name   | Quantity      | Price in KES |
|:------------|:-------------:| --------:|
@foreach ($products as $product)
|{{ $product->name }}|{{ $product->pivot->product_count}}| @ {{ $product->price }}      |
@endforeach
@endcomponent



**Email**       : {{ $email }}<br>
**Location**    : {{ $location }}<br>
**Phone**       : {{ $phone }}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
