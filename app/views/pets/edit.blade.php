<!-- app/views/Pets/edit.blade.php -->

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
        <a class="navbar-brand" href="{{ URL::to('pets') }}">pet Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('pets') }}">View All Pets</a></li>
        <li><a href="{{ URL::to('pets/create') }}">Create a pet</a>
    </ul>
</nav>

<h1>Edit {{ $pet->pet_name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($pet, array('route' => array('pets.update', $pet->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('pet_name', 'Pet Name') }}
        {{ Form::text('pet_name', null, array('class' => 'form-control')) }}
    </div>

   
    {{ Form::submit('Edit the Pet!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>