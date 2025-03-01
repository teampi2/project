import "./Footer.css"

const Footer = () => {
    return (
        <>
            <div className="footer-container">
                <div className="footer-paragraph">
                    <p>Website do projeto de extensão de Robótica</p>
                </div>
                <div>
                    <ul className="footer-lists">
                        <li>Projeto</li>
                        <li>Acessar</li>
                    </ul>
                </div>
                <div>
                    <ul className="footer-lists">
                        <li>WebSite</li>
                        <li><a href="#services">Objetivos</a></li>
                        <li><a href="#suport">Sobre</a></li>
                    </ul>
                </div>
                <div>
                    <ul className="footer-lists">
                        <li>Contact</li>
                        <li>emailcontato@gmail.com</li>
                        <li>sistemarobotica.com</li>
                    </ul>
                </div>
            </div>
        </>
    )
}

export default Footer