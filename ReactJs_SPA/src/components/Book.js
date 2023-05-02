// Made by: Dwayne Gonsalves

const Book = () => {
    return (
        <div>

            <div class="heading booking-heading">
                <h1>book now</h1>
            </div>


            <section class="booking">

                <h1 class="heading-title">book your trip!</h1>

                <form action="#" method="post" class="book-form">

                    <div class="book">
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
                            <span>address :</span>
                            <input type="text" placeholder="enter your address" name="address" />
                        </div>
                        <div class="inputBox">
                            <span>where to :</span>
                            <input type="text" placeholder="place you want to visit" name="location" />
                        </div>
                        <div class="inputBox">
                            <span>how many :</span>
                            <input type="number" placeholder="number of guests" name="guests" />
                        </div>
                        <div class="inputBox">
                            <span>arrivals :</span>
                            <input type="date" name="arrivals" />
                        </div>
                        <div class="inputBox">
                            <span>leaving :</span>
                            <input type="date" name="leaving" />
                        </div>
                    </div>

                    <input type="submit" value="submit" class="btn" name="send" />

                </form>

            </section>
        </div>
    )
}
export default Book;