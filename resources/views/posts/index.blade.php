<x-app-layout>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">

<nav class="navbar navbar-expand-md">
 <div class="container">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav">
       <!-- <li class="nav-item"><a class="nav-link btn btn-small btn-success" href="{{ URL::to('posts/create') }}">Create a Post</a> -->
    </ul>
	</div>
	</div>
	<a class="btn btn-outline-success my-2 my-sm-0" href="{{ URL::to('posts/create') }}">Create a Post</a>
</nav>

<h1>All the Posts</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Slug</td>
            <td>Content</td>
            <td>Website</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->slug }}</td>
            <td>{{ $value->content }}</td>
            <td>{{ $value->website_key }}</td>
            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('posts/' . $value->id) }}">Show this Post</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('posts/' . $value->id . '/edit') }}">Edit this Post</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<form class="form-inline" action="{{ URL::to('subscribe/' . $value->id . '') }}" method='POST' style="display: inline-block;">
				@csrf  
				{{ method_field('PUT') }}
				<div class="col-auto">
				<div class="form-group mb-2">
				 <x-label for="website_key" :value="__('Website')" />
				<select name="website_key"
				id="website_key"
				class="form-input  form-text rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" rows="3">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				</select>
				</div>
				</div>
				<div class="col-auto">
                <button class="btn btn-small btn-danger btn btn-primary mb-2" type="submit" >Subscribe</button>
				</div>
				</form>

</div>

</x-app-layout>