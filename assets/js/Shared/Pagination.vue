<template>
  
  <div class="mt-6">
      <Link :href="`${url}=${paging.page - 1}`" 
      :class="paging.prevPage ? '' : 'text-gray-400 pointer-events-none'"
      class="px-1"
      >Prev</Link>
      <Link :href="`${url}=${i}`" v-for="i in paging.pageCount" :key="i"
      class="px-1"
      :class="paging.page == i ? 'font-bold' : ''"
      >{{ i }}</Link>
      <Link :href="`${url}=${paging.page + 1}`"
      class="px-1"
      :class="paging.nextPage ? '' : 'text-gray-400 pointer-events-none'"
      >Next</Link>
    </div>
</template>

<script>
import {Link} from '@inertiajs/vue3'

export default {
  props: {
    paging: Array,
    url: String
  },
  components: {Link}
}
</script>