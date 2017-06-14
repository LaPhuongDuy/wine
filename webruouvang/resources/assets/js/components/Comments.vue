<template>
<div class="comments">
<div class="box visible">
    <ul>
        <li v-for="comment in comments" class="comment">
            <table class="ratings-table">
                <colgroup>
                <col width="1">
                <col>
                </colgroup>
                <tbody>
                    <tr>
                        <td>
                            <div class="profile_pic">
                                <img v-if="!comment.avatar.length" :src="comment.avatar"  alt="..." class="img-circle" style="width: 40%; margin-left: 30%">
                                <img v-else src="/../images/user/user.png"  alt="..." class="img-circle" style="width: 40%; margin-left: 30%">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="review">
                <h6><a href="#/catalog/product/view/id/61/">{{ comment.username }}</a></h6>
                <small>Review by <span>{{ comment.username }}</span>on {{ comment.created_at }} </small>
                <div class="review-txt">{{ comment.content }}</div>
            </div>
        </li>
    </ul>
</div>
<form method="POST" v-on:submit.prevent="submit" :action="product_url">
<ul>
    <li>
        <label class="required label-wide" for="review_field">Review<em>*</em></label>
        <div class="input-box">
            <textarea v-model="new_comment" name="comment" rows="3" cols="5" id="review_field" placeholder="New Comment..." ></textarea>
            
        </div>
    </li>
</ul>
<div class="buttons-set">
    <button class="button submit" title="Submit Review" type="submit"><span>Submit comment</span></button>
</div>
</form>
</div>
</template>
<script>
export default {
    props: ['product_url', 'comments_url', 'product_id'],
    methods: {
        submit: function() {
            var self = this;
            axios.post(this.product_url, {
                'content': this.new_comment,
                'product_id': self.product_id
            }).then((response) => {
                console.log(response.data);
                self.new_comment = '';
                self.comments.push(response.data);
            })
        }
    },
    data() {
        return {
            comments: [],
            new_comment: ''
        }
    },
    mounted() {
        var self = this;
        axios.get(this.comments_url).then((response) => {
            console.log(response.data);
            _.forEach(response.data, function(item) {
                self.comments.push(item);
            })
        })
        Echo.private('comments.' + self.product_id)
            .listen('CommentPusherEvent', (e) => {
                self.comments.push(e.comment);
            });
    }
}
</script>