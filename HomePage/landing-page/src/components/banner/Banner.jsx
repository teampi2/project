import "./Banner.css"
import ellipse from "../../assets/images/ellipse.png"
import student from "../../assets/images/student.png"

const Banner = () => { 
  return (
    <div className="banner-container"> 
        <div className="banner-content">
            <div className="banner-heading">
                <h2>Ensino de <b>robótica</b> nas escolas</h2>
            </div>
            <div className="banner-subheading">
                <p>Projeto de extensão para o ensino de robótica em turmas do ensino fundamental e médio em
                    escolas de Crateús e Região 
                </p>
            </div>
            <div className="banner-buttons">
                <button className="banner-acess-button">UFC</button>
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
