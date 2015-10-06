<!-- app/views/services/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('services') }}">Service Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('services') }}">View All services</a></li>
        <li><a href="{{ URL::to('services/create') }}">Create a Service</a>
    </ul>
</nav>

<h1>Create a Service</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'services')) }}

    <div class="form-group">
        {{ Form::label('service_name', 'Service Name') }}
        {{ Form::text('service_name', Input::old('service_name'), array('class' => 'form-control')) }}
    </div>

   
    {{ Form::submit('Create the Service!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>