<template>
    <div class="content">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-body ">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <form action="#" method="POST" id="admin_login" class="form-validate">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                            <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
                            <p class="text text-danger" id="e-msg"></p>
                            <p class="text text-success" id="s-msg"></p>
                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" placeholder="Username" name="identity" required="required">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" placeholder="Password" name="password" minlength="6" required="required">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AdminLogin"
    }
</script>

<style scoped>

</style>
