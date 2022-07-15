<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #fff;
}

* {
  box-sizing: border-box;
}

.all_errors, small {
  color: red;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: #f4f4f4;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
  <div class="topnav">
    <a class="active" href="{{ url('/all_students') }}">All Students</a>
    <a href="{{ url('/register') }}">Register Students</a>
    <a href="{{ url('/students/trash') }}">Trash</a>
  </div>

  {{-- All errors --}}
  {{-- @php
    print_r($errors->all());
  @endphp --}}

<form action="{{ $url }}" method="POST">
  @csrf
  <div class="container">
    <h1>
      {{ $title }} 
      @if(session()->has('name'))
        <small>({{ session()->get('name') }})</small>
      @else
        <small>(Guest)</small>
      @endif</h1>
    <hr>
    @php
      $requirement = '*';
    @endphp

@if (empty($student))

  <x-register-component type="text" name="name" label="Name:" old="true" :info="$requirement"/>
  <x-register-component type="text" name="email" label="Email:" old="true" :info="$requirement"/>
  <x-register-component type="text" name="role" label="Role:" old="true" :info="$requirement"/>
  <x-register-component type="password" name="password" label="Password:" old="false" :info="$requirement"/>
  <x-register-component type="password" name="confirm_password" label="Confirm Password:" old="false" :info="$requirement"/>
  
@else

@php
$name = $student->name;
$email = $student->email;
$role = $student->role;
$password = "";
$confirm_password = "";
@endphp

  <x-register-component type="text" name="name" label="Name:" :info="$requirement" :val="$name"/>
  <x-register-component type="text" name="email" label="Email:" :info="$requirement" :val="$email"/>
  <x-register-component type="text" name="role" label="Role:" :info="$requirement" :val="$role"/>

@endif

    {{-- <label>Name</label>
    <input type="text" name="name" value="{{ old('name') }}">
    <div class="all_errors">
      @error('name')
        {{ $message }}
      @enderror
    </div> --}}

    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn">{{ $CTA }}</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
