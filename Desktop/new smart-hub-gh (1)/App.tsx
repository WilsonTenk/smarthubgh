
import React from 'react';
import { BrowserRouter, Routes, Route, useLocation } from 'react-router-dom';
import Navbar from './components/Navbar';
import Footer from './components/Footer';
import Home from './pages/Home';
import About from './pages/About';
import Projects from './pages/Projects';
import ProjectDetail from './pages/ProjectDetail';
import Gallery from './pages/Gallery';
import Blog from './pages/Blog';
import BlogPost from './pages/BlogPost';
import Contact from './pages/Contact';

const ScrollToTop = () => {
  const { pathname } = useLocation();

  React.useEffect(() => {
    window.scrollTo(0, 0);
  }, [pathname]);

  return null;
};

const App: React.FC = () => {
  return (
    <BrowserRouter basename="/smarthubgh">
      <ScrollToTop />
      <div className="flex flex-col min-h-screen font-sans text-gray-900 dark:text-white bg-white dark:bg-brand-navy transition-colors duration-300">
        <Navbar />
        {/* Main content container with higher z-index to slide over the footer */}
        <div className="relative z-10 bg-white dark:bg-brand-navy shadow-2xl">
          <main className="flex-grow">
            <Routes>
              <Route path="/" element={<Home />} />
              <Route path="/about" element={<About />} />
              <Route path="/projects" element={<Projects />} />
              <Route path="/projects/:id" element={<ProjectDetail />} />
              <Route path="/gallery" element={<Gallery />} />
              <Route path="/blog" element={<Blog />} />
              <Route path="/blog/:id" element={<BlogPost />} />
              <Route path="/contact" element={<Contact />} />
            </Routes>
          </main>
        </div>
        {/* Sticky footer that is "revealed" as content ends */}
        <Footer />
      </div>
    </BrowserRouter>
  );
};

export default App;
