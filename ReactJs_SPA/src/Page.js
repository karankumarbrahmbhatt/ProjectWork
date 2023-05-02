import {BrowserRouter as Router } from 'react-router-dom'
import Footer from './components/Footer'
import Header from './components/Header'
import PageRoutes from './PageRoutes'

export default function Page(){
    return (
        <Router>
            <div>
                <header>
                    <Header />
                </header>
                <PageRoutes />
                <Footer/>
            </div>
        </Router>
    )
}