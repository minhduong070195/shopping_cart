@foreach($orderToPay as $orders)
    <div class="wrap-order border border-secondary">
        @foreach($orders as $item)
            <div class="row" style="margin-top: 5px">
                <div class="cart-pic first-row col-md-3 align-self-center">
                    <img src="../assets/img/product_list/{{ $getCategoryName[$item['category_id']] }}/{{ \App\Models\Product::getProductById($item['product_id'])['image'] }}" alt="" style="width: 130px">
                </div>
                <div class="cart-title first-row col-md-3 align-self-center">
                    <h5>{{ \App\Models\Product::getProductById($item['product_id'])['name'] }}</h5>
                </div>
                <div class="p-price first-row col-md-3 align-self-center">{{number_format(\App\Models\Product::getProductById($item['product_id'])['price'])}} đ</div>
                <div class="qua-col first-row col-md-3 align-self-center">
                    <div class="quantity">
                        <div class="btn btn-add-to-cart"><a onclick="addCart({{ $item['product_id'] }})" href="javascript:">Repurchase</a></div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endforeach