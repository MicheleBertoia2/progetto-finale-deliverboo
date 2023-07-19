
<script>
export default {
    name: 'Header'
}
</script>


<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark-green ">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.png" alt="logo" width="100" height="70">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link :to="{ name: 'home' }" class="nav-link">home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'about' }" class="nav-link">chi siamo</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'contacts' }" class="nav-link">contatti</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'Ristorante' }" class="nav-link">ristorante</router-link>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <i class="fa-solid fa-cart-shopping nav-link"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="jumbotron">
            <img src="img/jumbo.png" alt="jumbotron">
        </div>


    </header>
</template>

<style lang="scss" scoped>



.bg-dark-green {
    background-color: #3abfb4;
}

.jumbotron {
    height: 550px;
    width: 100vw;
    img {
        height: 100%;
        width: 100%;
    }
}
</style>
