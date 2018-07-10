new Vue({
    el: "#timeline",
    data:{
        post:'',
        posts:[],
        limit:20,
        total:0
    },
    methods:{
       postStatus: function(e){
           e.preventDefault();
           $.ajax({
               url:'/posts',
               type:'post',
               dataType:'json',
               data:{
                   'body' : this.post
               }
           }).success(function (data) {
               this.post='';
               this.posts.unshift(data);
           }.bind(this));
       },
        getPosts: function () {
            $.ajax({
                url: '/posts',
                dataType: 'json',
                Type: 'get',
                data: {
                    limit : this.limit
                }
            }).success(function (data) {
                this.posts = data.posts;
                this.total = data.total;
            }.bind(this));
        },
        getMorePosts: function (e) {
            e.preventDefault();
            this.limit += 10;
            this.getPosts();
        }
    },
    mounted: function () {
        this.$nextTick(function () {
            this.getPosts();
                setInterval(function () {
                    this.getPosts();
                }.bind(this), 10000);
        });
    }
});