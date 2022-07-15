<!DOCTYPE html>
<html>
<style>
input[type=text], select, input[type=file] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>


<div>
  {!! Form::open([
    'url' => url('/collective-form-processing'),
    'id' => 'collective-form',
    'enctype' => 'multipart/form-data'
  ]) !!}

    {!! Form::label('fname', 'First Name') !!}
    {!! Form::text('firstname', null, [
      'id' => 'fname',
      'placeholder' => 'Your first name..'
    ]) !!}

    {!! Form::label('lname', 'Last Name') !!}
    {!! Form::text('lastname', null, [
      'id' => 'lname',
      'placeholder' => 'Your last name..'
    ]) !!}

    {!! Form::label('country', 'Country') !!}
    {!! Form::select('country', [
      'australia' => 'Australia',
      'canada' => 'Canada',
      'usa' => 'USA'
    ], null, [
      'placeholder' => 'Select Your Country.'
    ]) !!}

    {!! Form::label('file', 'Upload file') !!}
    {!! Form::file('image') !!}
  
    {!! Form::submit('Save') !!}

  {!! Form::close() !!}
</div>

</body>
</html>


