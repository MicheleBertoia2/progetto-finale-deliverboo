<template>
    <div>
        <div class="canvas-container">
          <canvas ref="webgl" class="w-100 h-100"></canvas>
        </div>
        <div class="slogan-container">
          <h1 class="slogan">Il mio Slogan</h1>
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
        }, 1500)




      // Model
      const gltfLoader = new GLTFLoader()
      gltfLoader.load(
        '/threeObjects/ghost.gltf',
        (gltf) => {
          model = gltf.scene
          model.position.set(-4, -2.5, 0)
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
        if(animationComplete){

            const mouse = {
                x: (event.clientX / window.innerWidth) * 2 - 1,
                y: -(event.clientY / window.innerHeight) * 2 + 1,
            };

            // original
            const direction = new THREE.Vector3(-mouse.x - 1, -mouse.y, 50)
                .unproject(camera)
                .sub(camera.position)
                .normalize();



            model.lookAt(model.position.clone().add(direction));
            }
        }
    },

    // beforeUnmount() {
    //   canvas.removeEventListener('mousemove', onMouseMove);
    // },
  }




  </script>

  <style>
    .canvas-container{
      position: relative;
      width: 100%;
      height: 600px;
      background-color: transparent;
    }
    .slogan-container {
    position: absolute;
    top: 270px;
    right: 250px;
    color: blue;
    font-size: 24px;
    }
  </style>
