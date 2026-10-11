
import React from 'react';
import { AnimatedSection } from '../components/AnimatedSection';
import { Phone, Mail, MapPin, Heart } from 'lucide-react';

const Contact: React.FC = () => {
  return (
    <div className="bg-brand-light dark:bg-brand-navy min-h-screen transition-colors duration-300">
      
      {/* Header - Optimized Padding */}
      <div className="bg-brand-navy text-white pt-32 md:pt-40 pb-16 px-4">
        <div className="max-w-7xl mx-auto">
          <AnimatedSection direction="right">
            <h1 className="font-black text-5xl md:text-8xl uppercase mb-6 tracking-tighter leading-none">Contact <span className="text-brand-green">& Donate</span></h1>
            <p className="text-base md:text-xl text-gray-400 max-w-2xl font-medium leading-relaxed">
               Join us in empowering young people across Ghana. Your contribution makes a lasting difference.
            </p>
          </AnimatedSection>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
          
          <div className="order-2 lg:order-1">
             <AnimatedSection direction="right" className="bg-brand-blue rounded-3xl p-8 md:p-12 text-white relative overflow-hidden shadow-2xl">
                <div className="relative z-10">
                   <div className="flex items-center gap-4 mb-8">
                     <Heart className="text-brand-green" size={28} fill="currentColor" />
                     <h2 className="font-black text-2xl md:text-3xl uppercase tracking-tight leading-none">
                       Bank Transfer
                     </h2>
                   </div>
                   
                   <div className="bg-white/10 backdrop-blur-md rounded-2xl p-6 md:p-8 border border-white/10 mb-8">
                      <div className="space-y-6 font-mono text-sm md:text-base">
                         <div className="flex flex-col border-b border-white/5 pb-4">
                           <span className="text-white/40 uppercase text-[9px] tracking-[0.2em] mb-1 font-black">Bank Name</span>
                           <span className="font-black text-base md:text-lg">Fidelity Bank, Ho Branch</span>
                         </div>
                         <div className="flex flex-col border-b border-white/5 pb-4">
                           <span className="text-white/40 uppercase text-[9px] tracking-[0.2em] mb-1 font-black">Account Name</span>
                           <span className="font-black text-base md:text-lg">The SMART Hub</span>
                         </div>
                         <div className="flex flex-col pt-2">
                           <span className="text-white/40 uppercase text-[9px] tracking-[0.2em] mb-1 font-black">Account Number</span>
                           <span className="font-black text-xl md:text-2xl text-brand-green tracking-widest break-all">2090251830214</span>
                         </div>
                      </div>
                   </div>

                   <h3 className="font-black text-lg md:text-xl uppercase mb-4 tracking-tight">Other Contributions</h3>
                   <div className="flex flex-wrap gap-2">
                      {["School Materials", "Sanitary Kits", "Tech Devices"].map(item => (
                        <span key={item} className="px-4 py-2 bg-white/5 rounded-full border border-white/10 text-[9px] font-black uppercase tracking-widest">
                          {item}
                        </span>
                      ))}
                   </div>
                </div>
             </AnimatedSection>
          </div>

          <div className="order-1 lg:order-2">
            <AnimatedSection direction="right" delay={0.2}>
              <h2 className="font-black text-2xl md:text-4xl text-brand-navy dark:text-white uppercase mb-10 tracking-tighter transition-colors">Get In Touch</h2>
              
              <div className="grid grid-cols-1 gap-6 md:gap-8">
                <div className="group flex items-start gap-5 p-6 md:p-8 bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-white/5 shadow-sm transition-all duration-300">
                  <div className="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-brand-light dark:bg-white/5 shadow-inner flex items-center justify-center shrink-0 text-brand-navy dark:text-brand-blue group-hover:bg-brand-blue group-hover:text-white transition-all duration-300">
                    <MapPin size={24} />
                  </div>
                  <div>
                    <h3 className="font-black text-sm md:text-base text-brand-navy dark:text-white uppercase tracking-widest mb-1 transition-colors">Location</h3>
                    <p className="text-gray-500 dark:text-slate-400 text-sm md:text-lg leading-tight font-medium transition-colors">Daglama Street, Near Mirage, Ho. AJ552</p>
                    <p className="text-brand-blue/50 text-[9px] font-black mt-2 uppercase tracking-widest">VH-0109-9423</p>
                  </div>
                </div>

                <div className="group flex items-start gap-5 p-6 md:p-8 bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-white/5 shadow-sm transition-all duration-300">
                  <div className="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-brand-light dark:bg-white/5 shadow-inner flex items-center justify-center shrink-0 text-brand-navy dark:text-brand-blue group-hover:bg-brand-blue group-hover:text-white transition-all duration-300">
                    <Phone size={24} />
                  </div>
                  <div>
                    <h3 className="font-black text-sm md:text-base text-brand-navy dark:text-white uppercase tracking-widest mb-1 transition-colors">Contact</h3>
                    <p className="text-gray-500 dark:text-slate-400 text-sm md:text-lg leading-tight font-medium transition-colors">+233 20 437 4782</p>
                    <p className="text-gray-500 dark:text-slate-400 text-sm md:text-lg leading-tight font-medium transition-colors">+233 59 409 7370</p>
                  </div>
                </div>

                <div className="group flex items-start gap-5 p-6 md:p-8 bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-white/5 shadow-sm transition-all duration-300">
                  <div className="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-brand-light dark:bg-white/5 shadow-inner flex items-center justify-center shrink-0 text-brand-navy dark:text-brand-blue group-hover:bg-brand-blue group-hover:text-white transition-all duration-300">
                    <Mail size={24} />
                  </div>
                  <div>
                    <h3 className="font-black text-sm md:text-base text-brand-navy dark:text-white uppercase tracking-widest mb-1 transition-colors">Email</h3>
                    <a href="mailto:admin@smarthubgh.com" className="text-gray-500 dark:text-slate-400 text-sm md:text-lg hover:text-brand-blue transition-colors font-medium border-b border-transparent hover:border-brand-blue transition-all">
                      admin@smarthubgh.com
                    </a>
                  </div>
                </div>
              </div>
            </AnimatedSection>
          </div>

        </div>
      </div>
    </div>
  );
};

export default Contact;
