@extends('mainPage/main_ext')
@extends('mainPage/first')
{{--@extends('mainPage/navigation')--}}
@extends('mainPage/second')
@extends('mainPage/third')
@extends('mainPage/fourth')
@extends('mainPage/navbar')


@section('script')
	<script src="/main/js/modernizr.custom.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="/main/js/jquery.dlmenu.js"></script>
	<script src="/main/js/pagetransitions.js"></script>
    <script src="/main/js/parallax.js"></script>
	<script src="/main/js/bootstrap.min.js"></script>
	<script src="/main/js/jquery.js"></script>

    <script>
        // Pretty simple huh?
        var scene = document.getElementById('scene');
        var parallax = new Parallax(scene);
        // Pretty simple huh?
        var scene2 = document.getElementById('scene2');
        var parallax = new Parallax(scene2);
	</script>

@endsection
