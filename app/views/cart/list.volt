{{ content() }}
{{ flash.output() }}
{{ flashSession.output() }}

<h3>Cart</h3>
<a href="{{ productListUrl }}">Products List</a>
{% for item in cartItems %}
    <p>
        {{ item.getId() }}
        {{ item.getProduct().getTitle() }}
    </p>

{% endfor %}

