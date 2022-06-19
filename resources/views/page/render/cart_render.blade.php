
@if(\Illuminate\Support\Facades\Session::has('cart') != null)
    <div id="change-item-cart">
        <div class="select-items">
            <table>
                <tbody>

                @foreach(Illuminate\Support\Facades\Session::get('cart')->products as $item)
                    @php
                        $getCategoryName = Illuminate\Support\Facades\Session::get('cart')->listCategoryName;
                    @endphp
                    <tr>
                        <td class="si-pic"><img src="../assets/img/product_list/{{ $getCategoryName[$item['productInfo']->category_id] }}/{{ $item['productInfo']->image }}" alt="" style="width: 70px"></td>
                        <td class="si-text">
                            <div class="product-selected">
                                <p>₫{{ number_format($item['productInfo']->price) }} x {{ $item['quantity'] }}</p>
                                <h6>{{ $item['productInfo']->name }}</h6>
                            </div>
                        </td>
                        <td class="si-close">
                            <i class="ti-close" data-id="{{ $item['productInfo']->id }}"></i>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="select-total">
            <span>total:</span>
            <h5>₫{{ number_format(Illuminate\Support\Facades\Session::get('cart')->totalPrice) }}</h5>
            <input type="number" hidden id="ip-total-quantity" value="{{ Illuminate\Support\Facades\Session::get('cart')->totalQuantity }}">
        </div>
    </div>
@else
    <input type="number" hidden id="ip-total-quantity" value="0">
@endif