@component('mail::message')
# Hi, {{ $order->name}} 
# We have sent you an email about your order infomation   
**Order CODE: {{ $order->code }}**    
**Bill**         

| Product | Image | Price | Quantity | Total |
|---------|:---------:|:---------:|:--------:|:---------:|
@foreach ($order->products as $product)
|{{ $product->name }}|![]({{ showProductImage($product->image) }} "{{ $product->name }}")|${{ $product->price }}| 10 | abc |
@endforeach

##CART TOTALS  
**Delivery: ${{ $order->delivery }}**       
**Discount: {{ $order->discount }}%**        
**Total: ${{ $order->total_price }}**     

**Address: {{ $order->address }}**   
**Payment: {{ $order->payment }}**  

If you have any problem, let send a feedback in this email or contact us in website <http://shopperfashion.com.vn>

@component('mail::button', ['url' => ''])
Check your order in website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
