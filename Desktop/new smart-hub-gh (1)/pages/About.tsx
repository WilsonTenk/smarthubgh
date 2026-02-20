
import React, { useState, useEffect } from 'react';
import { motion, useMotionValue, useTransform, animate } from 'framer-motion';
import { AnimatedSection } from '../components/AnimatedSection';
import { leadershipData, partnersData } from '../data';
import { Users, Globe, Layers, CheckCircle2 } from 'lucide-react';

const Counter: React.FC<{ value: number, suffix?: string }> = ({ value, suffix = "" }) => {
  const count = useMotionValue(0);
  const rounded = useTransform(count, (latest) => Math.round(latest));
  const [displayValue, setDisplayValue] = useState(0);

  useEffect(() => {
    const controls = animate(count, value, { duration: 2, ease: "easeOut" });
    return controls.stop;
  }, [value]);

  useEffect(() => {
    return rounded.on("change", (v) => setDisplayValue(v));
  }, [rounded]);

  return <span>{displayValue}{suffix}</span>;
};

const About: React.FC = () => {
  return (
    <div className="bg-white dark:bg-brand-navy min-h-screen transition-colors duration-300">

      {/* Header - Optimized Padding */}
      <div className="relative bg-brand-navy text-white pt-32 md:pt-40 pb-16 md:pb-24 px-4 overflow-hidden">
        <div className="absolute top-0 right-0 w-1/2 h-full bg-brand-blue/10 blur-[150px] pointer-events-none"></div>

        <div className="max-w-7xl mx-auto relative z-10">
          <AnimatedSection direction="right">
            <h1 className="text-5xl md:text-8xl font-black uppercase mb-6 tracking-tighter leading-none">About <span className="text-brand-blue">Us</span></h1>
            <div className="h-1.5 w-16 bg-brand-green mb-8"></div>
            <p className="text-base md:text-2xl font-medium text-slate-300 max-w-2xl leading-relaxed">
              A youth-led future of competent, healthy, and like-minded people making Ghana a premier nation.
            </p>
          </AnimatedSection>
        </div>
      </div>

      {/* Vision & Mission */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
          <AnimatedSection direction="right" className="bg-slate-50 dark:bg-slate-900/50 p-8 md:p-10 rounded-3xl border border-slate-100 dark:border-white/5 transition-colors">
            <h2 className="text-xl md:text-2xl font-black text-brand-navy dark:text-white uppercase mb-4 tracking-tight">Our Vision</h2>
            <p className="text-base md:text-lg font-medium text-slate-600 dark:text-slate-400 leading-relaxed">
              A future of competent, healthy and like-minded people making Ghana a premier nation.
            </p>
          </AnimatedSection>

          <AnimatedSection direction="right" delay={0.1} className="bg-brand-blue p-8 md:p-10 rounded-3xl text-white shadow-xl">
            <h2 className="text-xl md:text-2xl font-black uppercase mb-4 tracking-tight">Our Mission</h2>
            <p className="text-base md:text-lg font-medium leading-relaxed text-white/90">
              To impact the Ghanaian society through education, capacity building and advocacy in child protection, adolescents and reproductive health.
            </p>
          </AnimatedSection>
        </div>
      </div>

      {/* NEW: Impact Statistics Section */}
      <section className="py-20 bg-brand-navy text-white overflow-hidden relative">
        <div className="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,_rgba(0,85,255,0.1),transparent)] pointer-events-none"></div>
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
          <AnimatedSection direction="up" className="text-center mb-16">
            <h2 className="text-4xl md:text-6xl font-black uppercase tracking-tighter mb-4">Our <span className="text-brand-green">Footprint</span></h2>
            <p className="text-slate-400 font-medium text-lg">Measurable change across the region since 2016.</p>
          </AnimatedSection>

          <div className="grid grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            {[
              { label: "Lives Impacted", value: 5000, suffix: "+", icon: <Users className="text-brand-blue" /> },
              { label: "Projects Completed", value: 12, suffix: "", icon: <Layers className="text-brand-green" /> },
              { label: "Communities Reached", value: 30, suffix: "+", icon: <Globe className="text-brand-blue" /> },
              { label: "Active Volunteers", value: 35, suffix: "+", icon: <CheckCircle2 className="text-brand-green" /> }
            ].map((stat, i) => (
              <AnimatedSection key={i} direction="up" delay={i * 0.1} className="bg-white/5 backdrop-blur-sm p-8 rounded-[2.5rem] border border-white/10 text-center flex flex-col items-center">
                <div className="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center mb-6">
                  {stat.icon}
                </div>
                <div className="text-4xl md:text-6xl font-black tracking-tighter mb-2 leading-none">
                  <Counter value={stat.value} suffix={stat.suffix} />
                </div>
                <p className="text-[10px] md:text-xs font-black uppercase tracking-[0.2em] text-slate-400">{stat.label}</p>
              </AnimatedSection>
            ))}
          </div>
        </div>
      </section>

      {/* NEW: Partners Section */}
      <section className="py-20 bg-white dark:bg-slate-900 overflow-hidden border-y border-slate-100 dark:border-white/5 transition-colors">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
          <AnimatedSection direction="right">
            <h2 className="text-2xl md:text-4xl font-black uppercase tracking-tighter text-brand-navy dark:text-white">
              Trusted by <span className="text-brand-blue">Global</span> Partners
            </h2>
          </AnimatedSection>
        </div>

        <div className="relative flex overflow-hidden">
          <div className="flex animate-marquee whitespace-nowrap py-4">
            {[...partnersData, ...partnersData].map((partner, i) => (
              <div key={i} className="mx-8 md:mx-16 flex items-center gap-4 group cursor-pointer">
                <div className="w-12 h-12 md:w-16 md:h-16 bg-slate-100 dark:bg-white/5 rounded-2xl flex items-center justify-center p-2 grayscale group-hover:grayscale-0 transition-all duration-500 overflow-hidden">
                  <img src={partner.logo} alt={partner.name} className="w-full h-full object-contain opacity-50 group-hover:opacity-100" />
                </div>
                <span className="text-sm md:text-lg font-black uppercase tracking-widest text-slate-300 dark:text-slate-600 group-hover:text-brand-blue transition-colors">
                  {partner.name}
                </span>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Significance Grid */}
      <section className="bg-slate-50 dark:bg-slate-900/30 py-16 md:py-20 transition-colors">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 md:gap-16 items-center">
            <AnimatedSection direction="right">
              <div className="bg-white dark:bg-slate-900 p-8 md:p-10 rounded-3xl shadow-sm border border-slate-100 dark:border-white/5 transition-colors">
                <h3 className="text-xl md:text-2xl font-black text-brand-navy dark:text-white mb-8 uppercase tracking-tight">Identity & Values</h3>
                <div className="space-y-6 md:space-y-8">
                  {[
                    { label: "Impact Now", desc: "Commitment to immediate and effective action." },
                    { label: "Unity", desc: "Two hands holding, signifying collective strength." },
                    { label: "Results", desc: "Two leaves sprouting, representing teamwork results." }
                  ].map((val, i) => (
                    <div key={i} className="flex gap-4 items-start">
                      <span className="text-brand-blue font-black text-xl md:text-2xl leading-none">0{i + 1}</span>
                      <div>
                        <h4 className="font-black text-brand-navy dark:text-white uppercase text-sm md:text-base tracking-tight">{val.label}</h4>
                        <p className="text-slate-500 dark:text-slate-400 text-xs md:text-sm mt-1 leading-normal">{val.desc}</p>
                      </div>
                    </div>
                  ))}
                </div>
              </div>
            </AnimatedSection>

            <AnimatedSection direction="right" delay={0.2}>
              <h3 className="text-2xl md:text-4xl font-black text-brand-navy dark:text-white uppercase mb-8 tracking-tighter">What We Do</h3>
              <div className="space-y-3 md:space-y-4">
                {[
                  "Promoting holistic health of children and adolescents.",
                  "Empowering young people with digital capacity.",
                  "Championing child protection and SRHR.",
                  "Advocacy and intervention in GBV issues."
                ].map((item, i) => (
                  <div key={i} className="flex items-center gap-4 py-3 border-b border-slate-100 dark:border-white/5">
                    <div className="w-2 h-2 rounded-full bg-brand-green shrink-0"></div>
                    <p className="text-base md:text-lg text-slate-600 dark:text-slate-400 font-medium leading-tight">{item}</p>
                  </div>
                ))}
              </div>
            </AnimatedSection>
          </div>
        </div>
      </section>

      {/* Leadership */}
      <section className="py-16 md:py-20 bg-white dark:bg-brand-navy transition-colors">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <AnimatedSection direction="up" className="text-center mb-12">
            <h2 className="text-3xl md:text-5xl font-black text-brand-navy dark:text-white uppercase tracking-tighter">Our Leadership</h2>
            <p className="text-slate-500 dark:text-slate-400 mt-3 max-w-xl mx-auto font-medium text-sm md:text-base">
              A diverse team of experts dedicated to advocacy, healthcare, and digital empowerment.
            </p>
          </AnimatedSection>

          <div className="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8">
            {leadershipData.map((leader, idx) => (
              <AnimatedSection key={idx} direction="up" delay={idx * 0.1} className="group text-center">
                <div className="relative rounded-2xl overflow-hidden mb-4 aspect-square shadow-sm">
                  <img src={leader.image} alt={leader.name} className="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 transform group-hover:scale-105" />
                </div>
                <h4 className="text-base md:text-lg font-black text-brand-navy dark:text-white uppercase tracking-tight">{leader.name}</h4>
                <p className="text-brand-blue font-black uppercase text-[9px] md:text-[10px] tracking-[0.2em] mt-1">{leader.role}</p>
              </AnimatedSection>
            ))}
          </div>
        </div>
      </section>
    </div>
  );
};

export default About;
