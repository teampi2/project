import "./Banner.css"
import ellipse from "../../assets/images/ellipse.png"
import student from "../../assets/images/student.png"

const Banner = () => {
  return (
    <div className="banner-container"> 
        <div className="banner-content">
            <div className="banner-heading">
                <h2>Sistema de Gerenciamento de <b>Projetos Acadêmicos</b></h2>
            </div>
            <div className="banner-subheading">
                <p>Sisema de gerenciamento de projetos acadêmicos desenvolvido por estudantes da UFC 
                para o gerenciamento de projetos de extensão 
                </p>
            </div>
            <div className="banner-buttons">
                <button className="banner-acess-button">Acessar sistema</button>
                <button className="banner-learn-button">Saber mais</button>
            </div>
        </div>
        <div className="banner-graphic">
            <img src={ellipse} alt="elipse" />
            <img src={student} alt="student" />
        </div>
        
    </div>
  )
}

export default Banner
