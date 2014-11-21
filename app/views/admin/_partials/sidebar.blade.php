<div class="main-navigation navbar-collapse collapse">
					<!-- start: MAIN MENU TOGGLER BUTTON -->
					<div class="navigation-toggler">
						<i class="clip-chevron-left"></i>
						<i class="clip-chevron-right"></i>
					</div>
					<!-- end: MAIN MENU TOGGLER BUTTON -->
					<!-- start: MAIN NAVIGATION MENU -->
					<ul class="main-navigation-menu">
						<li rel="leftmenu-root-dashboard">
							<a href="{{ URL::to(Config::get('app.adminPrefix'). '/users/dashboard') }}"><i class="clip-home-3"></i>
								<span class="title"> Dashboard </span><span class="selected"></span>
							</a>
						</li>
						<li rel="leftmenu-root-directory">
							<a href="{{ URL::to(Config::get('app.adminPrefix'). '/users/list') }}"><i class="clip-book"></i>
								<span class="title"> Directory </span><span class="selected"></span>
							</a>
						</li>
						<li>
							<a href="{{ URL::to(Config::get('app.adminPrefix'). '/users/dashboard') }}"><i class="clip-clock"></i>
								<span class="title"> Shift Schedule </span><span class="selected"></span>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="fa fa-envelope-o"></i>
								<span class="title"> Message Center </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="#">
										<span class="title"> Inbox </span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title"> Sent Items </span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title"> Compose Message </span>
									</a>
								</li>
							</ul>
						</li>
						<li rel="leftmenu-root-approvals">
							<a href="javascript:void(0)"><i class="clip-checkmark-circle"></i>
								<span class="title"> Approvals </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="#">
										<span class="title"> Shift Registrations </span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title"> User Registrations </span>
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="clip-note"></i>
								<span class="title"> Report Management </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="#">
										<span class="title">Schedules</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">User History</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Shift History</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Contact Sheet</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Assignments</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Request Form</span>
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="clip-cogs"></i>
								<span class="title"> Organization Settings </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="#">
										<span class="title">Address</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Branding</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Language</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Localization</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Terms and Conditions</span>
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="clip-user-2"></i>
								<span class="title">System Management</span>
								<i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="#">
										<span class="title">Approval s</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Categories</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Roles</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Skills</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
					<!-- end: MAIN NAVIGATION MENU -->
				</div>