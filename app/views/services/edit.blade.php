<!-- app/views/Services/edit.blade.php -->

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
        <a class="navbar-brand" href="{{ URL::to('Services') }}">service Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('Services') }}">View All Services</a></li>
        <li><a href="{{ URL::to('Services/create') }}">Create a service</a>
    </ul>
</nav>

<h1>Edit {{ $service->service_name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($service, array('route' => array('services.update', $service->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('service_name', 'Service Name') }}
        {{ Form::text('service_name', null, array('class' => 'form-control')) }}
    </div>

   
    {{ Form::submit('Edit the service!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>