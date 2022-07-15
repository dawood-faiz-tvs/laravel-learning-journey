<!DOCTYPE html>
<html>
<head>
<style>
  .w-5 {
    display: none;
  }
  .active-btn {
    text-decoration: none;
    padding: 5px;
    background-color: green;
    color: #fff;
    border-radius: 5px;
  }
  .inactive-btn {
    text-decoration: none;
    padding: 5px;
    background-color: red;
    color: #fff;
    border-radius: 5px;
  }
  .register_button, .update_btn {
    border: none;
    padding: 1rem;
    background-color: #04AA6D;
    color: #fff;
    font-weight: 700;
  }
  .delete_btn {
    border: none;
    padding: 1rem;
    background-color: red;
    color: #fff;
    font-weight: 700;
  }
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
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
input[type=search]{
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
</style>
</head>
<body>

  <div class="topnav">
    <a class="active" href="{{ url('/all_students') }}">All Students</a>
    <a href="{{ url('/register') }}">Register Students</a>
    <a href="{{ url('/students/trash') }}">Trash</a>
  </div>
  

<h1>Active Students Details...</h1>
<a href="{{ route('students.register') }}">
  <button class="register_button">Register</button>
</a>
<a href="{{ url('/all_students') }}">
  <button class="register_button">Reset Search</button>
</a>

<form action="">
  <input type="search" name="search" placeholder="Search by Name or Email..." value="{{ $search }}">
  <input type="submit" value="Search">
</form>

@if(session()->has('success'))
<small>({{ session()->get('success') }})</small>
@endif</h1>

<table id="customers">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Country</th>
    <th>Status</th>
    <th>Created At</th>
    <th>Action</th>
  </tr>
  @foreach($students as $student)
  <tr>
    <td>{{ $student->name }}</td>
    <td>{{ $student->email }}</td>
    <td>{{ $student->role }}</td>
    <td>{{ $student->country }}</td>
    <td>
      @if ($student->status == "Active")
        <span class="active-btn">{{ $student->status }}</span>
      @else
        <span class="inactive-btn">{{ $student->status }}</span>
      @endif
    </td>
    <td>{{ formatted_date($student->created_at, 'd-M-Y') }}</td>
    <td>
      <a href="{{ url('/delete_student') }}/{{ $student->id }}">
        <button class="delete_btn">Move to Trash</button>
      </a>
      <a href="{{ route('students.update', ['id' => $student->id]) }}">
        <button class="update_btn">Update</button>
      </a>
    </td>
  </tr>
  @endforeach
</table>
{{ $students->links() }}

</body>
</html>


