<template>
    <div class="container mx-auto px-4 h-screen bg-secondary-color">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-4/12 px-4">
                <div
                    class="relative bg-white flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg border-0"
                >
                    <div class="rounded-t mb-0 px-6 py-6">
                        <div class="text-center mb-3">
                            <!-- logo img -->
                            <img
                                class="max-h-32 h-28 mx-auto"
                                src="/images/logo.svg"
                                alt="Logo"
                            />
                        </div>
                    </div>
                    <div class="flex-auto lg:px-10 py-10 pt-0 hape:mx-3">
                        <div class="mb-3 font-bold">
                            <small class="text-secondary-color uppercase">
                                <i class="fas fa-key"></i> Login Into Your
                                Account
                            </small>
                        </div>
                        <form @submit.prevent="userLogin">
                            <div class="relative w-full mb-3">
                                <label
                                    class="block uppercase text-secondary-color text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Email
                                </label>
                                <input
                                    type="email"
                                    class="border-0 px-3 py-3 text-blue-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="Email"
                                    v-model="this.form.email"
                                />
                            </div>

                            <div class="relative w-full mb-3">
                                <label
                                    class="block uppercase text-secondary-color text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Password
                                </label>
                                <input
                                    type="password"
                                    class="border-0 px-3 py-3 text-blue-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="Password"
                                    v-model="this.form.password"
                                />
                            </div>

                            <div class="text-center mt-6">
                                <button
                                    class="bg-primary-color text-white active:bg-primary-color text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                    type="submit"
                                >
                                    Sign In
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                email: "",
                password: "",
            },
            errors: null,
        };
    },
    methods: {
        userLogin() {
            this.$store
                .dispatch("login", this.form)
                .then((response) => {
                    // console.log(response);
                    this.$router.push("/");
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },
    },
};
</script>

<style scoped></style>
