import { Link,useLocation } from 'react-router-dom'

const Header = () => {
    const location = useLocation();

    return (
        <section class="header">

            <div class="logo"><Link to="/">Travel India</Link></div>

            <nav class="navbar">
                <Link to="/" className={location.pathname === '/' ? 'active' : ''}>home</Link>
                <Link to="/about" className={location.pathname === '/about' ? 'active' : ''}>About</Link>
                <Link to="/book" className={location.pathname === '/book' ? 'active' : ''}>Book</Link>
                <Link to="/package" className={location.pathname === '/package' ? 'active' : ''}>Package</Link>
                <Link to="/service" className={location.pathname === '/service' ? 'active' : ''}>Service</Link>
                <Link to="/review" className={location.pathname === '/review' ? 'active' : ''}>Review</Link>
                <Link to="/contact" className={location.pathname === '/contact' ? 'active' : ''}>Contact</Link>
                <Link to="/login" className={location.pathname === '/login' ? 'active' : ''}>Login</Link>
            </nav>

            <div class="mobnav">
                <nav class="menu">
                    <input type="checkbox" id="menuToggle" />
                    <label for="menuToggle" class="menu-icon"><i class="fa fa-bars"></i></label>
                    <ul>
                        <li><Link to="/">Home</Link></li>
                        <li><Link to="/about" >About</Link></li>
                        <li><Link to="/book" >Book</Link></li>
                        <li><Link to="/package" >Package</Link></li>
                        <li><Link to="/service" >Service</Link></li>
                        <li><Link to="/review" >Review</Link></li>
                        <li><Link to="/contact" >Contact</Link></li>
                        <li><Link to="/login" >Login</Link></li>
                    </ul>
                </nav>
            </div>

        </section>
    )


}

export default Header;