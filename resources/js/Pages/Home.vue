<script setup>
import Layout from '../Layout/App.vue'
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import AppHead from '../Layout/AppHead.vue'

const page = usePage()

const user = computed(() => page.props.user)

defineOptions({ layout: Layout })
</script>
<template>
  <AppHead title="Home" />
  <v-layout>
    You are logged in as: {{ user.name }}
  </v-layout>
</template>
