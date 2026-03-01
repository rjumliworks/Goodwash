<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 700px;" header-class="p-3 bg-light" title="Create Service" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3 p-2">
                <BCol lg="12" class="mt-2">
                    <InputLabel for="name" value="Name" :message="form.errors.name"/>
                    <TextInput id="name" v-model="form.name" type="text" class="form-control" placeholder="Please enter name" @input="handleInput('name')" :light="true"/>
                </BCol>
                <BCol lg="4" class="mt-0 mb-1" v-for="feature in form.features" :key="feature.value">
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            :id="feature.value" 
                            :value="feature.value"
                            v-model="feature.active"
                        >
                        <label class="form-check-label" :for="feature.value">
                            <span class="text-muted fs-12">{{ feature.label }}</span>
                        </label>
                    </div>
                </BCol>
                <BCol lg="6" class="mt-0">
                    <InputLabel for="region" value="Category" :message="form.errors.category_id"/>
                    <Multiselect 
                    :options="dropdowns.categories" 
                    v-model="form.category_id" 
                    @input="handleInput('category_id')"
                    :searchable="true" label="name"
                    placeholder="Select Category"/>
                </BCol>
                <BCol lg="6" class="mt-0">
                    <InputLabel for="region" value="Type" :message="form.errors.type_id"/>
                    <Multiselect 
                    :options="dropdowns.types" 
                    v-model="form.type_id"
                    @input="handleInput('type_id')"
                    :searchable="true" label="name"
                    placeholder="Select Type"/>
                </BCol>
                <BCol lg="12">
                    <hr class="text-muted mt-0 mb-0"/>
                </BCol>
            </BRow>
        </form> 
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import _ from 'lodash';
import { useForm } from '@inertiajs/vue3';
import Multiselect from "@vueform/multiselect";
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { Multiselect, InputLabel, TextInput },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                name: null,
                category_id: null,
                type_id: null
            }),
            showModal: false
        }
    },
    methods: { 
        show(){
            this.showModal = true;
        },
        submit(){
            this.form.post('/services',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('update',true);
                    this.hide();
                },
            });
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        hide(){
            this.form.clearErrors();
            this.form.reset();
            this.showModal = false;
        }
    }
}
</script>