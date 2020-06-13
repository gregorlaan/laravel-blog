<template>
    <div>
        <button v-text="buttonText" type="button" v-bind:class="buttonClass" class="btn font-weight-bold" @click="FollowUser()"></button>
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
            },
            buttonClass() {
                return this.status ? 'btn-outline-primary' : 'btn-primary';
            }
        }
    }
</script>
