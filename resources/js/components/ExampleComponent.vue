<template>
  <div>
    <h2></h2>
    <form @submit.prevent="addArticle" class="mb-3">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Title" v-model="article.title" required>
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="" v-model="article.body" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Save</button>
    </form>
    <button @click="clearForm()" class="btn btn-dark btn-block">Cancel</button>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchArticles(pagination.prev_page_url)">Previous</a></li>

        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
    
        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchArticles(pagination.next_page_url)">Next</a></li>
      </ul>
    </nav>
    <div class="card card-body mb-2" v-for="article in articles" v-bind:key="article.id">
      <h3>{{ article.post_title }}</h3>
      <p>{{ article.post_content }}</p>
      <hr>
      <button @click="editArticle(article)" class="btn btn-warning mb-2">Edit</button>
      <button @click="deleteArticle(article.id)" class="btn btn-danger">Delete</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      articles: [],
      article: {
        id: '',
        title: '',
        body: ''
      },
      pagination: {},
      edit: false
    };
  },
  created() {
    this.fetchArticles();
  },
  methods: {
    fetchArticles(page_url) {
      let vm = this;
      page_url = page_url || '/api/post';
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.articles = res.data;
          vm.makePagination(res.meta, res.links);
        })
        .catch(err => console.log(err));
    },
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };
      this.pagination = pagination;
    },
    deleteArticle(id) {
      if (confirm('Are You Sure?')) {
        fetch(`api/post/${id}`, {
          method: 'delete'
        })
          .then(data => {
            this.fetchArticles();
          })
          .catch(err => console.log(err));
      }
    },
    addArticle() {
      if (this.edit === false) {
        // Add
        fetch('api/post', {
          method: 'post',
          body: JSON.stringify(this.article),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(data => {
            this.clearForm();
            this.fetchArticles();
          })
          .catch(err => console.log(err));
      } else {
        // Update
        fetch('api/post', {
          method: 'put',
          body: JSON.stringify(this.article),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(data => {
            this.clearForm();
            this.fetchArticles();
          })
          .catch(err => console.log(err));
      }
    },
    editArticle(article) {
      this.edit = true;
      this.article.id = article.id;
      this.article.title = article.post_title;
      this.article.body = article.post_content;
    },
    clearForm() {
      this.edit = false;
      this.article.id = null;
      this.article.title = '';
      this.article.body = '';
    }
  }
};
</script>