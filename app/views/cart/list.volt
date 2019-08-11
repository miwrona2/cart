{{ content() }}
{{ flash.output() }}
{{ flashSession.output() }}

<h3>Cart</h3>
<a href="{{ productListUrl }}">Products List</a>
<table>
    <thead>
        <tr>
            <th>Products' title</th>
            <th>Products' price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {% for item in cartItems %}
        <tr>
            <td>
                {{ item['entity'].getProduct().getTitle() }}
            </td>
            <td>
                {{ item['entity'].getProduct().getPrice() }}
            </td>
            <td>
                {{ form('action': 'cart-item/deleteitem/')}}
                    {{ item['deleteForm'].render('id') }}
                    {{ item['deleteForm'].render('deleteSubmit') }}
                {{ end_form() }}
            </td>
        </tr>
        {% endfor %}
    </tbody>
</table>
<p>Total price of the cart:
    <span style="font-weight: bold">
    {% if cartsSaldo === null %}
        0
    {% else %}
        {{ cartsSaldo }}
    {% endif %}
    </span>
</p>