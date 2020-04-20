<template>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{ page }}</li>
    </ol>  
</template>

<script>
export default {
  props: [ 'page' ]
}
</script>
