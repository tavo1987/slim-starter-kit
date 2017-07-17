<template>
    <div class="form">
        <form action="store" method="POST" id="lead" @submit.prevent="submit" ref="form">
            <label>
                Name
                <input v-validate="'required'" type="text" name="name">
                <span class="form-error" v-show="errors.has('name')">{{ errors.first('name') }}</span>
            </label>

            <label>
                Email
                <input v-validate="'required|email'" type="email" name="email">

                <span v-show="errors.has('email')" class="form-error">{{ errors.first('email') }}</span>
            </label>

           <button class="button" type="submit">Enviar</button>
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            submit() {
                this.$validator.validateAll().then(result => {
                    if (result) {
                        this.$refs.form.submit();
                    }
                });
            }
        }
    }
</script>
