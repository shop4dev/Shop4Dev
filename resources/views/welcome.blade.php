<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
	<link href='/parallax/styles/styles.css' rel="stylesheet" type="text/css">
</head>
<body style="background-color: #2f506a">

	<div style="width: 100%">

		<div id="container" class="container" style="float: left; width: 50%">

			@yield('ParalaxPicture')

		</div>

		<div id="container" class="container" style="float: right; width: 50%">

			@yield('logo')

		</div>

	</div>

		@yield('script')

</body>
</html>
