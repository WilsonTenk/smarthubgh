export interface Project {
  id: string;
  title: string;
  period?: string;
  sponsor: string;
  communities: string;
  reach: string;
  description: string;
  image?: string;
  fullContent?: string; // For the detailed view
  galleryImages?: string[]; // For the collage
}

export interface TeamMember {
  role: string;
  description: string;
}

export interface Partner {
  name: string;
  logo: string;
}

export interface LeadershipMember {
  name: string;
  role: string;
  image: string;
  occupation?: string;
  bio?: string;
}

export interface BlogPost {
  id: string;
  title: string;
  date: string;
  excerpt: string;
  content: string;
  image: string;
  author: string;
  category: string;
}