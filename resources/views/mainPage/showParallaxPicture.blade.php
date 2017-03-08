@extends('welcome')

@section('ParalaxPicture')
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
            <li class="layer" data-depth="0.3"><img class="Display positionDisplay" src="/parallax/images/Layer4.svg"></li>
			<li class="layer" data-depth="0.4"><img class="Screen positionScreen" src="/parallax/images/Layer5.svg"></li>
			<li class="layer" data-depth="0.5"><img class="Shadow1 positionShadow1" src="/parallax/images/Layer6.svg"></li>
			<li class="layer" data-depth="0.6"><img class="LittleScreen1 positionLittleScreen1" src="/parallax/images/Layer7.svg"></li>
			<li class="layer" data-depth="0.65"><img class="LittleScreen1Inside positionLittleScreen1Inside" src="/parallax/images/Layer8.svg"></li>
			<li class="layer" data-depth="0.4"><img class="Cloud positionCloud" src="/parallax/images/Layer3.svg"></li>
			<li class="layer" data-depth="0.5"><img class="Shadow2 positionShadow2" src="/parallax/images/Layer9.svg"></li>
			<li class="layer" data-depth="0.6"><img class="LittleScreen2 positionLittleScreen2" src="/parallax/images/Layer10.svg"></li>
			<li class="layer" data-depth="0.65"><img class="LittleScreen2Inside positionLittleScreen2Inside" src="/parallax/images/Layer11.svg"></li>
			<li class="layer" data-depth="0.7"><img class="Simbols positionSimbols" src="/parallax/images/Layer12.svg"></li>
		</ul>
@endsection

@section ('logo')
        <ul id="scene2" class="scene">
			<li class="layer" data-depth="0.1"><img class="Logo positionLogo" src="/parallax/images/shop4devT.png"/>
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
@endsection

@section ('info')
        <div class="info"><a onclick="slide_down()">i</a></div>
		<div id="myModal" class="modal"></div>
@endsection

@section('script')
    <script src="/js/parallax.js"></script>
    <script>
        // Pretty simple huh?
        var scene = document.getElementById('scene');
        var parallax = new Parallax(scene);
        // Pretty simple huh?
        var scene2 = document.getElementById('scene2');
        var parallax = new Parallax(scene2);
	</script>

@endsection