
<script>
export default {
name:'Loader'
}
</script>

<template>
    <div class="wrapper-mb">
        <div class="loader-container">
            <div class="ghost-loader">
            <img src="img/logo.png" alt="Fantasma">

            </div>
  </div>
    </div>
</template>

<style lang="scss" scoped>
/* Rimuovi la definizione per il corpo del fantasma */
.wrapper-mb {
    position: relative;
  height: 200px;
}

.ghost-loader {
  width: 160px;
  height: 70px;
  position: absolute;
  top: 65px;
  left: 45%;
  transform: translateX(-50%);
  animation: float 2s ease-in-out infinite, rotate 3s linear infinite;
}

/* Modifica la posizione degli occhi, se necessario */


@keyframes float {
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-15px);
  }
  100% {
    transform: translateY(0);
  }
}
@keyframes rotate {
  0% {
    transform: rotate(0);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
