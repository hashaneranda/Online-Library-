<template>
    <div>
        <div class="p-5"></div>
        <div class="container">
            <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Add Books</h5>
                    <form class="form-signin" @submit.prevent="addBook">
                         <div class="form-label-group">
                            <select class="form-control" id="exampleFormControlSelect1" required v-model="book.category" :class="{ 'is-invalid': submitted && $v.book.category.$error }">
                                <option value="Book">Book</option>
                                <option value="NewsPaper">NewsPaper</option>
                                <option value="Government Publication">Government Publication</option>
                                <option value="Ola leaf manuscript">Ola leaf manuscript</option>
                            </select>
                             <div v-if="submitted && !$v.book.category.required" class="invalid-feedback">Category is required</div>
                            <label for="exampleFormControlSelect1">Category</label>

                        </div>
                        <div class="form-label-group">
                            <input type="text" id="title" class="form-control" placeholder="Title" required autofocus v-model="book.title" :class="{ 'is-invalid': submitted && $v.book.title.$error }">
                             <div v-if="submitted && !$v.book.title.required" class="invalid-feedback">Title is required</div>
                            <label for="title">Title</label>
                        </div>
                        <div class="form-label-group">
                             <drop-zone ref="dropzone" id="dropzone" :options="dropzoneOptions"></drop-zone>
                            <label for="title">Image</label>
                        </div>

                        <img v-if="id && book.filename" :src="`/storage/images/${book.image}`">

                        <div class="form-label-group">
                            <input type="text" id="author" class="form-control" placeholder="Author" required autofocus v-model="book.author" :class="{ 'is-invalid': submitted && $v.book.author.$error }">
                             <div v-if="submitted && !$v.book.author.required" class="invalid-feedback">Author Name is required</div>
                            <label for="author">Author</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="isbn" class="form-control" placeholder="ISBN Number" required v-model="book.isbn_number" :class="{ 'is-invalid': submitted && $v.book.isbn_number.$error }">
                             <div v-if="submitted && !$v.book.isbn_number.required" class="invalid-feedback">ISBN Number is required</div>
                            <label for="isbn">ISBN Number</label>
                        </div>


                        <div class="form-label-group">
                            <input type="text" id="year" class="form-control" placeholder="Year" required v-model="book.year" :class="{ 'is-invalid': submitted && $v.book.year.$error }">
                             <div v-if="submitted && !$v.book.year.required" class="invalid-feedback">Year is required</div>
                            <label for="year">Year</label>
                        </div>
                        <div class="form-label-group">
                            <input type="number" id="price" class="form-control" placeholder="Price" required v-model="book.price" :class="{ 'is-invalid': submitted && $v.book.price.$error }">
                             <div v-if="submitted && !$v.book.price.required" class="invalid-feedback">Price is required</div>
                            <label for="price">Price (LKR)</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="publisher" class="form-control" placeholder="Publisher" required v-model="book.publisher" :class="{ 'is-invalid': submitted && $v.book.publisher.$error }">
                             <div v-if="submitted && !$v.book.publisher.required" class="invalid-feedback">Publisher Name is required</div>
                            <label for="publisher">Publisher</label>
                        </div>

                        <div class="form-label-group">
                            <select class="form-control" id="exampleFormControlSelect1" required v-model="book.type" :class="{ 'is-invalid': submitted && $v.book.type.$error }">
                                <option value="0">Public</option>
                                <option value="1">Rare</option>
                            </select>
                             <div v-if="submitted && !$v.book.type.required" class="invalid-feedback">Type is required</div>
                            <label for="exampleFormControlSelect1">Type</label>

                        </div>

                        <div class="form-label-group">

                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" v-model="book.description" :class="{ 'is-invalid': submitted && $v.book.description.$error }"></textarea>
                            <label for="exampleFormControlTextarea1">Description</label>
                            <div v-if="submitted && !$v.book.description.required" class="invalid-feedback">Description is required</div>
                        </div>

                        <div class="form-label-group">
                             <drop-zone ref="dropzonefile" id="dropzonefile" :options="dropzoneOptionsFile"></drop-zone>
                            <label for="title">Book pdf</label>
                        </div>

                        <a v-if="id && book.filename" :href="`/storage/docs/${book.filename}`">Download pdf</a>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Add Book</button>
                        <hr class="my-4">

                    </form>

                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    :root {
    --input-padding-x: 1.5rem;
    --input-padding-y: .75rem;
    }

    .card-signin {
    border: 0;
    border-radius: 1rem;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .card-signin .card-title {
    margin-bottom: 2rem;
    font-weight: 300;
    font-size: 1.5rem;
    }

    .card-signin .card-body {
    padding: 2rem;
    }

    .form-signin {
    width: 100%;
    }

    .form-signin .btn {
    font-size: 80%;
    border-radius: 5rem;
    letter-spacing: .1rem;
    font-weight: bold;
    padding: 1rem;
    transition: all 0.2s;
    }

    .form-label-group {
    position: relative;
    margin-bottom: 1rem;
    }






    .btn-google {
    color: white;
    background-color: #ea4335;
    }

    .btn-facebook {
    color: white;
    background-color: #3b5998;
    }
</style>


<script>
    import { required } from "vuelidate/lib/validators";
    import vue2Dropzone from 'vue2-dropzone';
    import 'vue2-dropzone/dist/vue2Dropzone.min.css';

    export default {
        components: {
            dropZone: vue2Dropzone
        },
        props : {
            id : Number
        },
       data() {
           return {
               book : {
                   category : '',
                    title : '',
                    author : '',
                    isbn_number : '',
                    year : '',
                    price : 0,
                    publisher : '',
                    type : 0,
                    description : '',
                    image: '',
                    filename : ''
               },
                submitted : false,
                dropzoneOptions: {
                    url: '/api/add-image',
                    thumbnailWidth : 200,
                    headers: {
                        "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]').content
                    },
                    success(file, res) {
                        file.filename = res;
                    }
                },
                dropzoneOptionsFile: {
                    url: '/api/add-file',
                    thumbnailWidth : 200,
                    headers: {
                        "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]').content
                    },
                    success(file, res) {
                        file.filename = res;
                    }
                }
           };
       },
        validations: {
            book : {
                category : { required },
                title : { required },
                author : { required },
                isbn_number : { required },
                year : { required },
                price : { required },
                publisher : { required },
                type : { required },
                description : { required }
            }

        },
       methods: {
           addBook() {
               this.submitted = true;

               // stop here if form is invalid
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return;
                }


               if(this.book.category == 'Ola leaf manuscript'){
                   this.book.type = 1;
               }

               let files = this.$refs.dropzone.getAcceptedFiles();
                if(files.length > 0 && files[0].filename) {
                    this.book.image = files[0].filename;
                }

               let pdf = this.$refs.dropzonefile.getAcceptedFiles();
                if(pdf.length > 0 && pdf[0].filename) {
                    this.book.filename = pdf[0].filename;
                }

            //    let data = {
            //        category : this.category,
            //         title : this.title,
            //         author : this.author,
            //         isbn : this.isbn,
            //         year : this.year,
            //         price : this.price,
            //         publisher : this.publisher,
            //         type : this.type,
            //         description : this.description,
            //         filename : this.filename,
            //         image : this.image
            //    };

            let url = '/api/books';

            if(this.id) {
                url = '/api/books/'+this.id;
            }


            api.call('post', url, this.book)
                .then(({data}) => {


                    this.$router.push('/');
                })
                .catch(({response}) => {
                    console.log(response.data.message);
                });
           }
       },
       created() {
           if(this.id){
               api.call('get', '/api/books/'+this.id)
                .then(({data}) => {
                    this.book = data.data;
                })
                .catch(({response}) => {
                    console.log(response.data.message);
                });
           }

       }
    }
</script>
