{% for product in products %}
    <p>{{ product.getTitle() }}</p>
{% endfor %}