<template>
    <div class="mb-wrapper">
        <div class="canvas-container">
          <canvas ref="webgl" class="w-100 h-100"></canvas>
        </div>
        <div class="slogan-container">
          <img src="/img/fantasminellostomaco.png" alt="">
        </div>
        <div class="logo-container flicker-in-1">
            <!-- <img src="/img/logojumbo.png" alt=""> -->
            <img src="img/logoscritta2.png" alt="">
        </div>
    </div>
  </template>

  <script>
  import * as THREE from 'three'
  import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader'

  import TWEEN from 'tween.js'

  export default {
    data() {
        return {
            animationComplete: false,
        };
    },

    methods:{

    },

    mounted() {
      const canvas = this.$refs.webgl
      let scene, camera, renderer, model
      let animationComplete

      // Scene
      scene = new THREE.Scene()
      scene.background = null

      // Camera
      camera = new THREE.PerspectiveCamera(75, canvas.offsetWidth / canvas.offsetHeight, 0.1, 1000)
      camera.position.set(2,2,5)
      scene.add(camera)

        //slogan
      const sloganElement = document.querySelector('.slogan-container')
        sloganElement.style.opacity = '0'
        sloganElement.style.transform = 'translateY(20px)'


        setTimeout(() => {
        sloganElement.style.transition = 'opacity 1s, transform 1s'
        sloganElement.style.opacity = '1'
        sloganElement.style.transform = 'translateY(0)'
        animationComplete = true;
        }, 2000)




      // Model
      const gltfLoader = new GLTFLoader()
      gltfLoader.load(
        '/threeObjects/ghost.gltf',
        (gltf) => {
          model = gltf.scene
          model.position.set(0, -2.5, 0)
          model.rotation.y = Math.PI / 4


          model.scale.set(1.5, 1.5, 1.5)
          scene.add(model)

          //animazione iniziale

            const cameraPositionTween = new TWEEN.Tween(camera.position)
            .to({ x: 0, y: 0, z: 5 }, 2000) // Animiamo la posizione della telecamera verso la posizione frontale (x: 0, y: 0, z: 5) in 2000 ms
            .easing(TWEEN.Easing.Quadratic.InOut) // Utilizziamo un'animazione di tipo quadratic easing per una transizione più naturale
            .onUpdate(() => {
                camera.lookAt(0, 0, 0) // Puntiamo sempre il centro della scena (dove si trova il modello)
            })

            // Creiamo una tween per l'animazione del target della telecamera
            const cameraTargetTween = new TWEEN.Tween(camera.target)
            .to({ x: 0, y: 0, z: 0 }, 2000) // Animiamo il target della telecamera verso il centro della scena (dove si trova il modello) in 2000 ms
            .easing(TWEEN.Easing.Quadratic.InOut)

            // Avviamo entrambe le tween contemporaneamente
            cameraPositionTween.start()
            cameraTargetTween.start()
        },
        undefined,
        (error) => {
            console.error('Error loading GLTF model:', error)
        }
        )

      const directionalLight = new THREE.DirectionalLight(0xffffff, 1)
        directionalLight.position.set(1, 2, 3) // Posiziona la luce direzionale
        scene.add(directionalLight)



      // Renderer
      renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true })
      renderer.setSize(canvas.offsetWidth, canvas.offsetHeight)

      canvas.addEventListener('mousemove', onMouseMove);
      window.addEventListener('resize', onWindowResize);

      // Animation
      const animate = () => {
        requestAnimationFrame(animate)
        TWEEN.update()
        if (model) {
        //    model.rotation.y += 0.01
        }

        renderer.render(scene, camera)
      }

      animate()


    function onMouseMove(event) {
        if (animationComplete) {
            const mouse = {
                x: (event.clientX / window.innerWidth) * 2 - 1,
                y: -(event.clientY / window.innerHeight) * 2 + 1,
            };

            // Resto del codice per il lookAt del modello
            const direction = new THREE.Vector3(-mouse.x - 1, -mouse.y, 50)
                .unproject(camera)
                .sub(camera.position)
                .normalize();

            model.lookAt(model.position.clone().add(direction));

        }
    }

    function onWindowResize() {
        console.log('ho cambiato');
        const width = window.innerWidth;
        const height = window.innerHeight;

        camera.aspect = width / height;
        camera.updateProjectionMatrix();

        renderer.setSize(width, height);
    }



},

    // beforeUnmount() {
    //   canvas.removeEventListener('mousemove', onMouseMove);
    // },
  }




  </script>

  <style lang="scss" scoped>
    .slogan-container {
        position: absolute;
        top: 39% !important;
        right: 10%;
        width: 50%;
        background-color: transparent;
    }
    .logo-container {
        position: absolute;
        top: 56% !important;
        right: 10%;
        width: 50%;
        background-color: transparent;

    }
    .slogan-container img{
        filter: invert(100%);
    }

    .logo-container img{
        filter: invert(100%);

    }
    .canvas-container{
      position: relative;
      width: 50%;
      height: 510px;
      /* background-color: #242a2c; */
      /* background-image: url('/public/img/i-like-food.svg');
      background-color: #DFDBE5; */
    }

    .mb-wrapper{
        height: 100%;
        position: relative;
        background-color: #242a2c;
      background-image: url('/public/img/bg-black-pattern.svg');

    }

    /*MEDIA  QUEERY */
    @media screen and (max-width: 768px) {
  .slogan-container,
  .logo-container {
    position: static;
    padding: 50px 40px 80px 40px;
    width: 100%;
  }

  .canvas-container {
    width: 100%;
  }
}

    /* animazioni*/
    .flicker-in-1 {
	-webkit-animation: flicker-in-1 4s linear 3s both;
	        animation: flicker-in-1 4s linear 3s both;
    }
