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

<h1 class="pink-text">List of Users</h1>

@if(session('successMsg'))
    {{ session('successMsg') }}
@endif

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<table class="table table-bordered" style="width:100%; ">

<tr>

  <td>Id</td>
  <td>Name</td>
  <td>Api Key</td>
  <td>Action</td>

</tr>

@foreach($user as $users)

<tr>
  <td> 
        {{ $users->id }}

  </td>

  <td> 

    {{ $users->name }}

  </td>

  <td> 

    @foreach($key as $keys)
      @if($keys->user_id == $users->id)
        {{ $keys->tokens }}
      @endif
    @endforeach


      <form style="float: right;" action="{{ route('admin.generateApi', $users->id) }}" method="POST">

            {{ csrf_field() }} 
            <button class="btn btn-raised btn-primary btn-sm" type="submit">Generate key</button>
            <input type="hidden" name="userid" value="{{ $users->id }}">

          </form>

  </td>

  <td> 

    <form id="delete-form-{{ $users->id }}" action="{{ route('admin.deleteUser', $users->id) }}" method="POST" style="display:none;">
                        
      {{ csrf_field() }}          
      {{ method_field('delete') }}

    </form>

    <button onclick="if(confirm('Are you sure to remove this user?')) {

      event.preventDefault();
      document.getElementById('delete-form-{{ $users->id }}').submit();

    }else{
      event.preventDefault();
    }

    " class="btn btn-raised btn-danger btn-sm" href=""> Remove 

    <i class="fa fa-trash" aria-hidden="true"></i> 

    </button>

    @if($users->banned_until == null)

      <form  action="{{ route('admin.block', $users->id) }}" method="POST">
        {{ csrf_field() }} 
        <button class="btn btn-raised btn-primary btn-sm" type="submit">Block</button>
        <input type="date" name="block_date"> 

      </form>
    @else
      <form action="{{ route('admin.unblock', $users->id) }}" method="POST">
        {{ csrf_field() }} 
        <button class="btn btn-raised btn-primary btn-sm" type="submit">UnBlock</button>
        <input type="hidden" name="" value="0">
      </form>

    @endif

  </td>

</tr>

@endforeach

</table>

</div>

</body>
@endsection
