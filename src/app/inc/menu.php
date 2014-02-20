      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./?p=home">Instrument Manager</a>
          </div>
          <div class="collapse navbar-collapse">
          <?php if($auth != true){ ?>
            <ul class="nav navbar-nav">
              <li class="active"><a href="?p=home">Home</a></li>
              <li><a href="?p=about">About</a></li>
              <li><a href="?p=contact">Contact</a></li>
            </ul>
          <?php } ?>
          <ul class="nav navbar-nav navbar-right">
            <?php if($auth == true || $public_browse == true){ ?>
              <li><a href="?p=browse">Browse</a></li>
            <?php }
            if($auth == true){ ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="?p=users">Users</a></li>
                  <li class="divider"></li>
                  <li><a href="?p=schools">Schools</a></li>
                  <li class="divider"></li>
                  <li><a href="?p=instruments">Instruments</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo (isset($user)) ? $user : $auth ; ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="?p=user">User Details</a></li>
                  <li class="divider"></li>
                  <li><a href="?p=logout">Sign Out</a></li>
                </ul>
              </li>
            <?php } else { ?>
                <li><a href="?p=login">Sign In</a></li> 
            <?php } ?>
          </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>