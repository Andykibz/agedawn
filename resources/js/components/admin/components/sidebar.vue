<template>
  <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <router-link class="nav-link" :to="{name:'index'}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </router-link>
      </li>
      <li class="nav-item">
        <router-link :to="{ name: 'article' }" class="nav-link">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Articles</span>
        </router-link>
      </li>      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Shop</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">
            <i class="fas fa-fw fa-tshirt"></i>
            <span>Products:</span>
          </h6>
          <router-link class="dropdown-item" :to="{ name  : 'products' }">Products</router-link>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">
            <i class="fas fa-fw fa-record-vinyl"></i>
            <span>Orders:</span>
          </h6>
          <router-link class="dropdown-item" :to="{ name  : 'orders' }">Orders</router-link>
          
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="infosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-info"></i>
          <span>Settings and Info</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="infosDropdown">
          <h6 class="dropdown-header">
            <i class="fas fa-fw fa-drum"></i>
            <span>Info </span>
          </h6>
          <router-link class="dropdown-item" :to="{ name  : 'band' }">Band Members</router-link>
          <router-link class="dropdown-item" :to="{ name  : 'adawnage' }">Adawnage</router-link>
          <router-link class="dropdown-item" :to="{ name  : 'metas' }">Metas</router-link>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">
            <i class="fas fa-fw fa-sliders-h"></i>
            <span>Settings:</span>
          </h6>
          <router-link class="dropdown-item" :to="{ name  : 'users' }">User Management</router-link>
          
        </div>
      </li>

      <!-- <li class="nav-item">
        <router-link :to="{ name: 'info' }" class="nav-link">
          <i class="fas fa-fw fa-info"></i>
          <span>Info</span>
        </router-link>
      </li> -->

    </ul>
  </template>