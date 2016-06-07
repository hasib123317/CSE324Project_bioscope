@extends('layouts.header')
@section('title', 'home')
@section('content')
<script type="text/javascript">
   document.getElementById('home').className="active";
</script>
<div class="jumbotron feature">
   <div class="container">
      <h1 class="intro-text text-center">Now Showing  </h1>
      <!--<center><img src="http://localhost/ci2/images/the_jungle_book.jpg"></center>-->
      <div id="mainCarousel" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            @foreach($movies as $index => $movie)
            <div class="item @if($index == 0) {{ 'active' }} @endif">
             <a href="week-schedule">
               <img style="width: 100%;" src="{{ $movie->img_path }}" alt="{{ $movie->name }}">
             </a>
            </div>
            @endforeach
         </div>
         <a class="left carousel-control" href="#mainCarousel" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left"></span>
         </a>
         <a class="right carousel-control" href="#mainCarousel" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right"></span>
         </a>
      </div>
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