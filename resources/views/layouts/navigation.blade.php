<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
            <span class="sr-only">Brand</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <span class="navbar-brand"> <img src="http://mediad.publicbroadcasting.net/p/wncw/files/201504/logo_fid.png" alt="Mountain View" style="width:80px;"></span>
        @if (Auth::user())
            <p class="navbar-text navbar-left">Signed in as {{ Auth::user()->name }}</p>
        @endif
    </div>
    <div class="collapse navbar-collapse navbar-right" id="mainNavbar">
        <ul class="nav navbar-nav">
            @if (Auth::user())
                <li><a class="raw-margin-right-24" href="/logout">Logout</a></li>
            @endif
        </ul>
    </div>
</div>