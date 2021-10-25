<td align="right">
    <h4>đơn hàng</h4>
    <table border="1" cellpadding="0" cellspacing="0">
        <tr>
            <td>name</td>
            <td>phone</td>
            <td>address</td>
            <td>email</td>
            <td>totallfinal</td>
        </tr>
        <tr>
            <td>{{ $nameOrder }}</td>
            <td>{{ $phoneOrder }}</td>
            <td>{{ $addressOrder }}</td>
            <td>{{ $emailOrder }}</td>
            <td>{{ $toTalFinalCheckout }}</td>
        </tr>
    </table>
    <h4>sản phẩm</h4>
    <table border="1" cellpadding="0" cellspacing="0">
        <tr>
            <td>name</td>
            <td>price</td>
            <td>sale_off</td>
        </tr>
        <tr>
            @foreach ($order->products as $product)
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->sale_off }}</td>
            @endforeach
        </tr>
    </table>
</td>