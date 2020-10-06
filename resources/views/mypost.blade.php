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
<body>

<div class="container">

<h1 class="pink-text">My Blog Posts</h1>

@if(session('successMsg'))
    {{ session('successMsg') }}
@endif

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<table class="table table-borderless">

@foreach($user->blogpost as $posts)

<tr>

    <td>

         
        <div class="card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg);">

          <!-- <div class="card-body"> -->
          <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">

            <div>

              <h5 class="pink-text"><i class="fa fa-desktop"></i> Cyber Security</h5>
              <h5 class="card-title pt-2">{{ $posts->title }}</h5>
              <p>{{ $posts->content }}</p>
            
            <a class="btn btn-raised btn-primary btn-sm" href="{{ route('edit', $posts->id) }}"> Edit    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                        </a>

                        ||

                        <form id="delete-form-{{ $posts->id }}" action="{{ route('delete', $posts->id) }}" method="POST" style="display:none;">
                        
                        {{ csrf_field() }}          
                        {{ method_field('delete') }}

                      </form>

                      <button onclick="if(confirm('Are you sure to delete this post?')) {

                        event.preventDefault();
                        document.getElementById('delete-form-{{ $posts->id }}').submit();

                      }else{
                        event.preventDefault();
                      }

                      " class="btn btn-raised btn-danger btn-sm" href=""> Delete 

                      <i class="fa fa-trash" aria-hidden="true"></i> 

                      </button>

                    </div>

          </div>
        </div>

    </td>

</tr>
@endforeach


</table>



</div>

</body>
@endsection
