@extends('layouts.main')

@section('content')


<div class="container">

<h1>Home Page</h1>

@if(session('successMsg'))
	{{ session('successMsg') }}
@endif

<div class="container">

<table class="table table-borderless">
  <thead>

    @foreach($post as $posts)
    <tr style="padding-bottom: 200px;">
 
      <div class="card w-50">
        <div class="card-body">
          <h5 class="card-title">{{ $posts->p_title }}</h5>
          <p class="card-text">{{ $posts->p_content }}</p>
          
          <a class="btn btn-raised btn-primary btn-sm" href="{{ route('edit', $posts->p_id) }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                </a>

                ||

                <form id="delete-form-{{ $posts->p_id }}" action="{{ route('delete', $posts->p_id) }}" method="POST" style="display:none;">
                
                {{ csrf_field() }}          
                {{ method_field('delete') }}

              </form>

              <button onclick="if(confirm('Are you sure to delete this post?')) {

                event.preventDefault();
                document.getElementById('delete-form-{{ $posts->p_id }}').submit();

              }else{
                event.preventDefault();
              }

              " class="btn btn-raised btn-danger btn-sm" href=""> 

              <i class="fa fa-trash" aria-hidden="true"></i> 

              </button>
        </div>
      </div>
        

    </tr>
    @endforeach

  </thead>
  
</table>

</div>



	{{ $post->links() }}

</div>

@endsection