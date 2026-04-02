import { Project, BlogPost, Partner, LeadershipMember } from './types';
import { getAssetPath } from './utils/assetPath';

export const projectsData: Project[] = [
  {
    id: "brave-movement",
    title: "Brave Movement Community Engagement",
    period: "Aug 2025",
    sponsor: "Brave Movement Ghana",
    communities: "Havedzi",
    reach: "83 community members",
    description: "Led a community engagement session on the prevention of childhood sexual violence (CSV). Empowered members with knowledge to identify, prevent, and respond to cases.",
    image: getAssetPath("/images/brave-thumb.jpg"),
    fullContent: "As members of the Brave Movement Ghana, SMART HUB GH and Developers Net successfully led a community engagement session on the prevention of childhood sexual violence (CSV) at Havedzi on 23rd August 2025. The event brought together 83 community members, including key stakeholders and adults, to build awareness and collective responsibility toward protecting children. Through participatory discussions and interactive education, the session empowered community members with knowledge, practical skills, and confidence.",
    galleryImages: [
      getAssetPath("/images/brave-1.jpg"),
      getAssetPath("/images/brave-2.jpg"),
      getAssetPath("/images/brave-3.jpg"),
      getAssetPath("/images/brave-4.jpg"),
      getAssetPath("/images/brave-5.jpg"),
      getAssetPath("/images/brave-6.jpg"),
      getAssetPath("/images/brave-7.jpg"),
      getAssetPath("/images/brave-8.jpg"),
      getAssetPath("/images/brave-9.jpg"),
      getAssetPath("/images/brave-10.jpg"),
      getAssetPath("/images/brave-11.jpg"),
      getAssetPath("/images/brave-12.jpg")
    ]
  },
  {
    id: "digi-health",
    title: "Digi-Health Impact Project (DHIP)",
    period: "Recent",
    sponsor: "KGL Foundation",
    communities: "Ketu South District",
    reach: "720 beneficiaries",
    description: "Trained high school students in Microsoft Office Suite, graphics design, and cybersecurity alongside an SRHR education campaign.",
    image: getAssetPath("/images/digi-thumb.jpg"),
    fullContent: "The Digi-Health Impact Project trained high school students in Microsoft Office Suite, graphics design, and cybersecurity, alongside an SRHR education campaign. This initiative improved the digital literacy and employability of young people, preparing them for the modern workplace while empowering them with knowledge on reproductive health.",
    galleryImages: [
      getAssetPath("/images/digi-2.jpg"),
      getAssetPath("/images/digi-3.jpg"),
      getAssetPath("/images/digi-4.jpg"),
      getAssetPath("/images/digi-5.jpg"),
      getAssetPath("/images/hygiene-1.jpg"),
      getAssetPath("/images/hygiene-2.jpg"),
      getAssetPath("/images/hygiene-3.jpg"),
      getAssetPath("/images/skills-4.jpg"),
      getAssetPath("/images/skills-5.jpg"),
      getAssetPath("/images/skills-6.jpg")
    ]
  },
  {
    id: "empower-her",
    title: "Empower HER Project",
    period: "Feb – Aug 2024",
    sponsor: "Plan International Ghana",
    communities: "Ve-Golokwati, Ve-Wudome",
    reach: "297 beneficiaries",
    description: "Promoted safe sex education, mobile clinic services, and menstrual hygiene. Built capacity of peer educators.",
    image: getAssetPath("/images/empower-thumb.jpg"),
    fullContent: "This project promoted safe sex education, mobile clinic services, and menstrual hygiene training. It also built the capacity of community peer educators to champion SRHR advocacy. The project increased adolescents' access to reproductive health services and helped reduce stigma associated with menstruation.",
    galleryImages: [
      getAssetPath("/images/empower-2.jpg"),
      getAssetPath("/images/empower-3.jpg"),
      getAssetPath("/images/empower-4.jpg"),
      getAssetPath("/images/empower-5.jpg"),
      getAssetPath("/images/empower-6.jpg"),
      getAssetPath("/images/empower-7.jpg"),
      getAssetPath("/images/empower-8.jpg"),
      getAssetPath("/images/empower-9.jpg"),
      getAssetPath("/images/empower-10.jpg"),
      getAssetPath("/images/empower-11.jpg"),
      getAssetPath("/images/empower-12.jpg"),
      getAssetPath("/images/empower-13.jpg")
    ]
  },
  {
    id: "safe-flow",
    title: "Safe Flow Project",
    period: "Oct 2023 – Feb 2024",
    sponsor: "Plan International Ghana",
    communities: "Adaklu-Ablornu, Sogakope-Fievie",
    reach: "393 beneficiaries",
    description: "Focused on menstrual hygiene, waste management, and adolescent health.",
    image: getAssetPath("/images/safeflow-thumb.jpg"),
    fullContent: "The Safe Flow Project focused on menstrual hygiene, waste management, and adolescent health advocacy. Through community engagement and radio sensitization, the project increased awareness on menstrual health and promoted the safe disposal of sanitary products. It also strengthened adolescent clubs and empowered girls with knowledge to challenge stigma.",
    galleryImages: [
      getAssetPath("/images/safeflow-2.jpg"),
      getAssetPath("/images/safeflow-3.jpg"),
      getAssetPath("/images/safeflow-4.jpg"),
      getAssetPath("/images/safeflow-5.jpg"),
      getAssetPath("/images/safeflow-6.jpg"),
      getAssetPath("/images/safeflow-7.jpg"),
      getAssetPath("/images/safeflow-8.jpg"),
      getAssetPath("/images/safeflow-9.jpg"),
      getAssetPath("/images/safeflow-10.jpg"),
      getAssetPath("/images/hygiene-2.jpg"),
      getAssetPath("/images/hygiene-3.jpg")
    ]
  },
  {
    id: "i-decide",
    title: "I Decide Drive",
    period: "Oct 2022 – Feb 2023",
    sponsor: "Plan International Ghana",
    communities: "Afadjato South, South Tongu, Hohoe",
    reach: "1,200+ beneficiaries",
    description: "Empowered adolescents to make informed decisions about sexual rights and teenage pregnancy.",
    image: getAssetPath("/images/idecide-thumb.jpg"),
    fullContent: "This campaign empowered adolescents to make informed decisions about their sexual rights, focusing on menstrual hygiene, teenage pregnancy, STIs, mental health, and SRHR. It also involved parents, community leaders, and local institutions, leading to more inclusive community dialogue on adolescent wellbeing.",
    galleryImages: [
      getAssetPath("/images/idecide-2.jpg"),
      getAssetPath("/images/idecide-3.jpg"),
      getAssetPath("/images/yet-1.jpg"),
      getAssetPath("/images/yet-2.jpg"),
      getAssetPath("/images/yet-3.jpg"),
      getAssetPath("/images/yet-4.jpg"),
      getAssetPath("/images/yet-5.jpg"),
      getAssetPath("/images/yet-6.jpg"),
      getAssetPath("/images/yet-7.jpg"),
      getAssetPath("/images/yet-8.jpg"),
      getAssetPath("/images/yet-9.jpg"),
      getAssetPath("/images/yet-10.jpg")
    ]
  },
  {
    id: "smart-girl",
    title: "SMART Girl Project",
    period: "Aug 2021 – Feb 2022",
    sponsor: "Plan International Ghana",
    communities: "Ve-Wudome, Ve-Golokwati",
    reach: "325 beneficiaries",
    description: "Enhanced adolescent knowledge on teenage pregnancy prevention and sexual abuse through mentorship.",
    image: getAssetPath("/images/smartgirl-thumb.jpg"),
    galleryImages: [
      getAssetPath("/images/smartgirl-2.jpg"),
      getAssetPath("/images/smartgirl-3.jpg"),
      getAssetPath("/images/smartgirl-4.jpg"),
      getAssetPath("/images/smartgirl-5.jpg"),
      getAssetPath("/images/smartgirl-6.jpg"),
      getAssetPath("/images/yet-11.jpg"),
      getAssetPath("/images/yet-12.jpg"),
      getAssetPath("/images/empower-thumb.jpg"),
      getAssetPath("/images/empower-4.jpg"),
      getAssetPath("/images/empower-5.jpg")
    ]
  },
  {
    id: "covid-19",
    title: "COVID-19 Campaign",
    period: "Mar – Jul 2020",
    sponsor: "SMART HUB GH",
    communities: "Adaklu-Ablornu",
    reach: "300+ school children",
    description: "Educated pupils and parents on COVID-19 protocols, personal hygiene, and reproductive health rights.",
    image: getAssetPath("/images/covid-thumb.jpg"),
    galleryImages: [
      getAssetPath("/images/covid-2.jpg"),
      getAssetPath("/images/covid-3.jpg"),
      getAssetPath("/images/skills-7.jpg"),
      getAssetPath("/images/skills-4.jpg"),
      getAssetPath("/images/skills-5.jpg"),
      getAssetPath("/images/skills-6.jpg"),
      getAssetPath("/images/skills-2.jpg"),
      getAssetPath("/images/skills-3.jpg"),
      getAssetPath("/images/hygiene-1.jpg"),
      getAssetPath("/images/hygiene-3.jpg")
    ]
  },
  {
    id: "capacity-building",
    title: "Capacity Building (UHAS – Ho)",
    period: "Ongoing",
    sponsor: "SMART HUB GH",
    communities: "Tertiary Students",
    reach: "50 tertiary students",
    description: "Focused on public speaking and digital skills, empowering university students for leadership.",
    image: getAssetPath("/images/skills-thumb.jpg"),
    galleryImages: [
      getAssetPath("/images/skills-2.jpg"),
      getAssetPath("/images/skills-3.jpg"),
      getAssetPath("/images/skills-4.jpg"),
      getAssetPath("/images/skills-5.jpg"),
      getAssetPath("/images/skills-6.jpg"),
      getAssetPath("/images/skills-7.jpg"),
      getAssetPath("/images/digi-thumb.jpg"),
      getAssetPath("/images/digi-2.jpg"),
      getAssetPath("/images/digi-3.jpg"),
      getAssetPath("/images/digi-4.jpg")
    ]
  },
  {
    id: "vee-mentorship",
    title: "Vee Mentorship",
    period: "Past",
    sponsor: "Developer's Net",
    communities: "Ho",
    reach: "120 girls",
    description: "Provided mentorship to 120 girls on career choices, teenage pregnancy prevention, and menstrual hygiene.",
    image: getAssetPath("/images/vee-thumb.jpg"),
    galleryImages: [
      getAssetPath("/images/vee-2.jpg"),
      getAssetPath("/images/vee-3.jpg"),
      getAssetPath("/images/smartgirl-thumb.jpg"),
      getAssetPath("/images/smartgirl-2.jpg"),
      getAssetPath("/images/smartgirl-3.jpg"),
      getAssetPath("/images/smartgirl-4.jpg"),
      getAssetPath("/images/smartgirl-5.jpg"),
      getAssetPath("/images/smartgirl-6.jpg"),
      getAssetPath("/images/idecide-2.jpg"),
      getAssetPath("/images/idecide-3.jpg")
    ]
  }
];

