
import { Link } from 'react-router-dom'


const Footer = () => {
    return (
        <div>
            <section class="footer">

                <div class="box-container">

                    <div class="box">
                        <h3>quick links</h3>
                        <Link to="/"><i class="fas fa-angle-right"></i> home</Link>
                        <Link to="/about"><i class="fas fa-angle-right"></i> about</Link>
                        <Link to="/package"><i class="fas fa-angle-right"></i> package</Link>
                        <Link to="/book"><i class="fas fa-angle-right"></i> book</Link>
                    </div>

                    <div class="box">
                        <h3>extra links</h3>
                        <Link to="/"> <i class="fas fa-angle-right"></i> ask questions</Link>
                        <Link to="/"> <i class="fas fa-angle-right"></i> about us</Link>
                        <Link to="/"> <i class="fas fa-angle-right"></i> privacy policy</Link>
                        <Link to="/"> <i class="fas fa-angle-right"></i> terms of use</Link>
                    </div>

                    <div class="box">
                        <h3>contact info</h3>
                        <Link to="/"> <i class="fas fa-phone"></i> +123-456-7890 </Link>
                        <Link to="/"> <i class="fas fa-phone"></i> +111-222-3333 </Link>
                        <Link to="/"> <i class="fas fa-envelope"></i> group2@gmail.com </Link>
                        <Link to="/"> <i class="fas fa-map"></i> Mumbai, India - 400080 </Link>
                    </div>

                    <div class="box">
                        <h3>follow us</h3>
                        <Link to="/"><i class="fab fa-facebook-f"></i> facebook </Link>
                        <Link to="/"><i class="fab fa-twitter"></i> twitter </Link>
                        <Link to="/"><i class="fab fa-instagram"></i> instagram </Link>
                        <Link to="/"><i class="fab fa-linkedin"></i> linkedin </Link>
                    </div>

                </div>

                <div class="credit"> created by <span>Group 2</span> | all rights reserved! </div>

            </section>
        </div>
    )
}

export default Footer;