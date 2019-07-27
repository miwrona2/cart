{{ content() }}
{{ flash.output() }}
{{ flashSession.output() }}
<a href="{{ addUrl }}">Add new product</a>
<h3>Products</h3>
{% for product in products %}
    <p>
        {{ product['entity'].getTitle() }}
        <span style="font-weight: bold">{{ product['entity'].getPrice() }}</span>
        {{ form('action': 'product/delete/')}}
            {{ product['deleteForm'].render('id') }}
            {{ product['deleteForm'].render('deleteSubmit') }}
        {{ end_form() }}
    </p>

{% endfor %}

