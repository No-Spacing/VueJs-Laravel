<script>
import { mergeProps } from 'vue'

export default {
  
  data: () => ({
    drawer: false,
    group: null,
    items: [
      { title: 'Logout', href: '/logout', },
    ],
    lists: [
        {
          title: 'Home',
          href: '/home',
        },
        {
          title: 'About Us',
          href: '/about',
        },
        {
          title: 'Contact Us',
          href: '#',
        },
      ],
  }),

  methods: {
    mergeProps,
  },
}

</script>
<template>
  <Head :title="title ? `${title} - My App` : 'My App'"></Head>
  <main>
    <v-layout>
      <v-app-bar
        color="primary"
        prominent
      >
        <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

        <v-toolbar-title></v-toolbar-title>

        <v-spacer></v-spacer>

        <template v-slot:append>
          <v-menu>
            <template v-slot:activator="{ props: menu }">
              
                  <v-btn 
                  icon="mdi-account"
                  v-bind="mergeProps(menu, tooltip)"
                  >
                  </v-btn>
                
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
        <v-list>
          <v-list-item
          v-for="(list, x) in lists"
          :key="x"
          :href="list.href"
          >
            <v-list-item-title>{{ list.title }}</v-list-item-title>
          </v-list-item>
        </v-list> 
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