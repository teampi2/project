import Service from "../service/Service"
import "./Services.css"

const Services = () => {
    return (
        <div id="services">
            <div className="services-container">
                <h3>Funcionalidades do Sistema</h3>
                <div className="services-wrapper">
                    <Service />
                </div>
            </div>
        </div>
  )
}

export default Services
