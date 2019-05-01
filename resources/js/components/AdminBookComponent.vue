<template>

        <!-- Start Single Product -->
        <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="product__thumb">
                <a class="first__img" href="single-product.html"><img :src="`/storage/images/${book.image}`" alt="product image"></a>

                <div class="hot__box" :class="{ 'color--2' : this.book.type == 1 ? true : false }">
                    <span class="hot-label">{{ type }}</span>
                </div>
            </div>
            <div class="product__content content--center">
                <h4><a href="single-product.html">{{ book.title }}</a></h4>
                <ul class="prize d-flex">
                    <li>{{ book.category }}</li>

                </ul>
                <div class="action">
                    <div class="actions_inner">
                        <router-link class="text-primary m-2" :to="{name : 'editBook', params: {id : book.id}}">Edit</router-link>
                        <a class="text-danger m-2" href="" @click.prevent="deleteBook">Delete</a>
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
        deleteBook() {
            api.call('get', '/api/book/'+this.book.id)
                .then(({data}) => {
                    this.$router.push('/');
                })
                .catch(({response}) => {
                    console.log(response.data.message);
                });
        }
    }
  }
</script>
