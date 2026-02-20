
import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { motion, AnimatePresence, useScroll, useTransform } from 'framer-motion';
import { ArrowRight, CheckCircle, ArrowUpRight, Heart, Lightbulb, Minus, Plus, Quote } from 'lucide-react';
import { AnimatedSection } from '../components/AnimatedSection';
import { projectsData } from '../data';

const testimonials = [
  {
    quote: "SMART HUB has fundamentally changed how our youth perceive digital opportunity. They are no longer just consumers, but creators.",
    author: "Kwadwo Mensah",
    role: "Community Leader, Ho"
  },
  {
    quote: "The Safe Flow project restored dignity to our school-going girls. The impact on attendance has been immediate and profound.",
    author: "Ama Serwaa",
    role: "Headteacher, Adaklu"
  },
  {
    quote: "Bridging the gap between raw potential and impactful advocacy. A true partner in development for the Volta Region.",
    author: "Samuel Boateng",
    role: "Project Director, Brave Movement"
  }
];

const Home: React.FC = () => {
  const featuredProjects = projectsData.slice(0, 2);
  const [textIndex, setTextIndex] = useState(0);

  const [currentSlide, setCurrentSlide] = useState(0);
  const slides = [
    '/images/slide-1.png',
    '/images/slide-2.png',
    '/images/slide-3.png'
  ];

  useEffect(() => {
    const slideTimer = setInterval(() => {
      setCurrentSlide((prev) => (prev + 1) % slides.length);
    }, 5000);
    return () => clearInterval(slideTimer);
  }, []);

  const { scrollY } = useScroll();
  const y1 = useTransform(scrollY, [0, 1000], [0, 150]);

  const headlines = [
    {
      top: "Unlocking",
      mid: "Potential",
      bottom: "Across Ghana.",
      color: "text-brand-blue",
      underline: "text-brand-green/20"
    },
    {
      top: "Committed to",
      mid: "IMPACT",
      bottom: "NOW!",
      color: "text-brand-green",
      underline: "text-brand-blue/20"
    }
  ];

  useEffect(() => {
    const timer = setInterval(() => {
      setTextIndex((prev) => (prev + 1) % headlines.length);
    }, 5500);
    return () => clearInterval(timer);
  }, []);

  const lineVariants = {
    initial: { x: 40, opacity: 0 },
    animate: {
      x: 0,
      opacity: 1,
      transition: { duration: 0.8, ease: "easeOut" } // Simplified physics
    },
    exit: {
      x: -20,
      opacity: 0,
      transition: { duration: 0.4 }
    }
  };

  const faqs = [
    {
      question: "How can I volunteer with SMART HUB GH?",
      answer: "We welcome passionate individuals! Reach out via our contact page or email us directly at shub80746@gmail.com for current opportunities."
    },
    {
      question: "Where are you located?",
      answer: "We are based in Ho, Volta Region, Ghana. Our office is on Daglama Street, Near Mirage, House Number AJ552."
    },
    {
      question: "How are donations used?",
      answer: "Donations fund our projects directly, including educational materials, sanitary products for Safe Flow, and community workshops."
    }
  ];

  return (
    <div className="flex flex-col min-h-screen bg-white dark:bg-brand-navy transition-colors duration-300">

      {/* Hero Section */}
      <section className="relative min-h-[90vh] flex items-center pt-32 md:pt-40 pb-16 overflow-hidden bg-white dark:bg-slate-900 transition-colors duration-300">
        <motion.div
          style={{ y: y1 }}
          className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-4xl aspect-square bg-brand-blue/[0.04] dark:bg-brand-blue/[0.08] rounded-full blur-3xl transform-gpu pointer-events-none will-change-transform"
        ></motion.div>

        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

            <div className="lg:col-span-7 flex flex-col justify-center">
              <AnimatedSection direction="right" delay={0.1} className="mb-6">
                <div className="inline-flex items-center gap-3 px-5 py-2 rounded-xl bg-white dark:bg-white/5 shadow-sm border border-slate-100 dark:border-white/5">
                  <span className="flex h-2 w-2 rounded-full bg-brand-green animate-pulse"></span>
                  <span className="text-brand-navy dark:text-white font-black text-[10px] uppercase tracking-[0.3em]">Smart Youth Connect LBG</span>
                </div>
              </AnimatedSection>

              <div className="relative mb-8 md:mb-10 overflow-hidden min-h-[140px] sm:min-h-[220px] md:min-h-[300px]">
                <AnimatePresence mode="wait">
                  <motion.div
                    key={textIndex}
                    initial="initial"
                    animate="animate"
                    exit="exit"
                    className="flex flex-col gap-1 md:gap-2"
                  >
                    <div className="overflow-hidden">
                      <motion.span variants={lineVariants} className="block text-4xl sm:text-6xl md:text-7xl xl:text-8xl text-brand-navy dark:text-white font-black tracking-tighter leading-[1.05]">
                        {headlines[textIndex].top}
                      </motion.span>
                    </div>
                    <div className="overflow-hidden py-1">
                      <motion.span variants={lineVariants} className={`block text-5xl sm:text-7xl md:text-8xl xl:text-9xl ${headlines[textIndex].color} font-black tracking-tighter leading-[1.05] relative inline-block transition-colors duration-500`}>
                        {headlines[textIndex].mid}
                      </motion.span>
                    </div>
                    <div className="overflow-hidden">
                      <motion.span variants={lineVariants} className="block text-4xl sm:text-6xl md:text-7xl xl:text-8xl text-brand-navy dark:text-white font-black tracking-tighter leading-[1.05]">
                        {headlines[textIndex].bottom}
                      </motion.span>
                    </div>
                  </motion.div>
                </AnimatePresence>
              </div>

              <AnimatedSection direction="right" delay={0.6} className="max-w-xl">
                <p className="text-base md:text-xl text-slate-500 dark:text-slate-400 mb-8 font-medium leading-relaxed">
                  Bridging the gap between <span className="text-brand-navy dark:text-white font-black">raw potential</span> and <span className="text-brand-navy dark:text-white font-black">impactful advocacy</span> across Ghana.
                </p>
                <div className="flex flex-wrap gap-4">
                  <Link to="/contact" className="group px-8 py-4 bg-brand-navy dark:bg-white text-white dark:text-brand-navy font-black text-base rounded-xl shadow-xl hover:bg-brand-blue dark:hover:bg-brand-green transition-all duration-300 flex items-center gap-3">
                    Donate Now <ArrowRight size={20} className="group-hover:translate-x-1.5 transition-transform" />
                  </Link>
                  <Link to="/about" className="px-8 py-4 text-brand-navy dark:text-white font-black text-base rounded-xl border-2 border-slate-100 dark:border-white/10 hover:border-brand-blue dark:hover:border-brand-blue transition-all duration-300">
                    Our Mandate
                  </Link>
                </div>
              </AnimatedSection>
            </div>

            <div className="lg:col-span-5 relative mt-8 lg:mt-0">
              <AnimatedSection direction="right" delay={0.8} className="relative">
                <div className="relative w-full aspect-[4/5] max-w-[300px] sm:max-w-[380px] xl:max-w-[440px] mx-auto">
                  <div className="absolute inset-0 bg-brand-blue/5 dark:bg-brand-blue/10 rounded-[3rem_1rem_3rem_1rem] -z-10 translate-x-4 translate-y-4"></div>
                  <div className="relative w-full h-full rounded-[4rem_1.5rem_4rem_1.5rem] overflow-hidden shadow-2xl border-[8px] border-white dark:border-slate-800 z-10 bg-white dark:bg-slate-900">
                    <AnimatePresence mode="wait">
                      <motion.img
                        key={currentSlide}
                        src={slides[currentSlide]}
                        alt="Youth Impact"
                        initial={{ opacity: 0 }}
                        animate={{ opacity: 1 }}
                        exit={{ opacity: 0 }}
                        transition={{ duration: 1 }}
                        className="w-full h-full object-cover absolute inset-0"
                        loading="eager" // Optimize LCP
                        fetchPriority="high"
                      />
                    </AnimatePresence>
                  </div>
                  <motion.div
                    animate={{ y: [0, 10, 0] }}
                    transition={{ duration: 5, repeat: Infinity, ease: "easeInOut" }}
                    className="absolute -bottom-6 -left-4 md:-bottom-8 md:-left-12 bg-white dark:bg-slate-900 p-4 md:p-6 rounded-2xl shadow-xl border border-slate-50 dark:border-white/5 z-20 flex items-center gap-4 max-w-[160px] md:max-w-[220px]"
                  >
                    <div className="w-10 h-10 md:w-12 md:h-12 bg-brand-green/10 rounded-xl flex items-center justify-center text-brand-green shrink-0">
                      <CheckCircle size={24} />
                    </div>
                    <div>
                      <p className="text-lg md:text-xl font-black text-brand-navy dark:text-white leading-none">5 Years</p>
                      <p className="text-[8px] md:text-[9px] uppercase tracking-widest font-black text-slate-400 mt-1">Impact Record</p>
                    </div>
                  </motion.div>
                </div>
              </AnimatedSection>
            </div>
          </div>
        </div>
      </section>

      {/* Marquee */}
      <div className="bg-white dark:bg-brand-navy border-y border-slate-100 dark:border-white/5 py-8 md:py-10 overflow-hidden whitespace-nowrap relative z-10 transition-colors transform-gpu">
        <div className="inline-block animate-marquee">
          {[...Array(6)].map((_, i) => (
            <span key={i} className="text-slate-300 dark:text-slate-700 font-black text-sm md:text-base mx-8 md:mx-12 uppercase tracking-[0.4em] inline-flex items-center">
              Empower <span className="text-brand-green mx-4 opacity-50">•</span> Advocate <span className="text-brand-blue mx-4 opacity-50">•</span> Lead <span className="text-brand-green mx-4 opacity-50">•</span> Innovation <span className="text-brand-blue mx-4 opacity-50">•</span>
            </span>
          ))}
        </div>
      </div>

      {/* Summary Section */}
      <section className="py-16 md:py-24 bg-white dark:bg-brand-navy transition-colors">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 md:gap-20 items-center">
            <AnimatedSection direction="right" className="relative order-2 lg:order-1">
              <div className="relative rounded-[2.5rem] overflow-hidden shadow-xl border-[12px] border-slate-50 dark:border-white/5">
                <img
                  src="https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?q=80&w=2070&auto=format&fit=crop"
                  alt="Team Action"
                  className="w-full h-[350px] md:h-[450px] object-cover"
                />
                <div className="absolute bottom-6 left-6 bg-brand-navy dark:bg-slate-900 text-white p-6 md:p-8 rounded-2xl shadow-2xl">
                  <p className="text-brand-green font-black text-4xl md:text-5xl tracking-tighter leading-none">5,000+</p>
                  <p className="text-[9px] md:text-[10px] uppercase tracking-widest font-black text-slate-400 mt-2">Lives Impacted</p>
                </div>
              </div>
            </AnimatedSection>

            <AnimatedSection direction="right" delay={0.2} className="order-1 lg:order-2">
              <div className="mb-6 flex items-center gap-4">
                <span className="h-1 w-12 bg-brand-green"></span>
                <span className="text-brand-blue font-black uppercase tracking-[0.3em] text-[10px] md:text-xs">Our Global Mandate</span>
              </div>
              <h2 className="text-3xl md:text-6xl text-brand-navy dark:text-white mb-8 font-black tracking-tighter">
                Championing <span className="text-brand-blue">Health</span>, Education & Rights.
              </h2>
              <p className="text-slate-500 dark:text-slate-400 text-base md:text-xl leading-relaxed mb-10 font-medium">
                Reshaping the Ghanaian landscape by building a generation of youth who are healthy, competent, and digitally empowered.
              </p>
              <Link to="/about" className="inline-flex items-center gap-4 text-brand-navy dark:text-white font-black text-lg md:text-xl hover:text-brand-blue transition-all group">
                About the SMART Hub
                <span className="bg-brand-navy dark:bg-white text-white dark:text-brand-navy rounded-full p-2.5 shadow-lg group-hover:bg-brand-blue transition-all">
                  <ArrowUpRight size={20} />
                </span>
              </Link>
            </AnimatedSection>
          </div>
        </div>
      </section>

      {/* Featured Projects */}
      <section className="py-16 md:py-24 bg-slate-50 dark:bg-slate-900/50 transition-colors">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-8">
            <AnimatedSection direction="right">
              <h2 className="text-4xl md:text-7xl text-brand-navy dark:text-white font-black tracking-tighter uppercase">Making <span className="text-brand-blue">History</span></h2>
              <p className="text-slate-400 dark:text-slate-500 mt-2 text-base md:text-xl font-medium">Proof of our commitment in the field.</p>
            </AnimatedSection>
            <Link to="/projects" className="flex items-center gap-3 font-black uppercase tracking-[0.2em] text-brand-navy dark:text-white hover:text-brand-blue transition-all text-xs md:text-sm group">
              All Projects <ArrowRight size={18} className="group-hover:translate-x-1 transition-transform" />
            </Link>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10">
            {featuredProjects.map((project, i) => (
              <AnimatedSection key={project.id} direction="up" delay={i * 0.1} className="group flex flex-col h-full bg-white dark:bg-slate-900 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-slate-100 dark:border-white/5">
                <div className="h-[250px] md:h-[350px] overflow-hidden relative">
                  <img src={project.image} alt={project.title} className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                  <div className="absolute top-4 left-4">
                    <span className="bg-white/95 dark:bg-brand-navy/95 text-brand-navy dark:text-white text-[9px] md:text-[10px] font-black uppercase tracking-[0.2em] px-4 py-2 rounded-lg shadow-sm">
                      {project.sponsor}
                    </span>
                  </div>
                </div>
                <div className="p-8 md:p-10 flex flex-col flex-grow">
                  <h3 className="text-xl md:text-3xl font-black text-brand-navy dark:text-white mb-4 leading-tight tracking-tight group-hover:text-brand-blue transition-colors">
                    {project.title}
                  </h3>
                  <p className="text-slate-400 dark:text-slate-500 text-sm md:text-lg font-medium mb-8 line-clamp-3 flex-grow leading-relaxed">
                    {project.description}
                  </p>
                  <div className="flex justify-between items-center mt-auto pt-6 border-t border-slate-50 dark:border-white/5">
                    <Link to={`/projects/${project.id}`} className="text-brand-blue font-black text-xs md:text-sm uppercase tracking-widest hover:text-brand-navy dark:hover:text-white transition-colors flex items-center gap-2">
                      Read Case Study <ArrowRight size={16} />
                    </Link>
                    <span className="text-[9px] md:text-[10px] font-black text-slate-300 dark:text-slate-700 uppercase tracking-widest">{project.period}</span>
                  </div>
                </div>
              </AnimatedSection>
            ))}
          </div>
        </div>
      </section>

      {/* NEW: Testimonials Section */}
      <section className="py-20 bg-white dark:bg-brand-navy transition-colors overflow-hidden">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

            <div className="lg:col-span-4">
              <AnimatedSection direction="right">
                <div className="w-16 h-1 w-12 bg-brand-green mb-6"></div>
                <h2 className="text-4xl md:text-7xl font-black text-brand-navy dark:text-white tracking-tighter uppercase leading-none mb-8">
                  Voices of <br />
                  <span className="text-brand-blue">Impact</span>
                </h2>
                <p className="text-slate-500 dark:text-slate-400 text-lg font-medium leading-relaxed">
                  The real change isn't measured in reports, but in the stories of the people we serve.
                </p>
              </AnimatedSection>
            </div>

            <div className="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-6 relative">
              <div className="absolute top-0 right-0 text-brand-blue/10 pointer-events-none -translate-y-12">
                <Quote size={200} fill="currentColor" />
              </div>

              {testimonials.map((testimonial, i) => (
                <AnimatedSection
                  key={i}
                  direction="right"
                  delay={i * 0.1}
                  className={`p-8 md:p-10 rounded-[3rem] bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-white/5 shadow-sm hover:shadow-xl transition-all duration-500 ${i === 2 ? 'md:col-span-2' : ''}`}
                >
                  <div className="flex flex-col h-full">
                    <Quote className="text-brand-blue mb-6" size={32} fill="currentColor" />
                    <p className="text-brand-navy dark:text-white font-black text-xl md:text-2xl tracking-tight leading-tight mb-10 flex-grow">
                      "{testimonial.quote}"
                    </p>
                    <div className="flex items-center gap-4 pt-6 border-t border-slate-200/50 dark:border-white/5">
                      <div>
                        <h4 className="font-black text-brand-navy dark:text-white uppercase text-xs tracking-widest">{testimonial.author}</h4>
                        <p className="text-slate-400 dark:text-slate-500 text-[10px] font-black uppercase tracking-widest mt-0.5">{testimonial.role}</p>
                      </div>
                    </div>
                  </div>
                </AnimatedSection>
              ))}
            </div>

          </div>
        </div>
      </section>

      {/* FAQ */}
      <section className="py-16 md:py-24 bg-slate-50 dark:bg-slate-900/50 transition-colors border-y border-slate-100 dark:border-white/5">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <AnimatedSection direction="up" className="text-center mb-12">
            <h2 className="text-3xl md:text-6xl text-brand-navy dark:text-white font-black mb-6 tracking-tighter uppercase">Quick <span className="text-brand-blue">Answers</span></h2>
            <p className="text-slate-400 dark:text-slate-500 text-base md:text-xl font-medium">Everything you need to know about our operations.</p>
          </AnimatedSection>
          <div className="space-y-4">
            {faqs.map((faq, i) => (
              <FAQItem key={i} question={faq.question} answer={faq.answer} index={i} />
            ))}
          </div>
        </div>
      </section>

    </div>
  );
};

