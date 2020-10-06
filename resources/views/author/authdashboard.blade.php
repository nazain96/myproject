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

<h1 class="pink-text">All Posts</h1>

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

        <div class="card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg);">

          <!-- <div class="card-body"> -->
          <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">

            <div>

              <h5 class="pink-text"><i class="fa fa-desktop"></i> Cyber Security</h5>
              <h5 class="card-title pt-2">{{ $posts->title }}</h5>
              <p>{{ $posts->content }}</p>

              <a class="btn btn-raised btn-primary btn-sm" href="{{ route('author.viewpost', $posts->id) }}"> 
                View Post   <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

              

           </div>

          </div>
        </div>

    </td>

</tr>
@endforeach

</table>

    {{ $post->links() }}



</div>
@endsection
