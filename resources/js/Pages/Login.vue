<script setup>
    import { useForm } from '@inertiajs/vue3'

    const form = useForm({
        email: null,
        password: null,
        
    })
    function submit() {
        form.post('/loginPost', {
            preserveScroll: true,
            onError: () => {
                form.reset('password')
            },
        })
    }

</script>
<template>
    <v-card
    class="mx-auto my-8"
    elevation="16"
    max-width="344"
    >
        <v-card-item>
            <v-card-title>
            Login
            </v-card-title>

            <v-card-subtitle>
            Please type your correct login data.
            
            </v-card-subtitle>
        </v-card-item>

        <v-card-text>
            <div class="mb-3">
                <v-alert
                v-if="$page.props.flash.message" 
                title="Error"
                type="error"
                :text="$page.props.flash.message"
                ></v-alert>        
            </div>

            <v-sheet class="mx-auto" width="300">
                <v-form @submit.prevent="submit">
                    <v-text-field
                    v-model="form.email"
                    label="Email"
                    type="email"
                    :error-messages="form.errors.email"
                    ></v-text-field>
                    <v-text-field
                    v-model="form.password"
                    label="Password"
                    type="password"
                    :error-messages="form.errors.password"
                    ></v-text-field>
                    
                    <div
                    class="d-flex justify-space-between"
                    >
                        <v-checkbox label="Remember Me"></v-checkbox>
                    </div>
                    

                    

                    <div class="d-flex flex-column justify-center">
                        <v-btn 
                        class="my-3" 
                        type="submit" 
                        :disabled="form.processing"
                        block>
                            Submit
                        </v-btn>
                        <div class="d-flex align-center justify-space-between py-3">
                            <a  href="/register" block>Register</a>
                            <a href="#">Forgot Password</a>
                        </div>
                        
                        
                    </div>
                </v-form>
            </v-sheet>
        </v-card-text>
    </v-card>
</template>