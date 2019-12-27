<template>
<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-6">
            <div class="card">
                <div class="card-header txt-theme">Create Character</div>
                <div class="card-body">
                <form id="create_character">
                        <div class="form-group row txt-theme">
                            <div class="col-12">
                                <div class="row">
                                        <label for="name" class="col-2 col-form-label text-md-right"><i class="fa fa-book fa-2x"></i></label>
                                        <div class="col-6 offset-2">
                                            <input id="name" placeholder="Name" class="form-control{{ errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                        </div>
                                </div>
                                <div class="row">
                                    <label for="level" class="col-2 col-form-label text-md-right"><i class="fa fa-level-up-alt fa-2x"></i></label>
                                    <div class="col-6 offset-2">
                                        <input id="level" type="number" placeholder="Level" class="form-control{{ errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ old('level') }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="race" class="col-2 col-form-label text-md-right"><i class="fa fa-atlas fa-2x txt-theme"></i></label>
                                    <div class="col-6 offset-2">
                                        <input id="race" placeholder="Race" class="form-control{{ errors->has('race') ? ' is-invalid' : '' }}" name="race" value="{{ old('race') }}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="classes" class="col-2 col-form-label text-md-right"><img class="bg-theme icon-img" src="/icons/organigram.svg"></label>
                                    <div class="col-6 offset-2">
                                        <input id="classes" placeholder="Class(es)" class="form-control{{ errors->has('classes') ? ' is-invalid' : '' }}" name="classes" value="{{ old('classes') }}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="maximum_hp" class="col-2 col-form-label text-md-right"><img class="bg-theme icon-img" src="/icons/medical-pack.svg"></label>
                                    <div class="col-6 offset-2">
                                        <input id="maximum_hp" type="number" placeholder="Maximum HP" class="form-control{{ errors->has('maximum_hp') ? ' is-invalid' : '' }}" name="maximum_hp" value="{{ old('maximum_hp') }}" required>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="ac" class="col-2 col-form-label text-md-right"><img class="bg-theme icon-img" src="/icons/shield-bounces.svg"></label>
                                    <div class="col-6 offset-2">
                                        <input id="ac" type="number" placeholder="Armour Class" class="form-control{{ errors->has('ac') ? ' is-invalid' : '' }}" name="ac" value="{{ old('ac') }}">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6 offset-4 text-right">
                                            <button type="submit" id="load_submit" class="btn bg-theme"><span style="visibility:hidden;" class="spinner-border spinner-border-sm"></span><span class="pl-2 pr-3">Create Character<img src="/icons/person.svg" alt="" style="width:25px;" class="bg-dark bg-theme ml-2 pb-1"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import axios from "axios";
    export default {
        props: ["user_id", "csrf"]
        mounted() {
            
        },
        data()
        {
            return {
                columns: [
                    {
                        prop: "ac",
                        type: "number",
                        placeholder: "Armour Class"
                    }
                ]
            }
        },
        components: {
           
        },
        methods: {
        }
    }
</script>