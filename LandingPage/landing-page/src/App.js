import './App.css';
import Banner from './components/banner/Banner';
import Footer from './components/footer/Footer';
import Navbar from './components/navbar/Navbar';
import Services from './components/services/Services';
import Suporte from './components/suporte/Suporte'

function App() {
  return (
    <>
      <Navbar />
      <Banner />
      <Services />
      <Suporte />
      <Footer />
    </>
  );
}

export default App;
