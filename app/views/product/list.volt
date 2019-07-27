{{ content() }}
{{ flash.output() }}
{{ flashSession.output() }}
<a href="{{ addUrl }}">Add new product</a>
<h3>Products</h3>
{% for product in products %}
    <p>{{ product.getTitle() }}<span style="font-weight: bold">{{ product.getPrice() }}</span></p>

{% endfor %}

