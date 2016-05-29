@extends('layouts.header')

@section('title', 'home')

@section('content')
	<script type="text/javascript">
		document.getElementById('home').className="active";
	</script>
	<div class="jumbotron feature">
    	<div class="container">
    		<h1 class="intro-text text-center">Now Showing  </h1>
			<center><img src="http://localhost/ci2/images/the_jungle_book.jpg"></center>
        	<!--<?//php $nivo->render_slides() ?>-->
    	</div>
	</div>
@stop

 <!--<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Sk. Adnan Hassan and A.S.M Ahsanul Haque 2015</p>
                </div>
            </div>
        </div>
    </footer>
 -->
