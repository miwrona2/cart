{{ content() }}
{{ flash.output() }}
{{ flashSession.output() }}

<h3>Cart</h3>
<a href="{{ productListUrl }}">Products List</a>
<table>
    <thead>
        <tr>
            <th>Products' title</th>
            <th>...</th>
        </tr>
    </thead>
    <tbody>
        {% for item in cartItems %}
        <tr>
            <td>
                {{ item['entity'].getProduct().getTitle() }}
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