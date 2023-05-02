// Made by: Dwayne Gonsalves

const Contact = () => {
    return (
        <div>

            <div class="heading contact-heading">
                <h1>Contact us</h1>
            </div>


            <section class="contactus">

                <h1 class="heading-title">Write us your query</h1>

                <form action="#" method="post" class="contact-form">

                    <div class="contact">
                        <div class="inputBox">
                            <span>name :</span>
                            <input type="text" placeholder="enter your name" name="name" />
                        </div>
                        <div class="inputBox">
                            <span>email :</span>
                            <input type="email" placeholder="enter your email" name="email" />
                        </div>
                        <div class="inputBox">
                            <span>phone :</span>
                            <input type="number" placeholder="enter your number" name="phone" />
                        </div>
                        <div class="inputBox">
                            <span>subject :</span>
                            <input type="text" placeholder="enter your subject" name="subject" />
                        </div>
                        <div class="inputBox">
                            <span>message :</span>
                            <textarea type="text" placeholder="enter your message" name="message"></textarea>
                        </div>
                    </div>

                    <input type="submit" value="submit" class="btn" name="send" />

                </form>

            </section>
        </div>
    )
}
export default Contact;