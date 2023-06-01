import { createApp, h } from 'vue'
import { Link, createInertiaApp, Head } from '@inertiajs/vue3'
import Layout from './Shared/Layout'

createInertiaApp({
  resolve: async name => {
    let page = (await import(`./Pages/${name}`)).default;
    if (! page.layout) {
      page.layout = Layout;
    } 
    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Head', Head)
      .mount(el)
  },
  title: (title) => {
    return 'My App - ' + title
  },
  progress: {
    color: 'red',
    showSpinner: true,
  },
})