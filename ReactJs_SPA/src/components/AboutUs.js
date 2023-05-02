//Made by: Shrey Naik

const AboutUs = () => {
    return (
        <div>
            <div className="heading about-heading" >
                <h1>about us</h1>
            </div>
            <section className="about">

                <div className="image">
                    <img src="../images/about-image.jpg" alt="about" />
                </div>

                <div className="content">
                    <h3>why choose us?</h3>
                    <p>Through Our Innovative Planned Event Packages And Other Essential Travel Services, We Have Been Delivering
                        Outstanding Experiences For A Very Long Time. We Inspire Our Customers To Live Full Lives Filled With
                        Unforgettable Travel Experiences. Through Our Exceptionally Curated Occasion Bundles, We Need To Take You On
                        An Adventure Where You Personally Enjoy The Stunning Magnificence Of India And Far-Off Terrains.</p>
                    <div className="icons-container">
                        <div className="icons">
                            <i className="fas fa-map"></i>
                            <span>top destinations</span>
                        </div>
                        <div className="icons">
                            <i className="fas fa-hand-holding-usd"></i>
                            <span>affordable price</span>
                        </div>
                        <div className="icons">
                            <i className="fas fa-headset"></i>
                            <span>24/7 guide service</span>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    )
}
export default AboutUs;