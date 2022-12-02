@extends('layout.layout')
@section('content')

<div class="container content">  
    <form id="create-form" action="/update/{{ $todo['id'] }}" method="POST">
      @csrf
      @method('PATCH')
      @if($errors->any())
      <script>
       swal("Error!","Harus mengisi semua input!","error");
      </script>
      @endif
      <h3 class="btn btn-primary">Edit Todo</h3>
      
      <fieldset>
          <label for="">Title</label>
          <input placeholder="title of todo" type="text" name="title" value="{{ $todo['title'] }}">
          @error('title')
          <div class="text-danger">
            {{$message}}
          </div>
          @enderror
      </fieldset>
      <fieldset>
          <label for="">Target Date</label>
          <input placeholder="Target Date" type="date" name="date" value="{{ $todo['date'] }}"> 
          @error('date')
          <div class="text-danger">
            {{$message}}
          </div>
          @enderror
      </fieldset>
      <fieldset>
          <label for="">Description</label>
          <textarea name="description" placeholder="Type your descriptions here..." tabindex="5">{{ $todo['description'] }}</textarea>
          @error('description')
          <div class="text-danger">
            {{$message}}
          </div>
          @enderror
      </fieldset>
      <fieldset>
          <button type="submit" style="background-color: blue;" type="submit" id="contactus-submit">Submit</button>
      </fieldset>
      <fieldset>
        <a href="/home" class="btn-cancel btn-lg btn">Cancel</a>
      </fieldset>
    </form>
  </div>
@endsection