<template>
  <nav class="main-header navbar navbar-expand navbar-warning navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#">
          <i class="fas fa-bars"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> <b>Test User</b>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item" @click="logout()">
            <i class="fa fa-sign-out"></i> Log Out
          </a>
        </div>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
    methods: {
        logout(){
            window.location.href = "/"
        }
    }
};
</script>
