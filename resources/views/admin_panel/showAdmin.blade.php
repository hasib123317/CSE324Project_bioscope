  @extends('layouts.header1')	

  @section('content')
  <!-- /. NAV TOP  -->
  <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
          <ul class="nav" id="main-menu">


                <li >
                        <a href="{{ url('admin-panel') }}" ><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>

                    <li>
                        <a href="{{ url('admin-profile') }}"><i class="fa fa-edit "></i>My Profile Page </a>
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
                   <caption><strong>Admin Entries</strong></caption>
                   <a href="{{ url('').'/admin-panel/movies/insertAdmin' }}">Add New Admin Entries</a>
                   <tbody>
                       <tr>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Phone no</th>
                           <th></th>
                      
                       </tr>
                       @foreach($users as $user)
                       <tr>
                        @if($user->isadmin==true)
                      
                         <td>{{ $user->name }}</td>
                         <td>{{ $user->email }}</td>
                         <td>{{ $user->phone_no }}</td>
                         <td><a href="{{ url('').'/admin-panel/users/delete/'.$user->id }}">delete</a></td>
                        @endif
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