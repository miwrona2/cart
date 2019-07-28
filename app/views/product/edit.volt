{{ content() }}
{{ flash.output() }}
{{ flashSession.output() }}
<a href="{{ listUrl }}">List</a>
<h3>Edit product</h3>
<fieldset>
{{ form('action' : 'product/edit/'~ product.getId()) }}

    {{ form.render('id') }}
    {#{{ form.render('cart_id') }}#}


    {{ form.label('title') }}
    {{ form.render('title') }}

    {{ form.label('price') }}
    {{ form.render('price') }}

    {{ form.render('submit') }}
{{ end_form() }}
</fieldset>
