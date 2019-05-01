<template>
<div>
    <!-- Start Search Popup -->
		<div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here..." v-model="serachquery" v-on:keyup.enter="autoComplete">

				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->
    <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Browse Books</h2>
                            <nav class="bradcaump-content">

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Shop Page -->
        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        	<div class="container">
        		<div class="row">

        			<div class="col-lg-12">

        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        					<div class="row">


                                    <component
                                        :is="mycomponent"
                                        v-for="book in books"
                                        :key="book.id"
                                        :book="book"
                                    ></component>


	        					</div>

	        				</div>

        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Shop Page -->
</div>
</template>



<script>


  import BookComponent from '../components/BookComponent.vue';
  import AdminBookComponent from '../components/AdminBookComponent.vue';

  export default {
    data() {
      return {
          books : [],
          user : auth.user,
          mycomponent : null,
          serachquery : null
      }
    },
    methods: {
        autoComplete() {
            this.books = [];


            api.call('get', '/api/book/search', {params: {searchquery: this.serachquery}})
                .then(response => {
                    this.books = response.data;
                });

        }
    },
    created() {
        let url = '/api/books';
        if(this.user.user_type == 2){
            url = '/api/book';
        }

        api.call('get', url)
        .then(({data}) => {
            this.books = data.data;
        });


        if(this.user.user_type == 0){
            this.mycomponent = AdminBookComponent;
        }else{
            this.mycomponent = BookComponent;
        }
    },
    components: {
        BookComponent,
        AdminBookComponent
    }
  }
</script>
