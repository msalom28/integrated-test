@extends('app')

@section('content')
	<h1>Create a new post</h1>

	<form action="/posts" method="post">
		<input type="text" name="title" placeholder="The title of your post">
		<textarea name="paragraph" id="" cols="30" rows="10" placeholder="The body of your post"></textarea>
		<input type="submit" value="Publish Post">
	</form>

@stop