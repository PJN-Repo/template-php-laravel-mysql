<template>
  <div>
    <v-container>
      <div class="row">
        <div
         class="col-md-3 col-sm-3 col-xs-12"
        >
          <v-card outlined>
            <v-card-title>Filters</v-card-title>
            <v-divider></v-divider>
            <v-card-title>Price</v-card-title>
            <v-range-slider
              v-model="range"
              :max="max"
              :min="min"
              :height="10"
              class="align-center"
              dense
            ></v-range-slider>
            <v-row class="pa-2" dense>
              <v-col cols="12" sm="5">
                <v-text-field
                  :value="range[0]"
                  label="Min"
                  outlined
                  dense
                  @change="$set(range, 0, $event)"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="2">
                <p class="pt-2 text-center">TO</p>
              </v-col>
              <v-col cols="12" sm="5">
                <v-text-field
                  :value="range[1]"
                  label="Max"
                  outlined
                  dense
                  @change="$set(range, 1, $event)"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-btn
              elevation="2"
              class="ml-3 mb-5"
              @click="filter(page, range[0], range[1])"
            >APPLY</v-btn>
          </v-card>
        </div>
        <div
          class="col-md-9 col-sm-9 col-xs-12"
        >

          <v-breadcrumbs class="pb-0" :items="breadcrums"></v-breadcrumbs>

          <div class="row text-center">
            <div class="col-md-3 col-sm-6 col-xs-12" :key="sneaker.id" v-for="sneaker in sneakers">
              <v-hover v-slot:default="{ hover }">
                <v-card
                  class="mx-auto"
                  color="grey lighten-4"
                  max-width="600"
                >
                  <v-img
                    class="white--text align-end"
                    :aspect-ratio="16/9"
                    height="200px"
                    :src="sneaker.media.imageUrl"
                  >
                    <v-card-title class="text--secondary">{{sneaker.brand}} </v-card-title>
                    <v-expand-transition>
                      <div
                        v-if="hover"
                        class="d-flex transition-fast-in-fast-out white darken-2 v-card--reveal display-3 white--text"
                        style="height: 100%;"
                      >
                        <v-btn v-if="hover" href="/product" class="" outlined>VIEW</v-btn>
                      </div>

                    </v-expand-transition>
                  </v-img>
                  <v-card-text class="text--primary">
                    <div><a href="/product" style="text-decoration: none">{{sneaker.name}}</a></div>
                    <div>${{sneaker.retailPrice}}</div>
                  </v-card-text>
                </v-card>
              </v-hover>
            </div>
          </div>
          <div class="text-center mt-12">
            <v-pagination
              v-model="page"
              :length="10"
              @input="next"
            ></v-pagination>
          </div>
        </div>
      </div>
    </v-container>
  </div>
</template>
<style>
  .v-card--reveal {
    align-items: center;
    bottom: 0;
    justify-content: center;
    opacity: .8;
    position: absolute;
    width: 100%;
  }
</style>
<script>
    export default {
        data: () => ({
            range: [0, 300],
            page:1,
            breadcrums: [
                {
                    text: 'Home',
                    disabled: false,
                    href: 'breadcrumbs_home',
                },
                {
                    text: 'Clothing',
                    disabled: false,
                    href: 'breadcrumbs_clothing',
                },
                {
                    text: 'T-Shirts',
                    disabled: true,
                    href: 'breadcrumbs_shirts',
                },
            ],
            min:0,
            max:300,
            sneakers:[
                
            ]
        }),
        methods: {
          next (page) {
            this.$axios
              .get('http://127.0.0.1:8000/api/v1/sneakers/' + page)
              .then(response => (this.sneakers = response.data))
              .catch(error => console.log(error))

            this.min = 0;
            this.max = 300;
            this.range[0] = 0;
            this.range[1] = 300;
          },
          filter (page, min, max) {
            this.$axios
            .get('http://127.0.0.1:8000/api/v1/sneakers/' + page + '/' + min + '/' + max)
            .then(response => (this.sneakers = response.data))
            .catch(error => console.log(error))
          }
        },
        mounted () {
          this.$axios
            .get('http://127.0.0.1:8000/api/v1/sneakers/')
            .then(response => (this.sneakers = response.data))
            .catch(error => console.log(error))
        }
    }
</script>
