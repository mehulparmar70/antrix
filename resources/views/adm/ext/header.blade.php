
@if(session('LoggedUser'))
  <button class="onscreenCloseBtn btn btn-danger">
  <i class="fa fa-window-close" aria-hidden="true"></i>
  &nbsp;&nbsp;  Exit
  </button>
@endif


  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
 
    <ul class="navbar-nav ml-auto">        
      <li class="nav-item d-none d-sm-inline-block">
        <a target="_blank"  href="{{url('')}}" class="btn btn-sm btn-warning text-dark">
          <strong><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp; View Site</strong></a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link float-right">{{session('LoggedUser')->name}}</a>
      </li>


      <li class="nav-item d-none d-sm-inline-block">
          @if(session('LoggedUser')->image)
            <img src="{{url('web')}}/media/sm/{{session('LoggedUser')->image}}" 
            class="mt-1 img-circle elevation-2 object-fit-sm float-right" style="background:white;width:24px; height:24px">
          @else
            <img class="mt-1 img-circle elevation-2 object-fit-sm float-right" style="background:white;width:24px; height:24px"
             src="{{url('adm')}}/img/no-user.jpeg">
          @endif
      </li>
    </ul>
  </nav>
