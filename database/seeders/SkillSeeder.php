<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $skill = Skill::factory(120)->create();

        $skills = [
            [
                'id' => 1,
                'name' => 'Web Development',
                'description' => 'Creating and maintaining websites and web applications'
            ],
            [
                'id' => 2,
                'name' => 'Mobile App Development',
                'description' => 'Designing and building applications for mobile devices'
            ],
            [
                'id' => 3,
                'name' => 'Data Analysis',
                'description' => 'Analyzing and interpreting complex data sets'
            ],
            [
                'id' => 4,
                'name' => 'Project Management',
                'description' => 'Organizing and leading projects'
            ],
            [
                'id' => 5,
                'name' => 'UI/UX Design',
                'description' => 'Creating intuitive and user-friendly interfaces'
            ],
            [
                'id' => 6,
                'name' => 'Data Science',
                'description' => 'Extracting knowledge and insights from data'
            ],
            [
                'id' => 7,
                'name' => 'Digital Marketing',
                'description' => 'Promoting products or brands via digital channels'
            ],
            [
                'id' => 8,
                'name' => 'Cybersecurity',
                'description' => 'Protecting computer systems from theft or damage to their hardware, software, or electronic data'
            ],
            [
                'id' => 9,
                'name' => 'Content Writing',
                'description' => 'Creating written content for various purposes'
            ],
            [
                'id' => 10,
                'name' => 'Cloud Computing',
                'description' => 'Storing and accessing data and programs over the internet instead of a computer\'s hard drive'
            ],
            [
                'id' => 11,
                'name' => 'Video Production',
                'description' => 'Creating and editing video content'
            ],
            [
                'id' => 12,
                'name' => 'Sales Strategy',
                'description' => 'Developing strategies to boost product sales'
            ],
            [
                'id' => 13,
                'name' => 'Database Management',
                'description' => 'Organizing and managing company data'
            ],
            [
                'id' => 14,
                'name' => 'Graphic Design',
                'description' => 'Creating visual content to communicate messages'
            ],
            [
                'id' => 15,
                'name' => 'Social Media Management',
                'description' => 'Creating and managing content on social media platforms'
            ],
            [
                'id' => 16,
                'name' => 'Search Engine Optimization (SEO)',
                'description' => 'Improving the visibility of websites or web pages in search engines'
            ],
            [
                'id' => 17,
                'name' => 'E-commerce Management',
                'description' => 'Managing online sales and transactions'
            ],
            [
                'id' => 18,
                'name' => 'Network Administration',
                'description' => 'Maintaining computer networks and systems'
            ],
            [
                'id' => 19,
                'name' => 'Copywriting',
                'description' => 'Writing content to sell or promote a product or service'
            ],
            [
                'id' => 20,
                'name' => 'DevOps',
                'description' => 'Improving collaboration and productivity by automating infrastructure, workflows, and continuous feedback'
            ],
            [
                'id' => 21,
                'name' => 'Machine Learning',
                'description' => 'Developing algorithms that enable computers to learn'
            ],
            [
                'id' => 22,
                'name' => 'Artificial Intelligence (AI)',
                'description' => 'Simulating human intelligence in machines'
            ],
            [
                'id' => 23,
                'name' => 'User Research',
                'description' => 'Studying user behaviors and needs to create better products'
            ],
            [
                'id' => 24,
                'name' => 'Brand Management',
                'description' => 'Maintaining the brand\'s integrity and reputation'
            ],
            [
                'id' => 25,
                'name' => 'Data Visualization',
                'description' => 'Representing data in graphical or visual format'
            ],
            [
                'id' => 26,
                'name' => 'Agile Methodologies',
                'description' => 'Using iterative work sequences known as sprints'
            ],
            [
                'id' => 27,
                'name' => 'Quality Assurance',
                'description' => 'Ensuring that products or services meet required standards'
            ],
            [
                'id' => 28,
                'name' => 'Customer Relationship Management (CRM)',
                'description' => 'Managing interactions with current and potential customers'
            ],
            [
                'id' => 29,
                'name' => 'Financial Analysis',
                'description' => 'Evaluating and interpreting financial data'
            ],
            [
                'id' => 30,
                'name' => 'Mobile UI Design',
                'description' => 'Designing interfaces for mobile applications'
            ],
            [
                'id' => 31,
                'name' => 'Statistical Analysis',
                'description' => 'Evaluating and interpreting data'
            ],
            [
                'id' => 32,
                'name' => 'Leadership',
                'description' => 'Guiding and directing a group of people or an organization'
            ],
            [
                'id' => 33,
                'name' => 'Machine Vision',
                'description' => 'Enabling computers to see, process, and understand images'
            ],
            [
                'id' => 34,
                'name' => 'Human Resources Management',
                'description' => 'Managing employee relations, recruitment, and other HR-related tasks'
            ],
            [
                'id' => 35,
                'name' => 'Risk Management',
                'description' => 'Identifying, assessing, and prioritizing risks'
            ],
            [
                'id' => 36,
                'name' => 'Data Warehousing',
                'description' => 'Collecting and managing large amounts of data'
            ],
            [
                'id' => 37,
                'name' => 'Process Improvement',
                'description' => 'Enhancing business processes to improve efficiency'
            ],
            [
                'id' => 38,
                'name' => 'Web Analytics',
                'description' => 'Measuring, collecting, analyzing, and reporting web data'
            ],
            [
                'id' => 39,
                'name' => 'Technical Support',
                'description' => 'Providing technical assistance to users and customers'
            ],
            [
                'id' => 40,
                'name' => 'Ethical Hacking',
                'description' => 'Testing information systems for security vulnerabilities'
            ],
            [
                'id' => 41,
                'name' => 'Content Management Systems (CMS)',
                'description' => 'Managing digital content on a website'
            ],
            [
                'id' => 42,
                'name' => 'Behavioral Psychology',
                'description' => 'Studying human behavior and mind'
            ],
            [
                'id' => 43,
                'name' => 'Virtual Reality (VR)',
                'description' => 'Creating immersive experiences'
            ],
            [
                'id' => 44,
                'name' => 'Augmented Reality (AR)',
                'description' => 'Enhancing real-world environments with computer-generated information'
            ],
            [
                'id' => 45,
                'name' => 'User Interface Design (UI)',
                'description' => 'Designing the interface for software or devices'
            ],
            [
                'id' => 46,
                'name' => 'User Experience Design (UX)',
                'description' => 'Enhancing user satisfaction by improving the usability and accessibility of a product'
            ],
            [
                'id' => 47,
                'name' => 'Blockchain Technology',
                'description' => 'Creating and managing a decentralized digital ledger'
            ],
            [
                'id' => 48,
                'name' => 'Quantum Computing',
                'description' => 'Performing computation based on the laws of quantum theory'
            ],
            [
                'id' => 49,
                'name' => 'Human-Computer Interaction (HCI)',
                'description' => 'Studying, designing, and implementing the interaction between humans and computers'
            ],
            [
                'id' => 50,
                'name' => 'Predictive Analytics',
                'description' => 'Using data, statistical algorithms, and machine learning techniques to identify the likelihood of future outcomes'
            ],
            [
                'id' => 51,
                'name' => 'Speech Recognition',
                'description' => 'Understanding and interpreting spoken language'
            ],
            [
                'id' => 52,
                'name' => 'Natural Language Processing (NLP)',
                'description' => 'Interpreting and processing human language data'
            ],
            [
                'id' => 53,
                'name' => 'Genetic Algorithms',
                'description' => 'Solving optimization problems using natural selection'
            ],
            [
                'id' => 54,
                'name' => 'Growth Hacking',
                'description' => 'Using creative marketing strategies for rapid growth'
            ],
            [
                'id' => 55,
                'name' => 'Neural Networks',
                'description' => 'Algorithms modeled after the human brain\'s structure and function'
            ],
            [
                'id' => 56,
                'name' => 'Data Mining',
                'description' => 'Analyzing large amounts of data to identify patterns'
            ],
            [
                'id' => 57,
                'name' => 'Internet of Things (IoT)',
                'description' => 'Connecting devices and enabling data transfer over a network without human interaction'
            ],
            [
                'id' => 58,
                'name' => 'Supply Chain Management',
                'description' => 'Managing the flow of goods and services'
            ],
            [
                'id' => 59,
                'name' => 'Econometrics',
                'description' => 'Applying statistical methods to economic data'
            ],
            [
                'id' => 60,
                'name' => 'Data Governance',
                'description' => 'Managing the availability, usability, integrity, and security of data'
            ],
            [
                'id' => 61,
                'name' => 'Software Development Lifecycle (SDLC)',
                'description' => 'The process of planning, creating, testing, and deploying software'
            ],
            [
                'id' => 62,
                'name' => 'Microservices Architecture',
                'description' => 'Building software systems as a collection of small services'
            ],
            [
                'id' => 63,
                'name' => 'Robotics',
                'description' => 'Designing and building robots'
            ],
            [
                'id' => 64,
                'name' => 'Cloud Security',
                'description' => 'Protecting data stored online from theft, leakage, and deletion'
            ],
            [
                'id' => 65,
                'name' => 'Bioinformatics',
                'description' => 'Applying computational techniques to biological information'
            ],
            [
                'id' => 66,
                'name' => 'Embedded Systems',
                'description' => 'Designing and developing computer systems that have dedicated functions'
            ],
            [
                'id' => 67,
                'name' => 'Cryptocurrency',
                'description' => 'Digital or virtual currency that uses cryptography for security'
            ],
            [
                'id' => 68,
                'name' => 'Quantitative Analysis',
                'description' => 'Using mathematical and statistical modeling and research to understand behavior'
            ],
            [
                'id' => 69,
                'name' => 'Knowledge Management',
                'description' => 'Collecting, organizing, and sharing information within an organization'
            ],
            [
                'id' => 70,
                'name' => 'Geographic Information Systems (GIS)',
                'description' => 'Analyzing and visualizing geospatial data'
            ],
            [
                'id' => 71,
                'name' => 'Sustainability Planning',
                'description' => 'Creating strategies for sustainable development and resource management'
            ],
            [
                'id' => 72,
                'name' => 'Remote Sensing',
                'description' => 'Gathering information about an object without physically being in contact with it'
            ],
            [
                'id' => 73,
                'name' => 'Digital Forensics',
                'description' => 'Investigating and recovering information from digital devices'
            ],
            [
                'id' => 74,
                'name' => 'Health Informatics',
                'description' => 'Managing healthcare data and information systems'
            ],
            [
                'id' => 75,
                'name' => 'Crisis Management',
                'description' => 'Handling and mitigating crises within an organization'
            ],
            [
                'id' => 76,
                'name' => 'Conflict Resolution',
                'description' => 'Resolving conflicts and disputes within teams or organizations'
            ],
            [
                'id' => 77,
                'name' => 'Innovation Management',
                'description' => 'Fostering and managing innovation within an organization'
            ],
            [
                'id' => 78,
                'name' => 'Compliance and Regulatory Management',
                'description' => 'Ensuring adherence to laws, regulations, and standards'
            ],
            [
                'id' => 79,
                'name' => 'Gamification',
                'description' => 'Implementing game-design elements in non-game contexts'
            ],
            [
                'id' => 80,
                'name' => 'Emotional Intelligence',
                'description' => 'Understanding and managing emotions in oneself and others'
            ],
            [
                'id' => 81,
                'name' => 'Change Management',
                'description' => 'Managing and adapting to organizational change'
            ],
            [
                'id' => 82,
                'name' => 'Design Thinking',
                'description' => 'Creating innovative solutions by understanding user needs'
            ],
            [
                'id' => 83,
                'name' => 'Remote Work Collaboration',
                'description' => 'Collaborating effectively in a remote work environment'
            ],
            [
                'id' => 84,
                'name' => 'Adaptive Leadership',
                'description' => 'Adjusting leadership styles to changing situations'
            ],
            [
                'id' => 85,
                'name' => 'Localization',
                'description' => 'Adapting products or content to specific regions or markets'
            ],
            [
                'id' => 86,
                'name' => 'Talent Acquisition',
                'description' => 'Recruiting and hiring skilled individuals'
            ],
            [
                'id' => 87,
                'name' => 'Onboarding and Training',
                'description' => 'Introducing and training new employees within an organization'
            ],
            [
                'id' => 88,
                'name' => 'Employee Engagement',
                'description' => 'Creating a positive work environment and involving employees in the company’s mission'
            ],
            [
                'id' => 89,
                'name' => 'Virtual Team Management',
                'description' => 'Managing and leading teams working remotely'
            ],
            [
                'id' => 90,
                'name' => 'Legal Tech',
                'description' => 'Applying technology to the practice of law'
            ],
            [
                'id' => 91,
                'name' => 'Knowledge of Employment Law',
                'description' => 'Understanding laws and regulations related to employment'
            ],
            [
                'id' => 92,
                'name' => 'Data Ethics',
                'description' => 'Dealing with moral and privacy issues in data collection and management'
            ],
            [
                'id' => 93,
                'name' => 'Conversational User Interface (CUI)',
                'description' => 'Designing interfaces for natural language conversation'
            ],
            [
                'id' => 94,
                'name' => 'Robotic Process Automation (RPA)',
                'description' => 'Automating repetitive tasks using software robots'
            ],
            [
                'id' => 95,
                'name' => 'Knowledge of International Business',
                'description' => 'Understanding global business practices and cultures'
            ],
            [
                'id' => 96,
                'name' => 'Social Responsibility',
                'description' => 'Engaging in activities that benefit society'
            ],
            [
                'id' => 97,
                'name' => 'Green Technology',
                'description' => 'Developing and using environmentally friendly technologies'
            ],
            [
                'id' => 98,
                'name' => 'Knowledge of Cross-Cultural Communication',
                'description' => 'Understanding communication across different cultures'
            ],
            [
                'id' => 99,
                'name' => 'Global Supply Chain',
                'description' => 'Managing the flow of goods and services on a global scale'
            ],
            [
                'id' => 100,
                'name' => 'Cognitive Flexibility',
                'description' => 'Adapting and switching between tasks requiring different mental processes'
            ],
        ];

        foreach ($skills as $skill) {
            Skill::factory()->create($skill);
        }
    }
}
