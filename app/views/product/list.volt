{{ content() }}
{{ flash.output() }}
{{ flashSession.output() }}
<a href="{{ addUrl }}">Add new product</a>
<br>
<a href="{{ cartUrl }}">Cart</a>
<h3>Products</h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th width="100">Price</th>
            <th colspan="3" width="300">...</th>
        </tr>
    </thead>
    <tbody>
    {% for product in products %}
        <tr>
            <td>
                {{ product['entity'].getId() }}
            </td>
            <td>
                {{ product['entity'].getTitle() }}
            </td>
            <td width="100" style="text-align: center">
                {{ product['entity'].getPrice() }}
            </td>
            <td>
                {{ form('action': 'product/delete/')}}
                {{ product['deleteForm'].render('id') }}
                {{ product['deleteForm'].render('deleteSubmit') }}
                {{ end_form() }}
            </td>
            <td>
                <a href="{{ editUrl }}/{{ product['entity'].getId() }}">Edit</a>
            </td>
            <td>
            <a href="{{ addToCartUrl }}/{{ product['entity'].getId() }}">Add to cart</a>
            </td>
        </tr>

    {% endfor %}
    </tbody>
</table>


