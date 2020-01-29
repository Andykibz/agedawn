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
            <span>Merchandise:</span>
          </h6>
          <router-link class="dropdown-item" to="#">Products</router-link>
          <router-link class="dropdown-item" to="#">Categories</router-link>
          <router-link class="dropdown-item" to="#">Attributes</router-link>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">
            <i class="fas fa-fw fa-record-vinyl"></i>
            <span>Media:</span>
          </h6>
          <router-link class="dropdown-item" to="#">Categories</router-link>
          <router-link class="dropdown-item" to="#">Attributes</router-link>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>
    </ul>
  </template>