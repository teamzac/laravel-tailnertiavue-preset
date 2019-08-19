import Vue from 'vue'

import { InertiaApp } from '@inertiajs/inertia-vue'
Vue.use(InertiaApp)

import PortalVue from 'portal-vue'
Vue.use(PortalVue)

Vue.mixin({ methods: { route: (...args) => window.route(...args).url() } })
Vue.config.productionTip = false

Vue.component('layout', require('./Shared/Layouts/App.vue').default)

/** Create an event bus */
window.EventBus = new Vue()
Object.defineProperty(Vue.prototype, '$bus', {
    get() {
        return window.EventBus
    }
})

Vue.use((Vue) => {
  Vue.prototype.$bubble = function $bubble(eventName, ...args) {
    let component = this
    do {
      component.$emit(eventName, ...args)
      component = component.$parent
    } while (component)
  }
})

// Register the app
const app = document.getElementById('app')
new Vue({
  render: h => h(InertiaApp, {
    props: {
      initialPage: JSON.parse(app.dataset.page),
      resolveComponent: name => import(`@/Pages/${name}`).then(module => module.default),
    },
  }),
}).$mount(app)
