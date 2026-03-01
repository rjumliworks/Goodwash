<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 900px;" header-class="p-3 bg-light" title="Create Branch" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow>
                <BCol lg="7">
                    <BRow class="g-3 p-2">
                        <BCol lg="12" class="mt-2">
                            <InputLabel for="name" value="Name" :message="form.errors.name"/>
                            <TextInput id="name" v-model="form.name" type="text" class="form-control" placeholder="Please enter name" @input="handleInput('name')" :light="true"/>
                        </BCol>
                        <BCol lg="12">
                            <hr class="text-muted mt-0 mb-1"/>
                        </BCol>
                        <BCol lg="6" class="mt-1">
                            <InputLabel value="Region" :message="form.errors.region_code"/>
                            <Multiselect :options="dropdowns.regions" v-model="form.region_code" label="name" :searchable="true" placeholder="Select Region" />
                        </BCol>
                        <BCol lg="6" class="mt-1">
                            <InputLabel value="Province" :message="form.errors.province_code"/>
                            <Multiselect :options="provinces" v-model="form.province_code" label="name" :searchable="true" placeholder="Select Province" />
                        </BCol>
                        <BCol lg="6" class="mt-1">
                            <InputLabel value="Municipality" :message="form.errors.municipality_code"/>
                            <Multiselect :options="municipalities" v-model="form.municipality_code" label="name" :searchable="true" placeholder="Select Municipality" />
                        </BCol>
                        <BCol lg="6" class="mt-1">
                            <InputLabel value="Barangay" :message="form.errors.barangay_code"/>
                            <Multiselect :options="barangays" v-model="form.barangay_code" label="name" :searchable="true" placeholder="Select Barangay" />
                        </BCol>
                        <BCol lg="12" class="mt-1">
                            <InputLabel value="Street, Landmark, Block, Lot, Unit (Optional)"/>
                            <TextInput v-model="form.address" type="text" class="form-control" placeholder="Please enter st.,road" @input="handleInput('address')" :light="true" />
                        </BCol>
                    </BRow>
                </BCol>
                <BCol lg="5">
                    <BRow>
                        <BCol lg="12">
                            <div class="mt-2">
                                <Map @set="handleCoordinates" ref="map" class="leaflet-map" style="height: 270px;"/>
                            </div>
                        </BCol>
                    </BRow>
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
import Map from './Map.vue';
import { useForm } from '@inertiajs/vue3';
import Multiselect from "@vueform/multiselect";
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { Multiselect, InputLabel, TextInput, Map },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                name: null,
                address: null,
                region_code: null,
                province_code: null,
                municipality_code: null,
                barangay_code: null,
                latitude: null,
                longitude: null,
            }),
            coordinates: {},
            provinces: [],
            municipalities: [],
            barangays: [],
            showModal: false
        }
    },
    watch: {
        "form.region_code"(newVal){
            if(!newVal){
                this.form.province_code = null;
                this.form.municipality_code = null;
                this.form.barangay_code = null;
            }
            this.fetchProvince(newVal);
        },
        "form.province_code"(newVal){
            if(!newVal){
                this.form.municipality_code = null;
                this.form.barangay_code = null;
            }
            this.fetchMunicipality(newVal);
        },
        "form.municipality_code"(newVal){
            if(!newVal){
                this.form.barangay_code = null;
            }
            this.fetchBarangay(newVal);
        }
    },
    methods: { 
        show(){
            this.$refs.map.view();
            this.showModal = true;
        },
        submit(){
            this.form.post('/branches',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('update',true);
                    this.hide();
                },
            });
        },
        fetchProvince(code){
            axios.get('/search',{
                params: {
                    option: 'provinces',
                    code: code
                }
            })
            .then(response => {
                this.provinces = response.data;
            })
            .catch(err => console.log(err));
        },
        fetchMunicipality(code){
            axios.get('/search',{
                params: {
                    option: 'municipalities',
                    code: code
                }
            })
            .then(response => {
                this.municipalities = response.data;
            })
            .catch(err => console.log(err));
        },
        fetchBarangay(code){
            axios.get('/search',{
                params: {
                    option: 'barangays',
                    code: code
                }
            })
            .then(response => {
                this.barangays = response.data;
            })
            .catch(err => console.log(err));
        },
        handleCoordinates(coords) {
            this.coordinates = coords;
            this.form.longitude = this.coordinates.lng;
            this.form.latitude = this.coordinates.lat;
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