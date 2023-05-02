//Made by: Karankumar Brahmabhatt

const Service = () => {
    return (
        <div>
            <div class="heading services-heading">
                <h1>services</h1>
            </div>
            <section className="services">

                <h1 className="heading-title"> our services </h1>

                <div className="box-container">

                    <div className="box">
                        <img src="images/service-1.png" alt="service-1" />
                        <h3>adventure</h3>
                    </div>

                    <div className="box">
                        <img src="images/service-2.png" alt="service-2" />
                        <h3>tour guide</h3>
                    </div>

                    <div className="box">
                        <img src="images/service-3.png" alt="service-3" />
                        <h3>trekking</h3>
                    </div>

                    <div className="box">
                        <img src="images/service-4.png" alt="service-4" />
                        <h3>camp fire</h3>
                    </div>

                    <div className="box">
                        <img src="images/service-5.png" alt="service-5" />
                        <h3>off road</h3>
                    </div>

                    <div className="box">
                        <img src="images/service-6.png" alt="service-6" />
                        <h3>camping</h3>
                    </div>

                </div>

                <div className="testimonials">
                    <h1>What Our Customer say?</h1>
                    <div className="testimonial">
                        <img src="images/customer-1.jpg" alt="Jane's Avatar" className="avatar" />
                        <p>"I had an amazing time on the adventure tour. Our guide was knowledgeable and friendly, and the scenery was breathtaking. Highly recommend!"</p>
                        <span className="reviewer">- John</span>
                    </div>
                    <div className="testimonial">
                        <img src="images/customer-2.jpg" alt="John's Avatar" className="avatar" />
                        <p>"The off-road tour was a blast! The equipment was top-notch and our guide made sure we were safe and having fun. Will definitely be back!"</p>
                        <span className="reviewer">- Jane</span>
                    </div>
                </div>

            </section>
        </div>
    )
}

export default Service;