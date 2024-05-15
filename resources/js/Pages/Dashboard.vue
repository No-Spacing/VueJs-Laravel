<script>
  import { mergeProps } from 'vue'

  export default {
    data: () => ({
      items: [
        { title: 'Logout', href: '/logout', },
      ],
    }),
    methods: {
      mergeProps,
    },
  }
</script>

<template>
    <v-layout>
        <v-app-bar :elevation="2">
            <template v-slot:prepend>
                <v-app-bar-nav-icon></v-app-bar-nav-icon>
            </template>

            <v-app-bar-title>Dashboard</v-app-bar-title>

            <template v-slot:append>
                <v-menu>
                    <template v-slot:activator="{ props: menu }">
                        <v-tooltip location="top">
                        <template v-slot:activator="{ props: tooltip }">
                            <v-btn 
                            icon="mdi-dots-vertical"
                            v-bind="mergeProps(menu, tooltip)"
                            >
                            </v-btn>
                        </template>
                        <span>Expand</span>
                        </v-tooltip>
                    </template>
                    <v-list>
                        <v-list-item
                        v-for="(item, index) in items"
                        :key="index"
                        :href="item.href"
                        >
                        <v-list-item-title>{{ item.title }}</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>
                
            </template>
        </v-app-bar>
    </v-layout>
</template>
