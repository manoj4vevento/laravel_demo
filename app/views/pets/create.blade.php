<!-- app/views/Pets/create.blade.php -->

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
        <a class="navbar-brand" href="{{ URL::to('pets') }}">Pet Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('pets') }}">View All Pets</a></li>
        <li><a href="{{ URL::to('pets/create') }}">Create a Pet</a>
    </ul>
</nav>

<h1>Create a Pet</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'pets')) }}

    <div class="form-group">
        {{ Form::label('Pet_name', 'Pet Name') }}
        {{ Form::text('pet_name', Input::old('pet_name'), array('class' => 'form-control')) }}
    </div>

   
    {{ Form::submit('Create the Pet!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>