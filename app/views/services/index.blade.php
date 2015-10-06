<!-- app/views/services/index.blade.php -->

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

<h1>All the services</h1>

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
    @foreach($services as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->service_name }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the Service (uses the destroy method DESTROY /services/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
				
                <!-- edit this Service (uses the edit method found at GET /services/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('services/' . $value->id . '/edit') }}">Edit</a>

				<a class="btn btn-small btn-success" href="{{ URL::to('services/allocate/'.$value->id) }}">Allocate To Pet</a>
				
				{{ Form::open(array('url' => 'services/' . $value->id, 'class' => 'pull-left')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>