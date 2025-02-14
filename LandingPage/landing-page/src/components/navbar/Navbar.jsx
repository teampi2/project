import "./Navbar.css"
import logo from "../../assets/images/Logo.png"
import pc from "../../assets/images/pc.png"
import { useState } from "react";

const Navbar = () => {
    const [menuOpen, setMenuOpen] = useState(false);
    return (
        <div className="navbar-container" id="banner">
            <div className="logo">
                <img src={logo} alt="logo" />
            </div>
            <div className={`nav-items ${menuOpen ? "active" : ""}`}>
                <h3>Primeiro acesso</h3>
                <h3><a href="#services">Funcionalidades</a></h3>
                <h3><a href="#suport">Sobre</a></h3>
            </div>
            <button className="menu-toggle" onClick={() => setMenuOpen(!menuOpen)}>
                &#9776;
            </button>
            <div className="side-nav-items">
                <h3><b>Login</b></h3>
                <img src={pc} alt="login" />
            </div>
        </div>
    )
}

export default Navbar