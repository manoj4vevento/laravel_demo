<!-- app/views/Pets/index.blade.php -->

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

<h1>All the Pets</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($pets as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->pet_name }}</td>
          
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the Service (uses the destroy method DESTROY /Pets/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
				{{ Form::open(array('url' => 'pets/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Pet', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- edit this Service (uses the edit method found at GET /Pets/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('pets/' . $value->id . '/edit') }}">Edit this Pet</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>