/* ----------------------------------------------
 * Generated by Animista on 2023-7-28 16:50:26
 * Licensed under FreeBSD License.
 * See http://animista.net/license for more info.
 * w: http://animista.net, t: @cssanimista
 * ---------------------------------------------- */

/**
 * ----------------------------------------
 * @animation flicker-in-1
 * ----------------------------------------
 */
 @-webkit-keyframes flicker-in-1 {
  0% {
    opacity: 0;
  }
  10% {
    opacity: 0;
  }
  10.1% {
    opacity: 1;
  }
  10.2% {
    opacity: 0;
  }
  20% {
    opacity: 0;
  }
  20.1% {
    opacity: 1;
  }
  20.6% {
    opacity: 0;
  }
  30% {
    opacity: 0;
  }
  30.1% {
    opacity: 1;
  }
  30.5% {
    opacity: 1;
  }
  30.6% {
    opacity: 0;
  }
  45% {
    opacity: 0;
  }
  45.1% {
    opacity: 1;
  }
  50% {
    opacity: 1;
  }
  55% {
    opacity: 1;
  }
  55.1% {
    opacity: 0;
  }
  57% {
    opacity: 0;
  }
  57.1% {
    opacity: 1;
  }
  60% {
    opacity: 1;
  }
  60.1% {
    opacity: 0;
  }
  65% {
    opacity: 0;
  }
  65.1% {
    opacity: 1;
  }
  75% {
    opacity: 1;
  }
  75.1% {
    opacity: 0;
  }
  77% {
    opacity: 0;
  }
  77.1% {
    opacity: 1;
  }
  85% {
    opacity: 1;
  }
  85.1% {
    opacity: 0;
  }
  86% {
    opacity: 0;
  }
  86.1% {
    opacity: 1;
  }
  100% {
    opacity: 1;
  }
}
@keyframes flicker-in-1 {
  0% {
    opacity: 0;
  }
  10% {
    opacity: 0;
  }
  10.1% {
    opacity: 1;
  }
  10.2% {
    opacity: 0;
  }
  20% {
    opacity: 0;
  }
  20.1% {
    opacity: 1;
  }
  20.6% {
    opacity: 0;
  }
  30% {
    opacity: 0;
  }
  30.1% {
    opacity: 1;
  }
  30.5% {
    opacity: 1;
  }
  30.6% {
    opacity: 0;
  }
  45% {
    opacity: 0;
  }
  45.1% {
    opacity: 1;
  }
  50% {
    opacity: 1;
  }
  55% {
    opacity: 1;
  }
  55.1% {
    opacity: 0;
  }
  57% {
    opacity: 0;
  }
  57.1% {
    opacity: 1;
  }
  60% {
    opacity: 1;
  }
  60.1% {
    opacity: 0;
  }
  65% {
    opacity: 0;
  }
  65.1% {
    opacity: 1;
  }
  75% {
    opacity: 1;
  }
  75.1% {
    opacity: 0;
  }
  77% {
    opacity: 0;
  }
  77.1% {
    opacity: 1;
  }
  85% {
    opacity: 1;
  }
  85.1% {
    opacity: 0;
  }
  86% {
    opacity: 0;
  }
  86.1% {
    opacity: 1;
  }
  100% {
    opacity: 1;
  }
}


  </style>
