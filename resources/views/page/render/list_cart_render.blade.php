<div class="cart-table">
    <table>
        <thead>
        <tr>
            <th>Image</th>
            <th class="p-name">Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if(\Illuminate\Support\Facades\Session::has('cart') != null)
            @foreach(Illuminate\Support\Facades\Session::get('cart')->products as $item)
                @php
                    $getCategoryName = Illuminate\Support\Facades\Session::get('cart')->listCategoryName;
                @endphp
                <tr class="wrap-list-product">
                    <td class="cart-pic first-row"><img src="../assets/img/product_list/{{ $getCategoryName[$item['productInfo']->category_id] }}/{{ $item['productInfo']->image }}" alt="" style="width: 170px"></td>
                    <td class="cart-title first-row">
                        <p class="product_id" hidden data-value="{{$item['productInfo']->id}}"></p>
                        <h5>{{ $item['productInfo']->name }}</h5>
                    </td>
                    <td class="p-price first-row">{{number_format($item['productInfo']->price)}} đ</td>
                    <td class="qua-col first-row">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="{{ $item['quantity'] }}" id="quantity-item-{{$item['productInfo']->id}}">
                            </div>
                        </div>
                    </td>
                    <td class="total-price first-row">{{ number_format($item['productInfo']->price * $item['quantity']) }} đ</td>
                    <td class="close-td first-row">
                        <i class="ti-save" onclick="updateItemCart({{$item['productInfo']->id}})"></i>
                    </td>
                    <td class="close-td first-row">
                        <i class="ti-close" onclick="removeItem({{ $item['productInfo']->id }})"></i>
                    </td>
                </tr>
            @endforeach
            <input type="number" hidden id="ip-total-quantity" value="{{ Illuminate\Support\Facades\Session::get('cart')->totalQuantity }}">
        @else
            <input type="number" hidden id="ip-total-quantity" value="0">
        @endif


        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-lg-4 offset-lg-8">
        @php
            $totalQuantity = 0;
            $totalPrice = 0;
            if(\Illuminate\Support\Facades\Session::has('cart') != null){
                $totalQuantity = Illuminate\Support\Facades\Session::get('cart')->totalQuantity;
                $totalPrice = Illuminate\Support\Facades\Session::get('cart')->totalPrice;
            }
        @endphp
        <div class="proceed-checkout">
            <ul>
                <li class="subtotal">Total Quantity <span>{{ $totalQuantity }} </span></li>
                <li class="cart-total">Total Price <span>{{ number_format($totalPrice) }} vnd</span></li>
            </ul>
            <div class=" btn text-white ml-auto proceed-btn">CHECKOUT</div>
        </div>

    </div>
</div>