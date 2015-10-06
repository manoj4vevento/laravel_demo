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
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('services') }}">Services</a></li>
		<li><a href="{{ URL::to('pets') }}">Pet Types</a></li>
		<li><a href="{{ URL::to('services/petTypes') }}">Services By Pet Types</a>
        <li><a href="{{ URL::to('services/create') }}">Add Service</a>
		<li><a href="{{ URL::to('pets/create') }}">Add Pettype</a>
    </ul>
</nav>

<h1>Allocate {{ $service->service_name }}</h1>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'services/add')) }}
	{{ Form::hidden('invisible', $service->id, array('id' => 'service_id','name'=>'service_id')) }}

    <div class="form-group">
       
		@foreach ($pets as $pet)
		{{$pet->pet_name}}
		<input tabindex="1" type="checkbox" name="pets[{{$pet->pet_name}}]" id="{{$pet}}" value="{{$pet->pet_name}}">
		@endforeach

		
    </div>

   
    {{ Form::submit('Create the Service!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>