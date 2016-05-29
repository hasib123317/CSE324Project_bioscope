@extends('layouts.header1')	

@section('content')
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">


            <li >
                <a href="{{ url('admin-panel') }}" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
            </li>

            <li>
                <a href="{{ url('admin-profile') }}"><i class="fa fa-edit "></i>My Profile Page  <span class="badge">Included</span></a>
            </li>

        </ul>
    </div>

</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <div id="schedulebox" style="margin-top:100px" class="mainbox col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
              <div class="table-responsive">
                <table class="table table-hover">
                 <caption><strong>Hall Entries</strong></caption>
                 <a href="{{ url('').'/admin-panel/halls/insertHall' }}">Add Hall Entries</a>
                 <tbody>
                     <tr>
                         <th>Hall No</th>
                         <th>Seat Number</th>
                         <th>Premium Ticket Price</th>
                         <th>Regular Ticket Price</th>
                         <th></th>
                         <th></th>
                     </tr>
                     @foreach($halls as $hall)
                     <tr>
                       <td>{{ $hall->id }}</td>
                       <td>{{ $hall->seat }}</td>
                       <td>{{ $hall->premium_ticket_price }}</td>
                       <td>{{ $hall->regular_ticket_price }}</td>
                       <td><a href="{{ url('/admin-panel/halls/edit/'.$hall->id) }}">edit</a></td>
                       <td><a href="{{ url('').'/admin-panel/halls/delete/'.$hall->id }}">delete</a></td>
                   </tr>
                   @endforeach
                   
               </tbody>
           </table>
       </div>	
   </div>
</div>
</div>              
<!-- /. ROW  -->


<!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
@stop