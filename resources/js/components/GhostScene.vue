<template>
    <div class="canvas-container">
      <canvas ref="webgl"></canvas>
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



      // Model
      const gltfLoader = new GLTFLoader()
      gltfLoader.load(
        '/threeObjects/ghost.gltf',
        (gltf) => {
          model = gltf.scene
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
      width: 100%;
      height: 600px;
    }
  </style>
