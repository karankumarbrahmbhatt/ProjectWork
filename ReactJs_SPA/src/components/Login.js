// Made by: Dhwani Dedhia

const Login = () => {
    return (
        <div>

            <div className="heading login-register-heading">
                <h1>Login / Register</h1>
            </div>

            <section className="login-register">

                <h1 className="heading-title">LOGIN / REGISTER</h1>

                <div className="box-container">

                    <div className="box">

                        <form action="#" method="post" class="login-register-form">

                            <div class="login">
                                <div class="inputBox">
                                    <span>Email :</span>
                                    <input type="email" placeholder="enter your email" name="email" />
                                </div>
                                <div class="inputBox">
                                    <span>Password :</span>
                                    <input type="password" placeholder="enter your password" name="password" />
                                </div>

                            </div>

                            <input type="submit" value="Login" class="btn" name="login" />

                        </form>

                    </div>
                    <div className="box">
                        <form action="#" method="post" class="login-register-form">

                            <div class="login">
                                <div class="inputBox">
                                    <span>name :</span>
                                    <input type="text" placeholder="enter your name" name="name" />
                                </div>
                                <div class="inputBox">
                                    <span>email :</span>
                                    <input type="email" placeholder="enter your email" name="email" />
                                </div>
                                <div class="inputBox">
                                    <span>password :</span>
                                    <input type="password" placeholder="enter your password" name="password" />
                                </div>
                                <div class="inputBox">
                                    <span>confirm password :</span>
                                    <input type="password" placeholder="enter confirm password" name="confirm_password" />
                                </div>
                            </div>

                            <input type="submit" value="register" class="btn" name="register" />
                        </form>
                    </div>
                </div>
            </section>
        </div>
    )
}
export default Login;