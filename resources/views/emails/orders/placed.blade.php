@component('mail::message')
# Order Placement

Dear **{{ $name }}**, we have received your order of of the following item(s) amounting to __Ksh {{ $invoice }}__. 

@component('mail::table')
| Item Name         | Quantity         | Price in KES   |
| ------------------|:-------------:| --------:|
@foreach ($products as $product)
|{{ $product->name }}|{{ $product->pivot->product_count}}| @ {{ $product->price }}      |
@endforeach
@endcomponent
We will notify you when on the details concerning how it is will be shipped.

<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