export const blogData: BlogPost[] = [
  {
    id: "breaking-silence-havedzi",
    title: "Breaking the Silence: Havedzi Community Speaks Up",
    date: "August 25, 2025",
    category: "Advocacy",
    author: "SMART HUB Media",
    image: getAssetPath("/images/brave-thumb.jpg"),
    excerpt: "A deep dive into our recent community engagement on childhood sexual violence prevention.",
    content: "As members of the Brave Movement Ghana, SMART HUB GH and Developers Net successfully led a community engagement session on the prevention of childhood sexual violence (CSV) at Havedzi on 23rd August 2025. The event brought together 83 community members (32 males and 51 females), including key stakeholders and adults, to build awareness and collective responsibility toward protecting children..."
  },
  {
    id: "digital-skills-youth",
    title: "Why Digital Skills are Vital for Ghanaian Youth",
    date: "July 15, 2025",
    category: "Education",
    author: "Program Coordinator",
    image: getAssetPath("/images/digi-thumb.jpg"),
    excerpt: "Exploring the impact of the Digi-Health Impact Project and the future of work.",
    content: "In a rapidly evolving digital world, the gap between opportunity and capacity is widening. Our Digi-Health Impact Project seeks to bridge this gap by equipping high school students with essential Microsoft Office and Graphic Design skills..."
  },
  {
    id: "menstrual-hygiene-matters",
    title: "Menstrual Hygiene: Ending the Stigma",
    date: "May 28, 2025",
    category: "Health",
    author: "Health Team",
    image: getAssetPath("/images/hygiene-3.jpg"),
    excerpt: "Reflections from the Safe Flow Project and our work in Adaklu-Ablornu.",
    content: "Menstruation is a natural biological process, yet it remains shrouded in silence and stigma in many communities. Through the Safe Flow Project, we are changing the narrative..."
  }
];

