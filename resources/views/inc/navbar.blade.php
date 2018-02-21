<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/">PhotoShow</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <li class="{{ Request::is('/') ? "active" : '' }}"><a href="/">Home</a></li>
        <li class="{{ Request::is('albums/create') ? "active" : '' }}"><a href="/albums/create">Create Album</a></li>

      </ul>
    </div>
  </div>
</nav>