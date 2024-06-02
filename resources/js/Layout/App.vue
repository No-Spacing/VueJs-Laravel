<script>
import { mergeProps } from 'vue'

export default {
  
  data: () => ({
    drawer: false,
    group: null,
    items: [
      { title: 'Logout', href: '/logout', },
    ],
    list: [
        {
          title: 'Home',
          value: 'home',
        },
        {
          title: 'About Us',
          value: 'about',
        },
        {
          title: 'Contact Us',
          value: 'contact',
        },,
      ],
  }),

  methods: {
    mergeProps,
  },
}
</script>
<template>
  <main>
    <v-layout>
      <v-app-bar
        color="primary"
        prominent
      >
        <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

        <v-toolbar-title>Dashboard</v-toolbar-title>

        <v-spacer></v-spacer>

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

      <v-navigation-drawer
        v-model="drawer"
        :location="$vuetify.display.mobile ? 'bottom' : undefined"
        temporary
      >
        <v-list
          :items="list"
        ></v-list>
      </v-navigation-drawer>

      <v-main style="height: 500px;">
        <v-card-text>
          <article>
              <slot />
          </article>
        </v-card-text>
      </v-main>
    </v-layout>
  </main>
</template>