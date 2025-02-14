import "./Footer.css"

const Footer = () => {
    return (
        <>
            <div className="footer-container">
                <div className="footer-paragraph">
                    <p>Sistema de gerenciamento de projetos acadêmicos<br />
                    desenvolvido para o PI II</p>
                </div>
                <div>
                    <ul className="footer-lists">
                        <li>Projeto</li>
                        <li><a  href="https://github.com/teampi2">GitHub</a></li>
                        <li>Acessar</li>
                    </ul>
                </div>
                <div>
                    <ul className="footer-lists">
                        <li>WebSite</li>
                        <li><a href="#banner">Banner</a></li>
                        <li><a href="#services">Funcionalidades</a></li>
                        <li><a href="#suport">Sobre</a></li>
                    </ul>
                </div>
                <div>
                    <ul className="footer-lists">
                        <li>Contact</li>
                        <li>emailcontato@gmail.com</li>
                        <li>(88) 9.9999-8888</li>
                        <li>sistemapi.com</li>
                    </ul>
                </div>
            </div>
        </>
    )
}

export default Footer