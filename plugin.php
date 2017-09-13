<?php

class pluginAdminBar extends Plugin {

private $enable;

public function siteHead()
{
    return '
    <style>
    #admin-strip {
      background: #1e1e20;
      color: #65656d;
      display: block;
      overflow: hidden;
      width: 100%;
      padding: 1rem;
      position: fixed;
      bottom: 0;
      z-index: 999;
    }
    #admin-strip ul {
      margin: 0.5rem;
      padding: 0;
      overflow: hidden;
    }
    #admin-strip ul li {
      display: inline-block;
      list-style: none;
      margin: 0;
      padding: 0;
    }
    #admin-strip .float-me-to-the-right {
      float: right;
    }
    #admin-strip .you-gotta-spot-this {
      color: #808687;
    }
    #admin-strip .you-gotta-spot-this strong {
      color: #8e9596;
    }
    #admin-strip a {
      display: block;
      vertical-align: middle;
    }
    #admin-strip a:link, #admin-strip a:visited {
      color: #7e7e90;
    }
    #admin-strip a:hover, #admin-strip a:active {
      color: #ff8c00;
    }
    #admin-strip .action-buttons {
      font-size: 1.6rem;
      margin:10px 0 20px 0;
    }
    #admin-strip .admin-new-post, #admin-strip .admin-new-page {
      background: #3d3d42;
      color: #fff !important;
      padding: 0.3rem;
      border-radius: 6px;
      -moz-border-radius: 6px;
      -webkit-border-radius: 6px;
      margin: 0.2rem 0.6rem;
      padding: 0.3rem 1rem;
    }
    #admin-strip .admin-new-post:hover, #admin-strip .admin-new-page:hover {
      background: #a7c520;
      color: #1e1e20 !important;
      text-decoration: none;
    }
    #admin-strip .admin-edit-item{
      background: #88a825;
      color: #fff !important;
      padding: 0.3rem;
      border-radius: 6px;
      -moz-border-radius: 6px;
      -webkit-border-radius: 6px;
      margin: 0.2rem 0.6rem;
      padding: 0.3rem 1rem;
    }
    #admin-strip .admin-edit-item:hover{
      background: #fff;
      color: #52631b !important;
      text-decoration: none;
    }
    #admin-strip .admin-page-logout {
      background: #ff2d00;
      color: #fff !important;
      padding: 0.3rem;
      border-radius: 3px;
      -moz-border-radius: 3px;
      -webkit-border-radius: 3px;
      margin: 0.2rem 0.6rem;
      padding: 0.3rem 2rem;
    }
    #admin-strip .admin-page-logout:hover {
      background: #a7c520;
      color: #1e1e20 !important;
      text-decoration: none;
    }
    #admin-strip .info-list {
      font-size: 1.3rem;
      line-height: 1.6rem;
    }
    @media (max-width: 768px) {
      #admin-strip .float-me-to-the-right {
        float: none;
      }
      #admin-strip .info-list {
        display: none;
      }
      #admin-strip .action-buttons {
        font-size: 1.2rem;
        line-height: 1.2rem;
      }
      #admin-strip .action-buttons li {
        display: block;
      }
      #admin-strip .action-buttons li a {
        display: block;
        margin: 0.5rem 0;
        padding: 1rem;
      }
    }
    </style>
    ';
}

  public function siteBodyEnd()
	{
    global $Login;
    global $L;
    global $Url;
    global $Site;
    global $Post;
    global $Page;
		if($Login->role()=='admin') {
			echo'
      <div id="admin-strip">
        <ul class="action-buttons">
          <li><a href="'.HTML_PATH_ADMIN_ROOT.'new-post" class="admin-new-post">New post</a></li>
          <li><a href="'.HTML_PATH_ADMIN_ROOT.'new-page" class="admin-new-page">New Page</a></li>';
          if($Url->whereAmI()=='post') { echo '<li><a href="'.HTML_PATH_ADMIN_ROOT.'edit-post/'.$Post->slug().'" target="_blank" class="admin-edit-item">Edit post</a></li>';};
          if($Url->whereAmI()=='page') { echo '<li><a href="'.HTML_PATH_ADMIN_ROOT.'edit-page/'.$Page->slug().'" target="_blank" class="admin-edit-item">Edit page</a></li>';};
          echo '<li><a href="'.HTML_PATH_ADMIN_ROOT.'" class="admin-panel">Admin Panel</a></li>
          <li class="float-me-to-the-right"><a href="'.HTML_PATH_ADMIN_ROOT.'/logout'.'" class="admin-page-logout">Logout</a></li>
        </ul>
        <ul class="info-list">
          <li class="you-gotta-spot-this">'.$Site->title().'</li>
          <li >Logged in as: <strong>'.$Login->username().'</strong> </li>
          <li>Locale <strong>'.$Site->locale().'</strong></li>
          <li>Timezone <strong>'.$Site->timezone().'</strong></li>
          <li>Theme <strong>'. $theme = $Site->theme().'</strong></li>
          <li>Build <strong>'. $Site->currentBuild().'</strong></li>
        </ul>
      </div>';

			return $html;
		}

		return false;
	}

}
