import "./Suporte.css"

const Suporte = () => {
  return (
    <div className="suporte-container" id="suport">
        <h3>Sobre</h3>
        <div className="suporte-wrapper">
            <div className="suporte-details">
                <div className="suporte-detail-head">
                    <h6>Sobre o desenvolvimento <br/> do projeto</h6>
                </div>
                <div className="suporte-detail-body">
                    <p>O respectivo projeto é parte do Projeto Integrador II, que tem como objetivo formentar o desenvolvimento de alguma solução para um determinado problema. 
                        Neste caso, o desenvolvimento de um sistema para gerenciamento de projetos acadêmicos, para uma instituição de nível superior. Como base de dados para o formento de 
                        requisitos e funcionalidades do sistema, foi-se utilizado um projeto de extensão ativo da UFC - Campus Crateús</p>
                </div>
                <div className="suporte-detail-button">
                    <button><a href="https://github.com/teampi2">GitHub - Código</a></button>
                </div>
            </div>
            <div className="suporte-details">
                <div className="suporte-detail-head">
                    <h6>Sobre o problema existente<br />e a solução apresentada</h6>
                </div>
                <div className="suporte-detail-body">
                    <p>O problema existente nos projetos de extensão ativos na UFC, era o raso modo de gerência dos mesmos. As dificuldades em relacionar em um só sistema os entes participantes,
                        bem como atividades e frequências dos mesmos. Com o desenvolvimento do respectivo sistema, é possível unificar em um só todas essas necessidades, automatizando e melhorando 
                        todo o fluxo de trabalho dos responsáveis pelo determinado projeto.
                    </p>
                </div>
                <div className="suporte-detail-button">
                    <button>Acessar Sistema</button>
                </div>
            </div>
        </div>
    </div>
  )
}

export default Suporte