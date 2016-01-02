<div class="row  ">
        <nav style="margin-bottom: 0;" role="navigation" class="navbar navbar-static-top nav-inside">
        <div class="navbar-header">
            <a href="javascript:void(0)" class="navbar-minimalize minimalize-btn btn btn-primary "><i class="fa fa-bars"></i> </a>
            
        </div>

            <ul class="nav navbar-top-links navbar-right">
            <li>

            </li>
         <li>   
			<a href="#" data-toggle="dropdown" class="dropdown-toggle count-info" aria-expanded="true"
            >
		        <i class="fa fa-envelope"></i>  <span class="notif-alert label label-danger">0</span>
		    </a>
                <ul class="dropdown-menu dropdown-alerts notif-value" code="{{ url()}}">
                	<li><div class="text-center link-block"><a href="{{ url('notification') }}"><strong>View All Notification</strong> <i class="fa fa-angle-right"></i></a></div></li>

                </ul>

        </li>            
		@if(CNF_MULTILANG ==1)
		<li  class="user dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-flag"></i><i class="caret"></i></a>
			 <ul class="dropdown-menu dropdown-menu-right icons-right">
				@foreach(SiteHelpers::langOption() as $lang)
					<li><a href="{{ URL::to('home/lang/'.$lang['folder'])}}"><i class="icon-flag"></i> {{  $lang['name'] }}</a></li>
				@endforeach	
			</ul>
		</li>	
		@endif			
		@if(Auth::user()->group_id == 1)
		<li class="user dropdown"><a class="dropdown-toggle" href="javascript:void(0)"  data-toggle="dropdown"><i class="fa fa-desktop"></i> <span>{{ Lang::get('core.m_controlpanel') }}</span><i class="caret"></i></a>
		  <ul class="dropdown-menu dropdown-menu-right icons-right">
		   
		  	<li><a href="{{ URL::to('sximo/config')}}"><i class="fa  fa-wrench"></i> {{ Lang::get('core.m_setting') }}</a></li>
			<li><a href="{{ URL::to('core/users')}}"><i class="fa fa-user"></i> {{ Lang::get('core.m_users') }} &  {{ Lang::get('core.m_groups') }} </a></li>
			<li><a href="{{ URL::to('core/users/blast')}}"><i class="fa fa-envelope"></i> {{ Lang::get('core.m_blastemail') }} </a></li>	
			<li><a href="{{ URL::to('core/logs')}}"><i class="fa fa-clock-o"></i> {{ Lang::get('core.m_logs') }}</a></li>	
			<li class="divider"></li>
			<li><a href="{{ URL::to('core/pages')}}"><i class="fa fa-copy"></i> {{ Lang::get('core.m_pagecms')}}</a></li>
			
			<li class="divider"></li>
			<li><a href="{{ URL::to('sximo/module')}}"><i class="fa fa-cogs"></i> {{ Lang::get('core.m_codebuilder') }}</a></li>
			<li><a href="{{ URL::to('sximo/tables')}}"><i class="icon-database"></i> Database Tables </a></li>
			<li><a href="{{ URL::to('sximo/menu')}}"><i class="fa fa-sitemap"></i> {{ Lang::get('core.m_menu') }}</a></li>	
			<li class="divider"></li>
			<li><a href="{{ URL::to('core/template')}}"><i class="fa fa-desktop"></i> Template Guide </a></li>

		  </ul>
		</li>
		@endif
		
		<li class="user dropdown"><a class="dropdown-toggle" href="javascript:void(0)"  data-toggle="dropdown"><i class="fa fa-user"></i> <span>{{ Lang::get('core.m_myaccount') }}</span><i class="caret"></i></a>
		  <ul class="dropdown-menu dropdown-menu-right icons-right">
		  	<li><a href="{{ URL::to('dashboard')}}"><i class="fa  fa-laptop"></i> {{ Lang::get('core.m_dashboard') }}</a></li>
			<li><a href="{{ URL::to('')}}" target="_blank"><i class="fa fa-desktop"></i>  Main Site </a></li>
			<li><a href="{{ URL::to('user/profile')}}"><i class="fa fa-user"></i> {{ Lang::get('core.m_profile') }}</a></li>
			<li><a href="{{ URL::to('core/elfinder')}}"><i class="fa fa-folder"></i>  File Manager </a></li>
			<li><a href="{{ URL::to('user/logout')}}"><i class="fa fa-sign-out"></i> {{ Lang::get('core.m_logout') }}</a></li>
		  </ul>
		</li>			
		
	 				
				
            </ul>

        </nav>
        </div>