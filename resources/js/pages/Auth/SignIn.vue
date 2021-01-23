<template>
    <div class="hold-transition login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-warning">
                <div class="card-header text-center">
                    <a href="" class="h1"><b>TGP</b>Dashboard</a>
                </div>
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <div class="input-group mb-3">
                        <input
                            name="username"
                            id="username"
                            v-model="form.username"
                            type="text"
                            class="form-control"
                            placeholder="Email"
                        />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input
                            name="password"
                            id="password"
                            v-model="form.password"
                            type="password"
                            class="form-control"
                            placeholder="Password"
                        />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button
                                type="submit"
                                class="btn btn-warning btn-block"
                                @click="login(form)"
                            >
                                Sign In
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isSuccess: "",
            form: {
                username: "",
                password: ""
            }
        };
    },
    methods: {
        login() {

            if (this.form.username == 'tgpadmin' && this.form.password == 'admin') {
            
                window.location.href = "/booking";
                toast.fire({
                    icon: "success",
                    title: "Login Success"
                });

            } else {
                toast.fire({
                    icon: "error",
                    title: "Login Gagal, Cek Username & Password"
                });
            }
        }
    }
};
</script>
