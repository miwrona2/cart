{{ content() }}
{{ flash.output() }}
{{ flashSession.output() }}

<h3>Cart</h3>
<a href="{{ productListUrl }}">Products List</a>
{% for item in cartItems %}
    <p>
        {{ item['entity'].getId() }}
        {{ item['entity'].getProduct().getTitle() }}

        {{ form('action': 'cartitem/deleteitem/')}}
            {{ item['deleteForm'].render('id') }}
            {{ item['deleteForm'].render('deleteSubmit') }}
        {{ end_form() }}
    </p>

{% endfor %}