const FAQItem: React.FC<{ question: string, answer: string, index: number }> = ({ question, answer, index }) => {
  const [isOpen, setIsOpen] = useState(false);
  return (
    <AnimatedSection direction="right" delay={index * 0.1} className="bg-white dark:bg-slate-900 rounded-2xl overflow-hidden border border-slate-100 dark:border-white/5 hover:shadow-lg transition-all duration-300">
      <button onClick={() => setIsOpen(!isOpen)} className="w-full flex items-center justify-between p-6 md:p-8 text-left group">
        <span className="text-base md:text-xl font-black text-brand-navy dark:text-white group-hover:text-brand-blue transition-colors leading-tight pr-6 tracking-tight">{question}</span>
        <span className={`w-8 h-8 md:w-10 md:h-10 shrink-0 rounded-xl bg-slate-50 dark:bg-white/10 text-brand-blue shadow-sm transition-all duration-500 flex items-center justify-center ${isOpen ? 'rotate-180 bg-brand-blue text-white' : ''}`}>
          {isOpen ? <Minus size={18} /> : <Plus size={18} />}
        </span>
      </button>
      <div className={`overflow-hidden transition-all duration-500 ease-in-out ${isOpen ? 'max-h-96 opacity-100' : 'max-h-0 opacity-0'}`}>
        <div className="px-6 md:px-8 pb-6 md:pb-8 text-slate-500 dark:text-slate-400 font-medium text-sm md:text-lg leading-relaxed border-t border-slate-100/30 dark:border-white/5 pt-6">
          {answer}
        </div>
      </div>
    </AnimatedSection>
  );
}

export default Home;
