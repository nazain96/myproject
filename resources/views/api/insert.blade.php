


<!-- Default form contact -->
<form class="text-center border border-light p-5" action="{{ route('store') }}" method="POST">

	{{ csrf_field() }}

    <p class="h4 mb-4">Create post</p>

    <!-- Name -->
    <input type="text" id="defaultContactFormName" class="form-control mb-4" name="title" placeholder="Title">

	<div class="form-group">
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="content" placeholder="Content"></textarea>
    </div>

    <!-- Send button -->
    <button style="background-color: #800000;" class="text-white btn btn-block" type="submit">Create Content</button>

</form>
<!-- Default form contact -->