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

  export default {
    mounted() {
      const canvas = this.$refs.webgl
      let scene, camera, renderer, model

      // Scene
      scene = new THREE.Scene()

      // Camera
      camera = new THREE.PerspectiveCamera(75, canvas.offsetWidth / canvas.offsetHeight, 0.1, 1000)
      camera.position.z = 5
      scene.add(camera)

        //slogan
      const sloganElement = document.querySelector('.slogan-container')
        sloganElement.style.opacity = '0'
        sloganElement.style.transform = 'translateY(20px)'

        setTimeout(() => {
        sloganElement.style.transition = 'opacity 1s, transform 1s'
        sloganElement.style.opacity = '1'
        sloganElement.style.transform = 'translateY(0)'
        }, 1500)



      // Model
      const gltfLoader = new GLTFLoader()
      gltfLoader.load(
        '/threeObjects/ghost.gltf',
        (gltf) => {
          model = gltf.scene
          model.position.set(-1, -3, 0)

          model.scale.set(1.5, 1.5, 1.5)
          scene.add(model)
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
      renderer = new THREE.WebGLRenderer({ canvas, antialias: true })
      renderer.setSize(canvas.offsetWidth, canvas.offsetHeight)

      // Animation
      const animate = () => {
        requestAnimationFrame(animate)

        if (model) {
        //   model.rotation.y += 0.01
        }

        renderer.render(scene, camera)
      }

      animate()
    }
  }
  </script>

  <style>
    .canvas-container{
      position: relative;
      width: 100%;
      height: 600px;
    }
    .slogan-container {
    position: absolute;
    top: 270px;
    right: 250px;
    color: white;
    font-size: 24px;
    }
  </style>
