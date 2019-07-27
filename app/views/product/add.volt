add form
{{ form('action' : 'product/add') }}
    {{ form.label('title') }}
    {{ form.render('title') }}
    {{ form.label('price') }}
    {{ form.render('price') }}

    {{ form.render('submit') }}
{{ end_form() }}