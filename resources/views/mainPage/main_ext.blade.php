

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop4Dev</title>
	<link href='/main/parallax/styles/styles.css' rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/main/css/default.css" />
	<link rel="stylesheet" type="text/css" href="/main/css/multilevelmenu.css" />
	<link rel="stylesheet" type="text/css" href="/main/css/component.css" />
	<link rel="stylesheet" type="text/css" href="/main/css/animations.css" />
</head>
<body style="background-color: #2f506a">

	<div id="n1" style="width: 100%">
		        
		<!--<div id="myModal" class="modal"></div>-->
		<div class="pt-triggers">
			<div id="iterateEffects" class="info">i</div>
		</div>
		
	</div>
	<div id="pt-main" class="pt-perspective">
			<div class="pt-page pt-page-1">
			
				@yield('ParalaxPicture')
				
				@yield('logo')
			
			</div>
			<div class="pt-page pt-page-2"><h1><span>A collection of</span><strong>Page</strong> 2Transitions</h1></div>
			<div class="pt-page pt-page-3"><h1><span>A collection of</span><strong>Page</strong> 3Transitions</h1></div>
			<div class="pt-page pt-page-4"><h1><span>A collection of</span><strong>Page</strong> 4Transitions</h1></div>
		</div>

		@yield('script')

</body>
</html>
