@extends('layouts.app')

@section('content')



@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container" style="margin-bottom: 80px;">

    @if(session('successMsg'))
    {{ session('successMsg') }}
@endif

    <!-- Card -->
    <div class="card">

      <!-- Card image -->
      <!-- <img alt="Responsive image" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap"> -->

      <!-- Card content -->
      <div class="card-body">

        

        <!-- Title -->
        <h4 class="card-title"><a> {{ $post->title }} </a></h4>
        <!-- Text -->
        <p class="card-text"> {{ $post->content }} </p>


        <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col">Comments</th>
            </tr>
          </thead>
          <tbody>

          @foreach($post->comments as $comms)
            <tr>
              
              <td>

                   <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" name="comment" placeholder="Add comment here..."> {{$comms->comments}} </textarea>

           
                
              </td>

            </tr>
          @endforeach

            <tr>
              <th scope="row">
                
                <div class="form-group shadow-textarea">
                  <label for="exampleFormControlTextarea6">Add Comments</label>

                  <form action="{{ route('author.storeComments') }}" method="POST">

                    {{ csrf_field() }}

                  <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" name="comment" placeholder="Add comment here..."></textarea>

                  <input type="hidden" name="post_id" value="{{ $post->id }}">
                  <!-- Button -->
                    <!-- <a href="" class="btn btn-primary" style="float: right;">Submit</a> -->
                    <button class="btn btn-primary" style="float: right;" type="submit">Submit</button>

                  </form>

                </div>


              </th>
            </tr>
            
          </tbody>
        </table>

    </div>
    <!-- Card -->

  </div>


</div>


        

@endsection