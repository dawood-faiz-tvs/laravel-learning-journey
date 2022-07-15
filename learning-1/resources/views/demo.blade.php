<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Demo</title>
</head>
<body>
  <h1>Hi {{ $name ?? "Anonymous" }}! Your ID is {{ $id ?? "Anonymous" }}.</h1>

  {{-- foreach loop--}}
  @foreach($countries as $key => $country)
    @if($country == "American Samoa")
      @continue
    @endif
    <h1>{{$key."-".$country }}</h1>
  @endforeach

  {{--while loop--}}
  @php $i=0; @endphp
  @while($i<5)
    <h1>While loop {{ $i }}</h1>
    @php $i++; @endphp
  @endwhile


  {{--for loop--}}
  @for($i=0; $i<5; $i++)
    <h1>For loop {{ $i }}</h1>
  @endfor

  {{--@if directive--}}
  @if($name == "Dawood")
    <h1>Dawood</h1>
  @elseif($name == "Faiz")  
    <h1>Faiz</h1>
  @else
    <h1>Other than Dawood or Faiz.</h1>
  @endif  

  {{--@unless directive--}}
  @unless($id == 1)
    <h1>ID is not 1.</h1>
  @endunless

  {{--@isset directive--}}
  @isset($id)
    <h1>ID is set.</h1>
  @endisset
</body>
</html>