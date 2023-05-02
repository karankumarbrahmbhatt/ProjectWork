//Made by: Karankumar Brahmabhatt

import { Link } from 'react-router-dom'

const Package = () => {
    return (
        <div>
            <section class="packages">

                <h1 class="heading-title">top destinations</h1>

                <div class="box-container">

                    <div class="box">
                        <div class="image">
                            <img src="images/package-1.jpg" alt="package-1" />
                        </div>
                        <div class="content">
                            <h3>Taj Mahal</h3>
                            <p>While taking a Taj Mahal tour, you may hear people refer to it as a monument made of white marble or
                                as the picture of pure love. But what is seen on the Yamuna River's south bank is a combination of all
                                these little details. The mausoleum was sculpted in 1632 by the renowned Mughal emperor Shah Jahan to
                                hold the burial of Mumtaz Mahal. Simple display of the emperor's affection for his preferred wife.</p>
                            <Link to="/book" class="btn">book now</Link>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/package-2.jpg" alt="package-2" />
                        </div>
                        <div class="content">
                            <h3>The Golden Temple</h3>
                            <p>The Golden Temple, sometimes referred to as Harmandir Sahib, is one of the most revered Sikh
                                gurdwaras. A huge structure that includes a marble pathway and a pool with holy water, known as the
                                amrit sarovar, surrounds it. Everyone is welcome here, as they are in all Sikh temples, regardless of
                                their background or faith. No matter where they come from or what religion they practise, everyone is
                                welcome here.</p>
                            <Link to="/book" class="btn">book now</Link>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/package-3.jpg" alt="package-3" />
                        </div>
                        <div class="content">
                            <h3>Leh Ladakh</h3>
                            <p>Leh Ladakh Tour Packages: Discover Thrillophilia's top deals on Ladakh trips. Order unique Ladakh
                                vacation packages with top-notch discounts. You may select from a variety of alternatives if you're
                                searching for a low-cost Ladakh trip package or an exciting Leh Ladakh tour. All significant locations
                                will be covered by our most popular Leh Ladakh trip packages, and you'll have enough of free time to
                                partake in authentic local experiences.</p>
                            <Link to="/book" class="btn">book now</Link>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/package-4.jpg" alt="package-4" />
                        </div>
                        <div class="content">
                            <h3>Ooty</h3>
                            <p>Ooty is a scenic hill town in southern India. It is surrounded by the Nilgiri Hills and is popularly
                                known as the Queen of Hills. But when is the best time to visit Ooty?

                                Climate (if any) is the only serious deterrent which might spoil your travel plans to Ooty. But
                                regarding climate too, Ooty has something different to offer all throughout the year. The summer is
                                perhaps the best time to visit the place, if you are planning to visit all the tourist spots,
                                including some adventurous treks and hand gliding.</p>
                            <Link to="/book" class="btn">book now</Link>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/package-5.jpg" alt="package-5" />
                        </div>
                        <div class="content">
                            <h3>Hampi</h3>
                            <p>Hampi is one of finest historical sites of ancient age in the world. It was the initial capital city
                                of famous historical Vijayanagara Empire located on the bank of Tungabhadra River about 11 km away
                                from Hospet City. Hampi is a small location covered an area of 25 sq. km. and it is totally bounded by
                                mountains (Anjaneya, Malyavanta and Matanga Hills) by the three sites and rest one site is bordered by
                                Tungabhadra River. Hampi is worth exploring the ancient ruins.</p>
                            <Link to="/book" class="btn">book now</Link>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/package-6.jpg" alt="package-6" />
                        </div>
                        <div class="content">
                            <h3>Goa</h3>
                            <p>Goa is one of the most favorite destination among Indian tourists due to its pristine beaches. Dotted
                                with hundreds of impressive beaches in Goa, the incredible coastline of more than 100 km offers
                                beautiful views and serenity where tourists enjoy and relax in the Sun. Every beach has its specialty,
                                beauty, and serenity where tourists enjoy their best.

                                Famous beaches in Goa: Baga, Candolim, Calangute, Morjim, Arambol, Anjuna, etc. visit Goa now and see
                                the beaches.

                            </p>
                            <Link to="/book" class="btn">book now</Link>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/package-7.jpg" alt="package-7" />
                        </div>
                        <div class="content">
                            <h3>Jammu & Kashmir</h3>
                            <p>Known as ‘Paradise on Earth’, Jammu and Kashmir is one of India's most favoured tourist destinations.
                                The state is popular for its picturesque beauty, the pashmina shawls and the many blue lakes that dot the Himalayan terrain here.
                                The state is a religious amalgamation with natives practicing Islam, Buddhism, and Hinduism. There's naturally a lot of cultural diversity to be explored here.
                                And don't forget the mouth-watering Kashmiri cuisine 'Wazwan'. For those of you planning to visit the Valley, here's a detailed travel guide of Jammu Kashmir to fill you up on all the details you need to know for your tourism here.
                            </p>
                            <Link to="/book" class="btn">book now</Link>
                        </div>
                    </div>

                    <div class="box">
                        <div class="image">
                            <img src="images/package-8.jpg" alt="package-8" />
                        </div>
                        <div class="content">
                            <h3>Kerala</h3>
                            <p>India’s millennia-old natural medicine, Ayurveda, is the guiding force in southern state Kerala’s famed health resorts.
                                To rejuvenate in luxurious surrounds, try 50-acre oasis Kairali Ayurvedic Health Resort’s authentic ayurvedic healing with aromatherapy, massage, essential oils and yoga.

                                Named as one of the ten paradises of the world by National Geographic Traveler, Kerala is famous especially for its ecotourism initiatives and beautiful backwaters.
                                Its unique culture and traditions, coupled with its varied demography, have made Kerala one of the most popular tourist destinations in the world.

                            </p>
                            <Link to="/book" class="btn">book now</Link>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    )
}

export default Package;