@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container">

<h1>Blog Posts</h1>

@if(session('successMsg'))
    {{ session('successMsg') }}
@endif

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<table class="table table-borderless">

@foreach($post as $posts)

<tr>

    <td>

        <div class="card">
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

        <!-- Hello -->

    </td>

</tr>
@endforeach

</table>

    {{ $post->links() }}

</div>
@endsection
