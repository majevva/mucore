<header class="main-header">
    <!-- Logo -->
    <a target="_parent" href="index.php" class="logo">
      
      
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MuCore </b><?=$core['version'] ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          
          
          
          <li class="dropdown tasks-menu">
            <a href="<?=$core['config']['website_url'];?>" target="_blank">
              <i class="fa fa-home"></i> Home Page
            </a>  
          </li>
          <li class="tasks-menu">
            <a href="index.php" target="_parent">
              <i class="fa fa-dashboard"></i> Admin Home
            </a>  
          </li>
          <li class="dropdown tasks-menu">
            <a href="index.php?get=logout">
              <i class="fa fa-sign-out"></i> Log Out
            </a>  
          </li>
          
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>