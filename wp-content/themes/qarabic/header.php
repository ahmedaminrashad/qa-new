<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * 
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">		
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<meta name="google-site-verification" content="c8cMwx8JTJsAsVJQb46XdZjafdU77rgjCDjJMERpiQ4" />
		
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

    
<header>
   <div class="headerbg__blank">
      <div class="headerbg bg-white headroom headroom--top headroom--not-bottom">
         <div class="container">
            <div class="d-flex align-items-center justify-content-between">
               <a class="d-block header-logo" href="https://qarabic.com/">
               <img class="headerbg__logo" src="https://qarabic.com/wp-content/uploads/2022/06/qarabic-logo.png" alt="QArabic">
               </a>
               <div class="d-flex align-items-center">
				   <a class="headerbutton px-24 ml-lg-4 ml-md-3 ml-0 font-19 font-w700 d-flex align-items-center" href="https://qarabic.com/">
					   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000"/>
    </g>
</svg>
                  <span class="d-none d-lg-inline-block">Home</span>
                  </a>
				   
				   
                  <a class="blockmenusfull__open headerbutton px-24 ml-lg-4 ml-md-3 ml-0 font-19 font-w700 d-flex align-items-center" href="javascript:void(0)">
					  <img class="img-h20 mr-1" src="https://qarabic.com/wp-content/themes/qarabic/assets/img/icon01.svg" alt="Menu">
                  <span class="d-none d-lg-inline-block">Main Menu</span>
                  </a>
				   
				   
                  <a class="headerbutton px-24 ml-lg-4 ml-md-3 ml-0 font-19 font-w700 d-flex align-items-center" data-toggle="modal" data-target="#modalcontact" href="#modalcontact">
					  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M17.707,12.293c-0.391-0.391-1.023-0.391-1.414,0l-1.594,1.594c-0.739-0.22-2.118-0.72-2.992-1.594 s-1.374-2.253-1.594-2.992l1.594-1.594c0.391-0.391,0.391-1.023,0-1.414l-4-4c-0.391-0.391-1.023-0.391-1.414,0L3.581,5.005 c-0.38,0.38-0.594,0.902-0.586,1.435c0.023,1.424,0.4,6.37,4.298,10.268s8.844,4.274,10.269,4.298c0.005,0,0.023,0,0.028,0 c0.528,0,1.027-0.208,1.405-0.586l2.712-2.712c0.391-0.391,0.391-1.023,0-1.414L17.707,12.293z M17.58,19.005 c-1.248-0.021-5.518-0.356-8.873-3.712c-3.366-3.366-3.692-7.651-3.712-8.874L7,4.414L9.586,7L8.293,8.293 C8.054,8.531,7.952,8.875,8.021,9.205c0.024,0.115,0.611,2.842,2.271,4.502s4.387,2.247,4.502,2.271 c0.333,0.071,0.674-0.032,0.912-0.271L17,14.414L19.586,17L17.58,19.005z"></path>
                     </svg>
                     <span class="d-none d-lg-inline-block">Contact</span>
                  </a>

				   <a class="headerbutton px-24 ml-lg-4 ml-md-3 ml-0 font-19 font-w700 d-flex align-items-center d-lg-none" href="https://qarabic.com/member-area/accounts/">
					  <i class="fas fa-sign-in-alt mr-1"></i><span class="d-none d-lg-inline-block">Login</span>
                  </a>
				   
               </div>
				
				<div class="d-flex align-items-center">
					<a class="header-button ml-lg-2 ml-md-2 ml-0 font-17 d-flex align-items-center" href="https://qarabic.com/member-area/accounts/">
                     <span class="d-none d-lg-inline-block"><i class="fas fa-sign-in-alt mr-1"></i>Students Login</span>
                  	</a>
					<a class="header-button ml-lg-2 ml-md-2 ml-0 font-17 d-flex align-items-center" href="https://qarabic.com/free-trial/">
                     <span class="d-none d-lg-inline-block"><i class="fa fa-user mr-1"></i> Free Trial</span>
                  	</a>
				</div>
				
            </div>
         </div>
      </div>
   </div>
   
	<div class="blockmenusfull bg-primary text-white pt-5 pb-5 py-lg-0">
				<a class="blockmenusfull__close position-absolute d-block">
					<img class="img-h20" src="https://qarabic.com/wp-content/themes/qarabic/assets/img/icon23w.svg" alt="Close">
				</a>
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-12 col-sm-6 col-md-4 mb-3">
									<h4 class="font-lg-25 font-25 mb-3 text-secondary">
										Quick Links
									</h4>
									
									<?php
									wp_nav_menu( 
										array( 
											'theme_location' => 'quick', 
											'menu_class' => 'blockmenusfull__links2' 
										) 
									);
									?>
									
								</div>
								
							</div>
						</div>
						
						<div class="col-lg-12 order-1 order-lg-2 mb-3">
							<h4 class="font-lg-25 font-25 mb-3 text-secondary">
								Adult Courses
							</h4>
							
							<?php
							wp_nav_menu( 
								array( 
									'theme_location' => 'adultsmenu', 
									'menu_class' => 'blockmenusfull__links mb-2' 
									) 
								);
							?>
						</div>
						
						<div class="col-lg-12 order-1 order-lg-2">
							<h4 class="font-lg-25 font-25 mb-3 text-secondary">
								Kids Courses
							</h4>
							
							<?php
							wp_nav_menu( 
								array( 
									'theme_location' => 'kidsmenu', 
									'menu_class' => 'blockmenusfull__links mb-2' 
									) 
								);
							?>
						</div>
					</div>
				</div>
			</div>
	
	
	
 
</header>