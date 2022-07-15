<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Multi-language</title>
</head>
<body>
  <div class="links">
    <a href="{{ url('/multi-language') }}">English</a> |
    <a href="{{ url('/multi-language/pa') }}">ਪੰਜਾਬੀ</a> |
    <a href="{{ url('/multi-language/ur') }}">اردو</a>
  </div>
  <h1 class="heading-1">@lang('lang.heading-1')</h1>
  <h1 class="heading-2">@lang('lang.heading-2')</h1>
  <h1 class="heading-3">@lang('lang.heading-3')</h1>
</body>
</html>