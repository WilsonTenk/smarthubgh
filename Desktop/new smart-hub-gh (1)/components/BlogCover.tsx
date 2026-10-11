import React from 'react';
import { Heart } from 'lucide-react';
import { BlogPost } from '../types';

interface BlogCoverProps {
  post: BlogPost;
}

const BlogCover: React.FC<BlogCoverProps> = ({ post }) => {
  if (post.image) {
    return <img src={post.image} alt={post.imageAlt || post.title} className="w-full h-full object-cover transition-transform duration-700 hover:scale-110" />;
  }

  return (
    <div aria-hidden="true" className="w-full h-full bg-gradient-to-br from-brand-navy via-brand-blue to-brand-navy flex flex-col justify-center items-center text-center text-white p-6 gap-3">
      <Heart size={32} className="text-brand-green shrink-0" />
      <span className="text-xs font-black uppercase tracking-[0.2em] text-white/70">SMART Youth Connekt</span>
      <span className="text-xl md:text-2xl font-black leading-tight max-w-xl">{post.title}</span>
    </div>
  );
};

export default BlogCover;
