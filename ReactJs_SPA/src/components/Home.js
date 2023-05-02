// Made by: Dhwani Dedhia

import { Link } from 'react-router-dom'

const Home = () => {
    return (
        <div>
            <section className="home">
                <div className="hero-img">
                    <div className="content">
                        <span>explore, discover, travel</span>
                        <h3>travel around India</h3>
                        <Link to="/package" className="btn">discover more</Link>
                    </div>
                </div>
            </section>

            <section className="services">

                <h1 className="heading-title"> our services </h1>

                <div className="box-container">

                    <div className="box">
                        <img src="../images/service-1.png" alt="service-1" />
                        <h3>adventure</h3>
                    </div>

                    <div className="box">
                        <img src="../images/service-2.png" alt="service-2" />
                        <h3>tour guide</h3>
                    </div>

                    <div className="box">
                        <img src="../images/service-3.png" alt="service-3" />
                        <h3>trekking</h3>
                    </div>

                    <div className="box">
                        <img src="../images/service-4.png" alt="service-4" />
                        <h3>camp fire</h3>
                    </div>

                    <div className="box">
                        <img src="../images/service-5.png" alt="service-5" />
                        <h3>off road</h3>
                    </div>

                    <div className="box">
                        <img src="../images/service-6.png" alt="service-6" />
                        <h3>camping</h3>
                    </div>

                </div>

            </section>


            <section className="home-about">

                <div className="image">
                    <img src="../images/about-image.jpg" alt="about" />
                </div>

                <div className="content">
                    <h3>about us</h3>
                    <p>Through our innovative planned event packages and other essential travel services, we have been delivering
                        outstanding experiences for a very long time. We inspire our customers to live full lives filled with
                        unforgettable travel experiences. Through our exceptionally curated occasion bundles, we need to take you on
                        an adventure where you personally enjoy the stunning magnificence of America and far-off terrains. </p>
                    <Link to="/about" className="btn">read more</Link>
                </div>

            </section>

            <section className="home-packages">

                <h1 className="heading-title"> our packages </h1>

                <div className="box-container">

                    <div className="box">
                        <div className="image">
                            <img src="../images/package-1.jpg" alt="package-1" />
                        </div>
                        <div className="content">
                            <h3>Taj Mahal</h3>
                            <p>While taking a Taj Mahal tour, you may hear people refer to it as a monument made of white marble or
                                as the picture of pure love. But what is seen on the Yamuna River's south bank is a combination of all
                                these little details. The mausoleum was sculpted in 1632 by the renowned Mughal emperor Shah Jahan to
                                hold the burial of Mumtaz Mahal. Simple display of the emperor's affection for his preferred wife.</p>
                            <Link to="/book" className="btn">book now</Link>
                        </div>
                    </div>

                    <div className="box">
                        <div className="image">
                            <img src="../images/package-2.jpg" alt="package-2" />
                        </div>
                        <div className="content">
                            <h3>The Golden Temple</h3>
                            <p>The Golden Temple, sometimes referred to as Harmandir Sahib, is one of the most revered Sikh
                                gurdwaras. A huge structure that includes a marble pathway and a pool with holy water, known as the
                                amrit sarovar, surrounds it. Everyone is welcome here, as they are in all Sikh temples, regardless of
                                their background or faith. No matter where they come from or what religion they practise, everyone is
                                welcome here.</p>
                            <Link to="/book" className="btn">book now</Link>
                        </div>
                    </div>

                    <div className="box">
                        <div className="image">
                            <img src="../images/package-3.jpg" alt="package-3" />
                        </div>
                        <div className="content">
                            <h3>Leh Ladakh</h3>
                            <p>Leh Ladakh Tour Packages: Discover Thrillophilia's top deals on Ladakh trips. Order unique Ladakh
                                vacation packages with top-notch discounts. You may select from a variety of alternatives if you're
                                searching for a low-cost Ladakh trip package or an exciting Leh Ladakh tour. All significant locations
                                will be covered by our most popular Leh Ladakh trip packages, and you'll have enough of free time to
                                partake in authentic local experiences.</p>
                            <Link to="/book" className="btn">book now</Link>
                        </div>
                    </div>

                </div>

                <div className="load-more"> <Link to="/package" className="btn">load more</Link></div>

            </section>

            <section className="home-offer">
                <div className="content">
                    <h3>upto 40% off</h3>
                    <p>Get discounts of up to 40% on travel around India. Save up to Rs.20,000 on over 1149 India excursions by
                        finding deals.</p>
                    <div className="load-more"> <Link to="/book" className="btn">book now</Link></div>
                </div>
            </section>
        </div>
    )
}

export default Home;