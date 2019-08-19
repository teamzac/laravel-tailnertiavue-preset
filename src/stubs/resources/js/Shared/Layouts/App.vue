<template>
  <div>
    <slot></slot>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      default: 'Page Title'
    }
  },

  data() {
    return {

    }
  },

  components: {

  },

  watch: {
    title: {
      handler: (val) => {
        let title = 'App Name'

        if (val) {
          if (typeof val == 'string') {
            val = [val]
          }

          title = `${val.join(' | ')} | ${title}`
        }

        document.title = title
      },
      immediate: true,
      deep: true
    }
  },

  mounted() {

  },

  methods: {

  },

  computed: {

  }
}
</script>