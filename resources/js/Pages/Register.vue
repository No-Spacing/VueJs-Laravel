<script setup>
    import { useForm } from '@inertiajs/vue3'
    const form = useForm({
        name: null,
        email: null,
        password: null,
    })
    function submit() {
        form.post('/registerPost', {
            preserveScroll: true,
            onSuccess: () => {
                form.reset()
                alert('Successfully Registered')
            },
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
            Register
            </v-card-title>

            <v-card-subtitle>
            Please type your correct data.
            </v-card-subtitle>
        </v-card-item>

        <v-card-text>
            <v-sheet class="mx-auto" width="300">
                <v-form @submit.prevent="submit()">
                    <v-text-field
                    v-model="form.name"
                    label="Name"
                    type="text"
                    :error-messages="form.errors.name"
                    ></v-text-field>

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

                    <div class="d-flex flex-column justify-center">
                        <v-btn 
                        class="my-3" 
                        type="submit" 
                        :disabled="form.processing"
                        block>
                            Submit
                        </v-btn>

                        <div class="text-center">
                            <span> or </span>
                        </div>

                        <v-btn 
                        class="my-3" 
                        href="/login" 
                        block>
                            Login
                        </v-btn>
                    </div>
                </v-form>
            </v-sheet>
        </v-card-text>
    </v-card>
</template>