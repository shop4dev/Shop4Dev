@extends('mainPage/main_ext')

@section('ParalaxPicture')
<div id="container" class="container" style="float: left; width: 50%">
	<div class="col-lg-8">
		
     <ul id="scene" class="scene">
			<li>
				<ul>
					<li class="hanger position1">
						<div class="board gear1 swing"></div>
					</li>
					<li class="hanger position2">
						<div class="board2 gear2 swing"></div>
					</li>
					<li class="hanger position3">
						<div class="board3 gear3 swing"></div>
					</li>
				</ul>
			</li>
            <li class="layer" data-depth="0.3">
				<img class="Display positionDisplay" src="/main/parallax/images/Layer4.svg">
			</li>
			<li class="layer" data-depth="0.4">
				<img class="Screen positionScreen" src="/main/parallax/images/Layer5.svg">
				</li>
			<li class="layer" data-depth="0.5">
				<img class="Shadow1 positionShadow1" src="/main/parallax/images/Layer6.svg">
				</li>
			<li class="layer" data-depth="0.6">
				<img class="LittleScreen1 positionLittleScreen1" src="/main/parallax/images/Layer7.svg">
				</li>
			<li class="layer" data-depth="0.65">
				<img class="LittleScreen1Inside positionLittleScreen1Inside" src="/main/parallax/images/Layer8.svg">
				</li>
			<li class="layer" data-depth="0.4">
				<img class="Cloud positionCloud" src="/main/parallax/images/Layer3.svg">
				</li>
			<li class="layer" data-depth="0.5">
				<img class="Shadow2 positionShadow2" src="/main/parallax/images/Layer9.svg">
				</li>
			<li class="layer" data-depth="0.6">
				<img class="LittleScreen2 positionLittleScreen2" src="/main/parallax/images/Layer10.svg">
				</li>
			<li class="layer" data-depth="0.65">
				<img class="LittleScreen2Inside positionLittleScreen2Inside" src="/main/parallax/images/Layer11.svg">
				</li>
			<li class="layer" data-depth="0.7">
				<img class="Simbols positionSimbols" src="/main/parallax/images/Layer12.svg">
				</li>
		</ul>
	</div>
</div>
@endsection

@section ('logo')
	<div id="container" class="container" style="float: right; width: 50%; padding: 5% 8% 5% 3%;">
        <ul id="scene2" class="scene">
			<li class="layer" data-depth="0.1"><img class="Logo positionLogo" src="/main/parallax/images/shop4devT.png"/>
			<ul>
				<li class="hanger logo">
						<div class="boardLogo logoGear swing"></div>
				</li>
			</ul>
			</li>
			<li>
				<label class="logo_label">
					Shop4Dev
					<p class="logo_p">
						Professional way to promote your business
					</p>
				</label>
			</li>
		</ul>
	</div>
@endsection

@section ('navigation_bar')

<div class="container" style="width: 100%;">
	<div class="row background">
		<div class="col-lg-12">
			<ul>
				<li class="textposition"><a class="hvr-grow-shadow"><img class="login" src="/main/parallax/images/Home.png"></a></li>
				<li class="textposition"><a class="hvr-bounce-to-top">Contact Us</a></li>
				<li class="textposition"><a class="hvr-bounce-to-top">Our Portfolio</a></li>
				<li class="textposition"><a class="hvr-bounce-to-top">Shop</a></li>
				<li>
					<div class="logoText">
						<img class="Gear position" src="/main/parallax/images/shop4devT.png">
						<img class="Gear2 swing" src="/main/parallax/images/shop4devG.png"/>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>

@endsection

@section('information_button')
<div id="n1" style="width: 100%">
	<div class="pt-triggers">
		<div id="iterateEffects" class="info">i</div>
	</div>
					
</div>
@endsection

@section('next_page_button')
<div id="n1" style="width: 100%">
	<div class="pt-triggers">
		<div id="iterateEffects" class="next"><img src="/main/parallax/images/arrowdown.png"></div>
	</div>
					
</div>
@endsection

@section('script')
	<script src="/main/js/modernizr.custom.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="/main/js/jquery.dlmenu.js"></script>
	<script src="/main/js/pagetransitions.js"></script>
    <script src="/main/js/parallax.js"></script>
	<script src="/main/js/bootstrap.min.js"></script>
    <script>
        // Pretty simple huh?
        var scene = document.getElementById('scene');
        var parallax = new Parallax(scene);
        // Pretty simple huh?
        var scene2 = document.getElementById('scene2');
        var parallax = new Parallax(scene2);
	</script>

@endsection
