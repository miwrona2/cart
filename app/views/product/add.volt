{{ content() }}
{{ flash.output() }}
{{ flashSession.output() }}
<a href="{{ listUrl }}">List</a>
<h3>Add new product</h3>
<fieldset>
{{ form('action' : 'product/add') }}
    {{ form.label('title') }}
    {{ form.render('title') }}
    {{ form.label('price') }}
    {{ form.render('price') }}

    {{ form.render('submit') }}
{{ end_form() }}
</fieldset>
