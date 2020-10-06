@extends('layouts.app')

@section('content')

<div class="container">

	@if($errors->any())
		@foreach($errors->all() as $error)
			{{ $error }}
		@endforeach
	@endif

<h1>Edit Page</h1>

<!-- Default form contact -->
<form class="text-center border border-light p-5" action="{{ route('author.update', $post->id) }}" method="POST">

	{{ csrf_field() }}

    <p class="h4 mb-4">Edit Content</p>

    <!-- Name -->
    <input type="text" id="defaultContactFormName" class="form-control mb-4" value="{{ $post->title }}" name="title" placeholder="Title">

	<div class="form-group">
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="5" value="{{ $post->content }}" name="content" placeholder="Content">{{ $post->content }}</textarea>
    </div>

    <!-- Send button -->
    <button class="btn btn-info btn-block" type="submit">Update Content</button>

</form>
<!-- Default form contact -->

</div>

@endsection