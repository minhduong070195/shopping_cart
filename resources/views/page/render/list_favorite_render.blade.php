<div id="change-list-favorite-product">
    <table>
        <thead>
        <tr>
            <th>Image</th>
            <th class="p-name">Product Name</th>
            <th>Price</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listFavorite as $item)
            @php
                $getCategoryName = isset(Illuminate\Support\Facades\Session::get('cart')->listCategoryName) ? Illuminate\Support\Facades\Session::get('cart')->listCategoryName : $getListCategoryName;
            @endphp
            <tr>
                <td class="cart-pic first-row"><img src="../assets/img/product_list/{{ $getCategoryName[$item->category_id] }}/{{ $item->image }}" alt="" style="width: 170px"></td>
                <td class="cart-title first-row">
                    <h5>{{ $item->name }}</h5>
                </td>
                <td class="p-price first-row">{{number_format($item->price)}} đ</td>
                <td class="qua-col first-row">
                    <div class="quantity">
                        <li class="btn btn-add-to-cart"><a onclick="addCart(1)" href="javascript:">Add Cart</a></li>
                    </div>
                </td>
                <td class="close-td first-row">
                    <li class="heart-icon">
                        <i class="fas fa-heart" id="favorites-product-{{$item->id}}" onclick="removeFavoriteItem({{ $item->id }})"></i>
                    </li>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>