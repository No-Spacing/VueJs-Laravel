<script setup>
import Layout from '../Layout/App.vue'
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()

const user = computed(() => page.props.auth.user)

defineOptions({ layout: Layout })
</script>
<template>
  <v-layout>
    You are logged in as: {{ user.name }}
  </v-layout>
</template>
