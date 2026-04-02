
import React from 'react';
import { useParams, Link } from 'react-router-dom';
import { AnimatedSection } from '../components/AnimatedSection';
import { ArrowLeft, Calendar, Users, MapPin, Award } from 'lucide-react';
import { projectsData } from '../data';

const ProjectDetail: React.FC = () => {
  const { id } = useParams<{ id: string }>();
  const project = projectsData.find(p => p.id === id);

  if (!project) {
    return (
      <div className="min-h-screen bg-brand-light dark:bg-brand-navy flex items-center justify-center flex-col gap-4">
        <h1 className="font-display text-4xl text-brand-navy dark:text-white">Project Not Found</h1>
        <Link to="/projects" className="text-brand-blue underline font-display uppercase tracking-widest">Back to Projects</Link>
      </div>
    );
  }

  return (
    <div className="bg-white dark:bg-brand-navy min-h-screen transition-colors duration-300">

      {/* Hero Image */}
      <div className="relative h-[60vh] bg-brand-navy overflow-hidden">
        <div className="absolute inset-0">
          <img src={project.image} alt={project.title} className="w-full h-full object-cover opacity-60" />
          <div className="absolute inset-0 bg-gradient-to-t from-brand-navy via-transparent to-transparent"></div>
        </div>
        <div className="absolute bottom-0 left-0 w-full p-4 sm:p-8 lg:p-12">
          <div className="max-w-7xl mx-auto">
            <Link to="/projects" className="inline-flex items-center gap-2 text-white/80 hover:text-brand-green mb-6 transition-colors font-display uppercase tracking-widest text-sm">
              <ArrowLeft size={16} /> Back to Projects
            </Link>
            <h1 className="font-display text-5xl md:text-7xl text-white uppercase leading-tight mb-4 tracking-tighter">
              {project.title}
            </h1>
          </div>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        <div className="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-16">

          {/* Sidebar / Metadata */}
          <div className="lg:col-span-1">
            <AnimatedSection direction="up" className="bg-brand-light dark:bg-slate-900/50 p-8 rounded-2xl sticky top-24 border border-slate-100 dark:border-white/5 transition-colors">
              <h3 className="font-display text-2xl uppercase mb-6 text-brand-navy dark:text-white border-b border-gray-200 dark:border-white/10 pb-4 tracking-tight">Project Data</h3>
              <div className="space-y-6">
                <div className="flex items-start gap-4">
                  <div className="w-10 h-10 rounded-full bg-white dark:bg-white/10 flex items-center justify-center text-brand-green shrink-0 shadow-sm">
                    <Calendar size={20} />
                  </div>
                  <div>
                    <p className="text-[10px] font-black text-gray-400 uppercase tracking-widest">Timeline</p>
                    <p className="text-brand-navy dark:text-white font-bold">{project.period}</p>
                  </div>
                </div>
                <div className="flex items-start gap-4">
                  <div className="w-10 h-10 rounded-full bg-white dark:bg-white/10 flex items-center justify-center text-brand-green shrink-0 shadow-sm">
                    <Award size={20} />
                  </div>
                  <div>
                    <p className="text-[10px] font-black text-gray-400 uppercase tracking-widest">Sponsor</p>
                    <p className="text-brand-navy dark:text-white font-bold">{project.sponsor}</p>
                  </div>
                </div>
                <div className="flex items-start gap-4">
                  <div className="w-10 h-10 rounded-full bg-white dark:bg-white/10 flex items-center justify-center text-brand-green shrink-0 shadow-sm">
                    <Users size={20} />
                  </div>
                  <div>
                    <p className="text-[10px] font-black text-gray-400 uppercase tracking-widest">Reach</p>
                    <p className="text-brand-navy dark:text-white font-bold">{project.reach}</p>
                  </div>
                </div>
                <div className="flex items-start gap-4">
                  <div className="w-10 h-10 rounded-full bg-white dark:bg-white/10 flex items-center justify-center text-brand-green shrink-0 shadow-sm">
                    <MapPin size={20} />
                  </div>
                  <div>
                    <p className="text-[10px] font-black text-gray-400 uppercase tracking-widest">Communities</p>
                    <p className="text-brand-navy dark:text-white font-bold">{project.communities}</p>
                  </div>
                </div>
              </div>
            </AnimatedSection>
          </div>

          {/* Main Content */}
          <div className="lg:col-span-2">
            <AnimatedSection direction="up" delay={0.2}>
              <h2 className="text-3xl md:text-4xl font-black uppercase text-brand-navy dark:text-white mb-8 tracking-tighter">Overview</h2>
              <div className="text-gray-600 dark:text-slate-400 font-medium leading-relaxed space-y-6 text-base md:text-xl transition-colors">
                <p>{project.fullContent || project.description}</p>
                <p>
                  Established to bridge the gap between opportunity and capacity, SMART HUB GH focuses on equipping children, adolescents, and youth with the knowledge, tools, and platforms they need to make informed decisions about their health, careers, and communities.
                </p>
                <p>
                  Recognizing the importance of expertise in executing our mandates, our staff undergo continuous training and workshops. These sessions are meticulously crafted to equip our team with the necessary skills and knowledge.
                </p>
              </div>
            </AnimatedSection>
          </div>
        </div>
      </div>

      {/* Impact Visuals — responsive masonry grid for 10+ images */}
      {project.galleryImages && project.galleryImages.length > 0 && (
        <div className="py-24 bg-brand-navy overflow-hidden relative">
          <div className="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-blue to-transparent"></div>

          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <AnimatedSection direction="up" className="text-center mb-16">
              <h2 className="font-display text-5xl md:text-7xl text-white uppercase tracking-tighter">Impact <span className="text-brand-green">Visuals</span></h2>
              <p className="text-slate-400 mt-4 text-lg font-medium">{project.galleryImages.length} photos from this project</p>
            </AnimatedSection>

            {/* Responsive masonry-style grid */}
            <div className="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-4 space-y-4">
              {project.galleryImages.map((img, i) => (
                <AnimatedSection
                  key={i}
                  direction={i % 2 === 0 ? 'left' : 'right'}
                  delay={Math.min(i * 0.08, 0.6)}
                  className="break-inside-avoid"
                >
                  <div className="relative group rounded-2xl overflow-hidden border-2 border-white/10 hover:border-brand-green/50 transition-all duration-500">
                    <img
                      src={img}
                      alt={`${project.title} - Photo ${i + 1}`}
                      className="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700"
                      loading="lazy"
                    />
                    <div className="absolute inset-0 bg-brand-navy/0 group-hover:bg-brand-navy/30 transition-colors duration-300" />
                    <div className="absolute bottom-3 right-3 bg-brand-navy/80 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                      {i + 1} / {project.galleryImages!.length}
                    </div>
                  </div>
                </AnimatedSection>
              ))}
            </div>
          </div>
        </div>
      )}

    </div>
  );
};

export default ProjectDetail;
