<div class="headerd header-dark head-style-2">
	<div class="container">
		<nav id="navigation" class="navigation navigation-landscape">
			<div class="nav-header">
				<div class="nav-toggle"></div>
				<div class="nav-menus-wrapper">
					<ul class="nav-menu">

						<li><a href="<?= url('Home/index') ?>" class="pl-0">Home</a>
						</li>

						<li><a href="<?= url('Home/shoplist') ?>">Shop</a>
						</li>

						<li><a href="javascript:void(0);">Product</a>
							<ul class="nav-dropdown nav-submenu">
								<li><a href="shop-single-v1.html">Product Detail v01</a></li>
								<li><a href="shop-single-v2.html">Product Detail v02</a></li>
								<li><a href="shop-single-v3.html">Product Detail v03</a></li>
								<li><a href="shop-single-v4.html">Product Detail v04</a></li>
							</ul>
						</li>

						<li><a href="javascript:void(0);">Pages</a>
							<ul class="nav-dropdown nav-submenu">
								<li><a href="blog.html">Blog Style</a></li>
								<li><a href="about-us.html">About Us</a></li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="404.html">404 Page</a></li>
								<li><a href="privacy.html">Privacy Policy</a></li>
								<li><a href="faq.html">FAQs</a></li>
							</ul>
						</li>

						<li><a href="docs.html">Docs</a></li>
						<!-- <li><a href="javascript:void(0);" style="    margin-left: 553px;"><i class="lni lni-user mr-1"></i></a>
							<ul class="nav-dropdown nav-submenu">
								<li><a href="my-orders.html">My Order</a></li>
								<li><a href="wishlist.html">Wishlist</a></li>
								<li><a href="profile-info.html">Profile Info</a></li>
								<li><a href="addresses.html">Addresses</a></li>
								<li><a href="payment-methode.html">Payment Methode</a></li>
							</ul>
						</li> -->
						<li style="margin-left: 954px;margin-top: -53px;">
							<a href="#" onclick="openSearch()">
								<i class="lni lni-search-alt"></i>
							</a>
						</li>
						<li style="margin-left: 1014px;margin-top: -36px;color: white;">
						<i class="lni lni-user">
							
						</i>
							<ul class="nav-dropdown nav-submenu">
								<?php if (!empty(session('uid'))) { ?>
									<li><a href="<?= url('Home/login') ?>">SignIn</a></li>
									<li><a href="<?= url('Home/register') ?>">SignUp</a></li>
								<?php } else { ?>
									<li><a href="<?= url('Home/order') ?>">Your Order</a></li>
									<li><a href="<?= url('Home/register') ?>">Edit Profile</a></li>
									<li><a href="<?= url('Home/logout') ?>">Logout</a></li>
								<?php } ?>
							</ul>

						</li>
						<li style="margin-left: 1039px;margin-top: -53px;">
							<a href="<?= url('Home/wishlist') ?>" onclick="openWishlist()">
								<i class="lni lni-heart"></i>
								<?php
                            $db = \config\Database::Connect();
                            $builder = $db->table('wishlist');
                            $builder->select('count(id)as count_n');
                            $builder->where(array('user_id' => session('uid') ? session('uid') : session('guestid'), 'is_delete' => 0));
                            $query = $builder->get();
                            $count = $query->getRow();
                            ?>
								<span class="dn-counter bg-danger"><?= $count->count_n ?></span>
							</a>
						</li>
						<li style="margin-left: 1089px;margin-top: -53px;">
							<a  href="<?= url('Home/cart') ?>" onclick="openCart()">
								<i class="lni lni-shopping-basket"></i>
								<?php
                            $db = \config\Database::Connect();
                            $builder = $db->table('cart');
                            $builder->select('count(id)as count_n');
                            $builder->where(array('user_id' => session('id') ? session('id') : session('guestid'), 'is_delete' => 0));
                            $query = $builder->get();
                            $count = $query->getRow();
                            ?>
								<span class="dn-counter bg-success"><?= $count->count_n ?></span>
							</a>
						</li>
					</ul>
				</div>

			</div>
		</nav>
	</div>
</div>
