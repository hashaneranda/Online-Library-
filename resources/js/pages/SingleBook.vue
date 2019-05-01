<template>
    <div>
         <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Shop Single</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Shop Single</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start main Content -->
        <div class="maincontent bg--white pt--80 pb--55">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-12">
        				<div class="wn__single__product">
        					<div class="row">
        						<div class="col-lg-6 col-12">
        							<div class="wn__fotorama__wrapper">
	        							<div class="fotorama wn__fotorama__action" data-nav="thumbs">
		        							  <a :href="`/storage/images/${book.image}`"><img :src="`/storage/images/${book.image}`" alt=""></a>

	        							</div>
        							</div>
        						</div>
        						<div class="col-lg-6 col-12">
        							<div class="product__info__main">
        								<h1>{{book.title}}</h1>

        								<div class="price-box">
        									<span>LKR {{book.price}}</span>
        								</div>
										<div class="product__overview">

        									<p>Author : {{book.author}}</p>
        									<p>Publisher : {{book.publisher}}</p>
        									<p>Year : {{book.year}}</p>
        									<p>Type : <b>{{bookType}}</b></p>

        								</div>
                                        <div class="box-tocart d-flex">

        									<div class="addtocart__actions">
        										<a class="tocart p-2" :href="`/storage/docs/${book.filename}`" title="Add to Cart">Download</a>
        									</div>

        								</div>
										<div class="product_meta">
											<span class="posted_in">Categories:
												<p>{{book.category}}</p>
											</span>
										</div>

        							</div>
        						</div>
        					</div>
        				</div>
        				<div class="product__info__detailed">
							<div class="pro_details_nav nav justify-content-start" role="tablist">
	                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Details</a>

	                        </div>
	                        <div class="tab__container">
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
									<div class="description__attribute">
										<p>{{book.description}}</p>

									</div>
	                        	</div>
	                        	<!-- End Single Tab Content -->


	                        </div>
        				</div>


        			</div>

        		</div>
        	</div>
        </div>
        <!-- End main Content -->
		<!-- Start Search Popup -->
		<div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form--2" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->
    </div>
</template>




<script>



  export default {
    props: {
        id : Number
    },
    data() {
      return {
          book : {

          },
          bookType: null
      }
    },
    created() {
        if(this.id) {
            api.call('get', '/api/books/'+this.id)
            .then(({data}) => {
                this.book = data.data;
                data.data.type==0 ? bookType ="Public" : bookType ="Rare" ;
            })
            .catch(({response}) => {
            console.log(response.data.message);
            });
        }

    },
    methods: {

    }
  }
</script>
