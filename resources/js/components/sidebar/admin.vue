<template>
    <div>

      <!-- Heading -->
      <div class="sidebar-heading">
        {{$t('system')}}
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="users">
          <i class="fas fa-fw fa-users"></i>
          <span>{{$t('users_1')}}</span>
        </a>
        <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{$t('users_2')}}</h6>
            <router-link :to="{ name: 'users.all'}" class="collapse-item">{{$t('users_3')}}</router-link>
            <router-link :to="{ name: 'users.suspended'}" class="collapse-item">{{$t('users_4')}}</router-link>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#system_settings" aria-expanded="true" aria-controls="system_settings">
          <i class="fas fa-fw fa-wrench"></i>
          <span>{{$t('system_settings')}}</span>
        </a>
        <div id="system_settings" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{$t('error_alert_title')}}</h6>
            <a class="collapse-item" href="#">{{$t('settings')}}</a>
            <a class="collapse-item" href="#">{{$t('deactivate_system')}}</a>
          </div>
        </div>
      </li>

    <hr class="sidebar-divider">
        <!-- Heading -->
      <div class="sidebar-heading">
        Blogs
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blog" aria-expanded="true" aria-controls="blog">
          <i class="fas fa-fw fa-pen"></i>
          <span>{{$t('blog')}}</span>
        </a>
        <div id="blog" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{$t('my_blog')}}</h6>
            <router-link :to="{ name: 'blogs.published'}" class="collapse-item">{{$t('published_blogs')}}</router-link>
            <router-link :to="{ name: 'blogs.pending'}" class="collapse-item">{{$t('pending_blogs')}}</router-link>
            <router-link :to="{ name: 'blogs.rejected'}" class="collapse-item">{{$t('rejected_blogs')}}</router-link>
          </div>
        </div>
      </li>
    <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reactions" aria-expanded="true" aria-controls="reactions">
          <i class="fas fa-fw fa-laugh"></i>
          <span>{{$t('reactions')}}</span>
        </a>
        <div id="reactions" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{$t('blog_reactions')}}</h6>
            <a class="collapse-item" href="#">{{$t('comments')}}</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Support
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-life-ring"></i>
          <span>Cases</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Support Cases:</h6>
            <a class="collapse-item" href="login.html">All</a>
            <a class="collapse-item" href="login.html">Open</a>
            <a class="collapse-item" href="register.html">Closed</a>
            <a class="collapse-item" href="forgot-password.html">Pending</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other:</h6>
            <a class="collapse-item" href="404.html">Blocked</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-bug"></i>
          <span>Report Bug</span></a>
      </li>

    </div>
</template>