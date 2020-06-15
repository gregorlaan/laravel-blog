<template>
    <div class="form-group mx-n3">
        <label :for="name" class="col-form-label">{{ label }}</label>

        <vue-editor v-model="content" />

        <textarea v-html="content" readonly hidden :id="id" :name="name" class="form-control"></textarea>
    </div>
</template>

<script>
import { VueEditor } from "vue2-editor";

export default {
    props: ['id', 'name', 'label', 'content'],

    data(){
        return{
            content: '',
        }
    },
}
</script>