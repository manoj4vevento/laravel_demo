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
        <li><a href="{{ URL::to('services') }}">View All services</a></li>
		<li><a href="{{ URL::to('services/petTypes') }}">Services By Pet Types</a>
		
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
			<td>Pet Type</td>
        </tr>
    </thead>
    <tbody>
    @foreach($services as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->service_name }}</td>
			<td>{{ $value->pet_id }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>