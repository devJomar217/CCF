<nav class="navbar navbar-expand-lg">
            <div class="container px-4 px-lg-5 ">
                <button class="navbar-toggler btn btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <a class="navbar-brand" href="<?php echo base_url ?>">
                <img src="<?php echo validate_image($_settings->info('logo')) ?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                <?php echo $_settings->info('short_name') ?>
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                        <li class="nav-item"><a class="nav-link" aria-current="page" href="<?php echo base_url ?>">Home</a></li>

                        <li class="nav-item"><a class="nav-link" aria-current="page" href="<?php echo base_url ?>?p=events">Events</a></li>

                        <li class="nav-item"><a class="nav-link" aria-current="page" href="<?php echo base_url ?>?p=gallery">Gallery</a></li>

                        <li class="nav-item  dropdown">
                          <a class="nav-link" aria-current="page" href="<?php echo base_url ?>?p=view_rooms">Rooms</a>

                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <?php 
                            $cat_qry = $conn->query("SELECT * FROM rooms where status = 1 ");
                            while($crow = $cat_qry->fetch_assoc()):
                            ?>
                            <a class="dropdown-item" href="<?php echo base_url ?>?p=articles&t=<?php echo md5($crow['id']) ?>"><?php echo $crow['name'] ?></a>
                            <?php endwhile; ?>
                          </div>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url ?>?p=schedule">Book Now</a></li>

                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url ?>?p=about">About Us</a></li>

                        <li class="nav-item"><a class="nav-link" aria-current="page" href="<?php echo base_url ?>?p=joinnow">Join Now</a></li>

                    </ul>
                    <div class="d-flex align-items-center">
                    </div>
                </div>
                <!-- <button class="btn btn-flat btn-primary" type="button" id="donation">Donation Now</button> -->
            </div>
        </nav>
  <style>
    .nav-item.dropdown:hover .dropdown-menu{
      display:block;
    }
    a.navbar-brand {
    margin-right: 23%;
  }
  nav.navbar.navbar-expand-lg {
    padding-top: 2%;
    padding-bottom: 2%;
  }
  button.navbar-toggler.btn.btn-sm.collapsed {
    background-color: black !important;
}
  </style>
<script>
  $(function(){
    $('#login-btn').click(function(){
      uni_modal("","login.php")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if($('body').offset.top == 0)
          $('#mainNav').removeClass('navbar-shrink')
    })


    $('#donation').click(function(){
      uni_modal('Donation','donate.php')
    })
  })
</script>