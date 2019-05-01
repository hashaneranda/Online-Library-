<template>

        <!-- Start Single Product -->
        <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="product__thumb">
                <router-link class="first__img" :to="{name : 'book', params: {id : book.id}}"><img :src="`/storage/images/${book.image}`" alt="product image"></router-link>

                <div class="hot__box" :class="{ 'color--2' : this.book.type == 1 ? true : false }">
                    <span class="hot-label">{{ type }}</span>
                </div>
            </div>
            <div class="product__content content--center">
                <h4><router-link :to="{name : 'book', params: {id : book.id}}">{{ book.title }}</router-link></h4>
                <ul class="prize d-flex">
                    <li>{{ book.category }}</li>

                </ul>
                <div class="action">
                    <div class="actions_inner">
                        <a :href="`/storage/docs/${book.filename}`">Download</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Single Product -->

</template>




<script>



  export default {
    props: {
        book : Object
    },
    data() {
      return {
          type: ''
      }
    },
    created() {
        this.book.type == 0 ?
            this.type = 'Public' :
            this.type = 'Rare' ;
    },
    methods: {

    }
  }
</script>
