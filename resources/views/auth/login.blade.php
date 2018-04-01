@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form ref="formData" :model="formData">

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input v-model="formData.mail" type="email" class="form-control" :class="{'is-invalid': validata.mail.status}" autofocus>

                                <span class="invalid-feedback" v-if="validata.mail.status">
                                    <strong><span v-text="validata.mail.msg"></span></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input v-model="formData.password" type="password" class="form-control" :class="{'is-invalid': validata.password.status}">

                                <span class="invalid-feedback" v-if="validata.password.status">
                                    <strong><span v-text="validata.password.msg"></span></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="captcha" class="col-md-4 col-form-label text-md-right">验证码</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input v-model="formData.captcha" type="text" class="form-control" :class="{'is-invalid': validata.captcha.status}" placeholder="请输入验证码" aria-label="验证码">
                                    <div class="input-group-append">
                                        <span class="input-group-text" style="padding: 0 !important;">
                                            <img ref="captcha" src="{{ asset('everans/images/everan.gif') }}" title="刷新验证码" alt="验证码"
                                                 @click="codeInit" class="img-code">
                                        </span>
                                    </div>

                                    <span class="invalid-feedback" v-if="validata.captcha.status">
                                        <strong><span v-text="validata.captcha.msg"></span></strong>
                                    </span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <i-button type="primary" @click="login">
                                    <Icon type="paper-airplane"></Icon>
                                    {{ __('Login') }}
                                </i-button>
                                <i-button type="default" @click="formReset('formData')">
                                    <Icon type="refresh"></Icon>
                                    重置
                                </i-button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    new Vue({
        el: '#app',
        data() {
            return {
                formData: {
                    mail: '',
                    password: '',
                    captcha: ''
                },
                validata: {
                    mail: {
                        status: false,
                        msg: ''
                    },
                    password: {
                        status: false,
                        msg: ''
                    },
                    captcha: {
                        status: false,
                        msg: ''
                    }
                },
                captcha_key: 'captcha-no',
                default_src: "{{ asset('everans/images/everan.gif') }}",
                loading: false
            }
        },
        mounted() {
            this.codeInit();
        },
        methods: {
            login() {
                NProgress.start();
                let _this = this;
                _this.loading = true;
                let formData = {
                    'email': _this.formData.mail,
                    'password': _this.formData.password,
                    'captcha': _this.formData.captcha,
                    'captcha_key': _this.captcha_key
                };
                axios.post('/api/authorizations', formData).then(response => {
                    _this.$Message.success({
                        content: '登陆成功',
//                                onClose: () => {
//                                    _this.$router.push({name: 'profile'})
//                                }
                    });
                }).catch(error => {
                    _this.loading = false;
                    _this.$Message.error(error.response.data.message || '服务器异常');
                    for (index in error.response.data.errors) {
                        if (index == 'email') {
                            _this.validata.mail.status = true;
                            _this.validata.mail.msg = error.response.data.errors[index][0];
                        }
                        if (index == 'password') {
                            _this.validata.password.status = true;
                            _this.validata.password.msg = error.response.data.errors[index][0];
                        }
                        if (index == 'captcha') {
                            _this.validata.captcha.status = true;
                            _this.validata.captcha.msg = error.response.data.errors[index][0];
                        }
                    }
                    NProgress.done();
                });
            },
            formReset(name) {
                this.$refs[name].reset();
            },
            codeInit() {
                let _this = this;
                _this.$refs.captcha.src = _this.default_src;
                axios.get('/api/captchas/' + _this.captcha_key).then(response => {
                    _this.captcha_key = response.data.captcha_key;
                    setTimeout(() => {
                        _this.$refs.captcha.src = response.data.captcha_image_content;
                    }, 1000)
                });
            }
        }
    })
</script>
@endsection