export const partnersData: Partner[] = [
  { name: "Plan International Ghana", logo: "https://placehold.co/400x200/white/0B1121?text=Plan+Intl+Ghana" },
  { name: "KGL Foundation", logo: "https://placehold.co/400x200/white/0B1121?text=KGL+Foundation" },
  { name: "Government Agencies", logo: "https://placehold.co/400x200/white/0B1121?text=Govt+Agencies" },
  { name: "Religious Bodies", logo: "https://placehold.co/400x200/white/0B1121?text=Religious+Bodies" },
  { name: "Developer's Net", logo: "https://placehold.co/400x200/white/0B1121?text=Developer's+Net" },
  { name: "Brave Movement Ghana", logo: "https://placehold.co/400x200/white/0B1121?text=Brave+Movement" },
  { name: "AfriYAN GHANA", logo: "https://placehold.co/400x200/white/0B1121?text=AfriYAN+GHANA" }
];

export const leadershipData: LeadershipMember[] = [
  {
    name: "Victor Kofi Norgbedzi",
    role: "Founder and CEO",
    occupation: "Physician Assistant",
    image: getAssetPath("/images/Victor Kofi Norgbedzi.jpeg"),
    bio: "Victor Kofi Norgbedzi is a Physician Assistant and public health advocate with a strong passion for community development, youth empowerment, and reproductive health promotion. He holds a Bachelor of Science in Physician Assistantship (Clinical) from the University of Health and Allied Sciences and has actively contributed to community-based health education and advocacy initiatives. Victor is the Founder and CEO of SMART HUB, where he leads programs focused on sexual and reproductive health education, youth mentorship, and community engagement. Through his leadership and outreach work, he has supported initiatives that empower adolescents and young people with knowledge and skills to make informed health decisions. Victor is also actively involved in volunteer health outreach and youth leadership initiatives. His work is driven by a commitment to improving access to health information and preventive care, particularly for underserved communities in Ghana."
  },
  {
    name: "Zenas Fiagbe",
    role: "Executive Secretary",
    occupation: "Public Health Professional",
    image: getAssetPath("/images/Zenas Fiagbe.jpeg"),
    bio: "Zenas Fiagbe is a dedicated public health professional with over five years of experience in youth advocacy. He has played key roles in impactful projects with UNFPA, Verifie Health, and Smart Hub Ghana—contributing to initiatives that promote adolescents’ health and wellbeing. In his role as Executive Secretary of Smart Hub Ghana, Zenas oversees daily operations, coordination, and organizational functions that drive the effectiveness of the team. He is goal-oriented, hardworking, and fully committed to advancing positive change within communities across Ghana."
  },
  {
    name: "Bright Vakpor",
    role: "YET Project Manager",
    occupation: "Public Health Nurse",
    image: getAssetPath("/images/Bright Vakpor.jpeg"),
    bio: "Bright Vakpor is a Public Health Nurse who completed the University of Health and Allied Sciences, Ho in 2023. He is 24 years old and was born on June 15th, 2001. He is the Youth Empowered to Thrive (YET) Project Manager at SMART Hub Gh. With a strong passion for public health advocacy, Bright works closely with young people, peer educators, and community stakeholders to advance Sexual and Reproductive Health and Rights (SRHR) and prevent Sexual and Gender-Based Violence (SGBV). Bright believes in transforming communities through education, mentorship, and youth-led action."
  },
  {
    name: "Rita Dzifa Katso",
    role: "Research Director",
    occupation: "Public Health Officer (Disease Control)",
    image: getAssetPath("/images/Rita Dzifa Katso.jpeg"),
    bio: "Dzifa Katso Rita is a Disease Control Officer in the field of Public Health and an advocate for Sexual and Reproductive Health and Rights (SRHR). She is passionate about promoting community health and empowering young people through education, advocacy, and leadership development. Her work focuses on raising awareness, supporting safe environments, and equipping individuals with the knowledge to make informed decisions about their health and wellbeing."
  },
  {
    name: "Benedicta Afrifah Baah",
    role: "Finance Officer",
    occupation: "Physician Assistant",
    image: getAssetPath("/images/Benedicta Afrifah Baah.jpeg"),
    bio: "Benedicta Afrifah Baah is a Board-Certified Physician Assistant with a Masters in Public Health and over 5 years field experience in youth development, and Sexual and Reproductive Health and Rights advocacy with special focus on curbing teenage pregnancy, promoting healthy sexual habits."
  },
  {
    name: "Foster D. Kamasa",
    role: "Member",
    occupation: "Student & Public Health Enthusiast",
    image: getAssetPath("/images/Foster D. Kamasa.jpeg"),
    bio: "Foster is a dedicated final-year student and public health enthusiast committed to driving meaningful systemic change. As a distinguished alumnus of the Millennium Campus Network, he draws on global leadership experiences to inspire and empower the next generation of changemakers. He is a passionate advocate for sexual and reproductive health and rights (SRHR). He is deeply committed to engaging young people through education, awareness, and grassroots activism. He works to ensure that young people are equipped with the knowledge and tools needed to make informed decisions about their health and rights. By bridging the gap between policy and community action."
  },
  {
    name: "Josephine Nyator",
    role: "Member",
    occupation: "Public Health Officer",
    image: getAssetPath("/images/Josephine Nyator.jpeg"),
    bio: "I am a Public Health Officer, with a strong foundation in advocacy, project management, and research. As a member of SMART HUB, I engage in innovative public health initiatives that drive community impact (Adolescent Sexual and Reproductive Health Rights). My goal is improving health of populations and reducing health inequities among population groups using a variety of strategies. I am passionate about leveraging my skills and experience to contribute to impactful public health projects and research initiatives."
  },
  {
    name: "Tamakloe Felrose",
    role: "Member",
    occupation: "Physician Assistant (Med)",
    image: getAssetPath("/images/Tamakloe Felrose.jpeg"),
    bio: "I am a Physician Assistant and youth advocate passionate about promoting health education and empowering young people to make informed decisions about their wellbeing. Through my work with SmartHub I actively educate adolescents and communities on menstrual hygiene, sexual and reproductive health rights, and general health awareness. I am committed to advancing youth development, gender equality, and access to accurate health information. My goal is to bridge the gap between healthcare and community education by creating safe spaces for learning, dialogue, and positive behavioral change that supports healthier and more empowered communities."
  }
];