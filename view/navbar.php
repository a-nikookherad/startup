<header class="sticky-top" data-spy="affix" data-offset-top="100">
    <nav >
        <div id="navbar" class="navbar navbar-expand-md navbar-dark bg-dark mt-1">
            <a href="<?php echo base_url; ?>index.php" class="navbar-brand">
                <img src="<?php echo base_url; ?>asset/images/logo.jpg" alt="redtie.logo" width="60" height="35"/>
            </a>
            <button type="button" class="btn navbar-toggler" data-toggle="collapse" data-target="#navbar_collapse"><span class="navbar-toggler-icon" ></span></button>
            <div class="collapse navbar-collapse text-center" id="navbar_collapse">
                <ul class="navbar-nav pr-2 ">
                    <li class="nav-item">
                        <a href="<?php echo base_url; ?>" class="nav-link"><i class="fas fa-home"></i> خانه</a>
                    </li>
                    <?php if(current_user()): ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url.'admin_page.php'; ?>" class="nav-link"><i class="fas fa-brain"></i> مدیریت</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="<?php echo base_url; ?>" class="nav-link btn dropdown-toggle" data-toggle="dropdown"> فهرست</a>
                            <div class="dropdown-menu text-center">
                                <?php $get_pages=get_pages();
                                foreach ($get_pages as $temperari=>$get_page){
                                    if($get_page['hidden']==1){continue;}
                                     ?>
                                <a href="<?php echo base_url.$get_page['slug']; ?>" class="dropdown-item"><?php echo $get_page['title']; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url.'about_me.php'; ?>" class="nav-link"> درباره من</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url.'contact_me.php'; ?>" class="nav-link"> ارتباط با من</a>
                    </li>
                </ul>
                <ul class="navbar-nav pr-2 mr-auto">
                    <?php if(current_user()): ?>
                    <li class="nav-item">
                        <a class="nav-link"><?php echo 'wellcome '.$_SESSION['username']; ?></a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?php echo base_url.'log_out.php'; ?>" class="nav-link bg-danger rounded">خروج</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url.'sign_in.php'; ?>" class="nav-link"><i class="fas fa-address-card" aria-hidden="true"></i> ورود</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url.'sign_up.php'; ?>" class="nav-link"><i class="fas fa-address-card" aria-hidden="true"></i> ثبت نام</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
