<template>
    <div>
        <button v-text="buttonText" type="button" class="btn btn-primary font-weight-bold" @click="FollowUser()"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],

        data: function () {
            return {
                status: this.follows,
            }
        },

        methods: {
            FollowUser() {
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        console.log(response.data.attached.length);
                        console.log(response.data.detached.length);

                        if(response.data.attached.length)
                            this.status = true;
                        else if(response.data.detached.length)
                            this.status = false;
                    })
                    .catch(error => {
                        if(error.response && error.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        },

        computed: {
            buttonText() {
                return this.status ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
