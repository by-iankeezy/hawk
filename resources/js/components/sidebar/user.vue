<template>
    <div>
      <!-- Heading -->
      <div class="sidebar-heading">
        My Blog
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="users">
          <i class="fas fa-fw fa-pen"></i>
          <span>{{$t('blog')}}</span>
        </a>
        <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
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
        {{$t('system')}}
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Profile:</h6>
            <a class="collapse-item" href="login.html">Profile Information</a>
            <a class="collapse-item" href="register.html">Update Profile Information</a>
            <a class="collapse-item" href="forgot-password.html">Recent Activity</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other:</h6>
            <a class="collapse-item" href="404.html">Deactivate Account</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-shield-alt"></i>
          <span>Security</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-bug"></i>
          <span>Report Bug</span></a>
      </li>
    </div>
</template>