
import React, { useState, useEffect } from 'react';
import { Link, useLocation } from 'react-router-dom';
import { Menu, X, Heart, Sun, Moon } from 'lucide-react';
import { getAssetPath } from '../utils/assetPath';

const Navbar: React.FC = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [isDark, setIsDark] = useState(false);
  const location = useLocation();

  useEffect(() => {
    const isDarkMode = document.documentElement.classList.contains('dark');
    setIsDark(isDarkMode);
  }, []);

  const toggleTheme = () => {
    const newDark = !isDark;
    setIsDark(newDark);
    if (newDark) {
      document.documentElement.classList.add('dark');
      localStorage.setItem('theme', 'dark');
    } else {
      document.documentElement.classList.remove('dark');
      localStorage.setItem('theme', 'light');
    }
  };

  const navLinks = [
    { name: 'Home', path: '/' },
    { name: 'About', path: '/about' },
    { name: 'Projects', path: '/projects' },
    { name: 'Gallery', path: '/gallery' },
    { name: 'Blog', path: '/blog' },
  ];



  return (
    <nav className="absolute top-0 left-0 w-full z-[100] bg-white dark:bg-slate-900 border-b border-slate-100 dark:border-white/5 py-4 md:py-5 transition-colors duration-300">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex justify-between items-center">

          <Link to="/" className="flex items-center gap-3 group relative z-[110]">
            <img src={getAssetPath("/SMART-HUB-LOGO-ORIGINAL.png")} alt="Smart Hub Logo" className="h-16 w-auto object-contain" />
          </Link>

          <div className="hidden lg:flex items-center gap-8">
            <div className="flex items-center gap-6">
              {navLinks.map((link) => (
                <Link
                  key={link.name}
                  to={link.path}
                  className={`text-[11px] font-bold tracking-[0.15em] uppercase transition-all relative group py-1 ${location.pathname === link.path ? 'text-brand-blue' : 'text-slate-500 dark:text-slate-400 hover:text-brand-navy dark:hover:text-white'
                    }`}
                >
                  {link.name}
                  <span className={`absolute bottom-0 left-0 w-0 h-0.5 transition-all duration-300 group-hover:w-full bg-brand-blue ${location.pathname === link.path ? 'w-full' : ''}`}></span>
                </Link>
              ))}
            </div>

            <div className="flex items-center gap-4">
              <button
                onClick={toggleTheme}
                className="p-2 rounded-xl bg-slate-50 dark:bg-white/5 text-brand-navy dark:text-white hover:bg-slate-100 dark:hover:bg-white/10 transition-colors"
                aria-label="Toggle theme"
              >
                {isDark ? <Sun size={18} /> : <Moon size={18} />}
              </button>

              <Link
                to="/contact"
                className="px-6 py-2.5 rounded-xl font-black uppercase text-[10px] tracking-[0.15em] transition-all bg-brand-navy dark:bg-white text-white dark:text-brand-navy hover:bg-brand-blue dark:hover:bg-brand-green shadow-lg active:scale-95 flex items-center gap-2"
              >
                <Heart size={12} fill="currentColor" />
                Donate
              </Link>
            </div>
          </div>

          <div className="lg:hidden flex items-center gap-4 relative z-[110]">
            <button
              onClick={toggleTheme}
              className="p-2 rounded-xl text-brand-navy dark:text-white"
            >
              {isDark ? <Sun size={20} /> : <Moon size={20} />}
            </button>
            <button
              onClick={() => setIsOpen(!isOpen)}
              className="text-brand-navy dark:text-white p-2 hover:bg-slate-50 dark:hover:bg-white/5 rounded-lg transition-colors"
            >
              {isOpen ? <X size={24} /> : <Menu size={24} />}
            </button>
          </div>
        </div>
      </div>

      <div
        className={`lg:hidden fixed inset-0 bg-white dark:bg-slate-900 z-[105] transition-all duration-500 flex flex-col justify-center items-center p-8 ${isOpen ? 'translate-y-0 opacity-100' : '-translate-y-full opacity-0'
          }`}
      >
        <div className="flex flex-col gap-8 text-center">
          {navLinks.map((link) => (
            <Link
              key={link.name}
              to={link.path}
              onClick={() => setIsOpen(false)}
              className={`text-4xl font-black uppercase tracking-tighter transition-all ${location.pathname === link.path ? 'text-brand-blue' : 'text-slate-300 dark:text-slate-700 hover:text-brand-navy dark:hover:text-white'
                }`}
            >
              {link.name}
            </Link>
          ))}

          <Link
            to="/contact"
            onClick={() => setIsOpen(false)}
            className="mt-6 bg-brand-navy dark:bg-white text-white dark:text-brand-navy px-10 py-4 rounded-2xl font-black uppercase text-lg tracking-widest shadow-xl flex items-center justify-center gap-3"
          >
            <Heart size={20} fill="currentColor" /> Donate Now
          </Link>
        </div>
      </div>
    </nav>
  );
};

export default Navbar;
