<template>
  <footer class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright © Adawnage.com {{ year }}</span>
      </div>
    </div>
  </footer>
</template>
<script>
export default {
  computed:{
    year : () => { return new Date().getFullYear() }
  }
}
</script>