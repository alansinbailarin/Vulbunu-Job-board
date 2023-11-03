<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $tag = Tag::factory(20)->create();

        $tags = [
            [
                'id' => 1,
                'name' => 'Leadership',
                'slug' => 'leadership',
                'color' => '#FF5733'
            ],
            [
                'id' => 2,
                'name' => 'Teamwork',
                'slug' => 'teamwork',
                'color' => '#3366FF'
            ],
            [
                'id' => 3,
                'name' => 'Problem Solving',
                'slug' => 'problem-solving',
                'color' => '#33FF57'
            ],
            [
                'id' => 4,
                'name' => 'Creativity',
                'slug' => 'creativity',
                'color' => '#CC33FF'
            ],
            [
                'id' => 5,
                'name' => 'Communication',
                'slug' => 'communication',
                'color' => '#33FFCC'
            ],
            [
                'id' => 6,
                'name' => 'Time Management',
                'slug' => 'time-management',
                'color' => '#FF3366'
            ],
            [
                'id' => 7,
                'name' => 'Adaptability',
                'slug' => 'adaptability',
                'color' => '#33CCFF'
            ],
            [
                'id' => 8,
                'name' => 'Critical Thinking',
                'slug' => 'critical-thinking',
                'color' => '#FF33CC'
            ],
            [
                'id' => 9,
                'name' => 'Attention to Detail',
                'slug' => 'attention-to-detail',
                'color' => '#66FF33'
            ],
            [
                'id' => 10,
                'name' => 'Resilience',
                'slug' => 'resilience',
                'color' => '#33FF66'
            ],
            [
                'id' => 11,
                'name' => 'Customer Service',
                'slug' => 'customer-service',
                'color' => '#6633FF'
            ],
            [
                'id' => 12,
                'name' => 'Negotiation',
                'slug' => 'negotiation',
                'color' => '#FF6633'
            ],
            [
                'id' => 13,
                'name' => 'Project Management',
                'slug' => 'project-management',
                'color' => '#FFCC33'
            ],
            [
                'id' => 14,
                'name' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'color' => '#3399FF'
            ],
            [
                'id' => 15,
                'name' => 'Sales',
                'slug' => 'sales',
                'color' => '#99FF33'
            ],
            [
                'id' => 16,
                'name' => 'Analytical Skills',
                'slug' => 'analytical-skills',
                'color' => '#FF9933'
            ],
            [
                'id' => 17,
                'name' => 'Emotional Intelligence',
                'slug' => 'emotional-intelligence',
                'color' => '#33FF99'
            ],
            [
                'id' => 18,
                'name' => 'Networking',
                'slug' => 'networking',
                'color' => '#9933FF'
            ],
            [
                'id' => 19,
                'name' => 'Programming',
                'slug' => 'programming',
                'color' => '#FF3399'
            ],
            [
                'id' => 20,
                'name' => 'Graphic Design',
                'slug' => 'graphic-design',
                'color' => '#33FFCC'
            ],
            [
                'id' => 21,
                'name' => 'Web Development',
                'slug' => 'web-development',
                'color' => '#CC33FF'
            ],
            [
                'id' => 22,
                'name' => 'Data Analysis',
                'slug' => 'data-analysis',
                'color' => '#33FF33'
            ],
            [
                'id' => 23,
                'name' => 'Social Media Management',
                'slug' => 'social-media-management',
                'color' => '#FF33FF'
            ],
            [
                'id' => 24,
                'name' => 'Content Writing',
                'slug' => 'content-writing',
                'color' => '#33CCFF'
            ],
            [
                'id' => 25,
                'name' => 'Event Planning',
                'slug' => 'event-planning',
                'color' => '#FF33CC'
            ],
            [
                'id' => 26,
                'name' => 'Customer Relationship Management',
                'slug' => 'customer-relationship-management',
                'color' => '#66FF33'
            ],
            [
                'id' => 27,
                'name' => 'Public Speaking',
                'slug' => 'public-speaking',
                'color' => '#33FF66'
            ],
            [
                'id' => 28,
                'name' => 'Financial Planning',
                'slug' => 'financial-planning',
                'color' => '#6633FF'
            ],
            [
                'id' => 29,
                'name' => 'Leadership Development',
                'slug' => 'leadership-development',
                'color' => '#FF6633'
            ],
            [
                'id' => 30,
                'name' => 'UX Design',
                'slug' => 'ux-design',
                'color' => '#FFCC33'
            ],
            [
                'id' => 31,
                'name' => 'Healthcare Management',
                'slug' => 'healthcare-management',
                'color' => '#3399FF'
            ],
            [
                'id' => 32,
                'name' => 'E-commerce',
                'slug' => 'e-commerce',
                'color' => '#99FF33'
            ],
            [
                'id' => 33,
                'name' => 'Video Production',
                'slug' => 'video-production',
                'color' => '#FF9933'
            ],
            [
                'id' => 34,
                'name' => 'Logistics',
                'slug' => 'logistics',
                'color' => '#33FF99'
            ],
            [
                'id' => 35,
                'name' => 'Market Research',
                'slug' => 'market-research',
                'color' => '#9933FF'
            ],
            [
                'id' => 36,
                'name' => 'Quality Assurance',
                'slug' => 'quality-assurance',
                'color' => '#FF3399'
            ],
            [
                'id' => 37,
                'name' => 'Photography',
                'slug' => 'photography',
                'color' => '#33FFCC'
            ],
            [
                'id' => 38,
                'name' => 'Supply Chain',
                'slug' => 'supply-chain',
                'color' => '#CC33FF'
            ],
            [
                'id' => 39,
                'name' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'color' => '#33FF33'
            ],
            [
                'id' => 40,
                'name' => 'Event Management',
                'slug' => 'event-management',
                'color' => '#FF33FF'
            ],
            [
                'id' => 41,
                'name' => 'Legal Research',
                'slug' => 'legal-research',
                'color' => '#33CCFF'
            ],
            [
                'id' => 42,
                'name' => 'Digital Strategy',
                'slug' => 'digital-strategy',
                'color' => '#FF33CC'
            ],
            [
                'id' => 43,
                'name' => 'Content Marketing',
                'slug' => 'content-marketing',
                'color' => '#66FF33'
            ],
            [
                'id' => 44,
                'name' => 'Fashion Design',
                'slug' => 'fashion-design',
                'color' => '#33FF66'
            ],
            [
                'id' => 45,
                'name' => 'Interior Design',
                'slug' => 'interior-design',
                'color' => '#6633FF'
            ],
            [
                'id' => 46,
                'name' => 'Public Relations',
                'slug' => 'public-relations',
                'color' => '#FF6633'
            ],
            [
                'id' => 47,
                'name' => 'Investment Management',
                'slug' => 'investment-management',
                'color' => '#FFCC33'
            ],
            [
                'id' => 48,
                'name' => 'Fitness Training',
                'slug' => 'fitness-training',
                'color' => '#3399FF'
            ],
            [
                'id' => 49,
                'name' => 'Database Administration',
                'slug' => 'database-administration',
                'color' => '#99FF33'
            ],
            [
                'id' => 50,
                'name' => 'Legal Compliance',
                'slug' => 'legal-compliance',
                'color' => '#FF9933'
            ],
            [
                'id' => 51,
                'name' => 'Business Analysis',
                'slug' => 'business-analysis',
                'color' => '#33FF99'
            ],
            [
                'id' => 52,
                'name' => 'Business Development',
                'slug' => 'business-development',
                'color' => '#9933FF'
            ],
            [
                'id' => 53,
                'name' => 'Business Strategy',
                'slug' => 'business-strategy',
                'color' => '#FF3399'
            ],
            [
                'id' => 54,
                'name' => 'Business Intelligence',
                'slug' => 'business-intelligence',
                'color' => '#33FFCC'
            ],
            [
                'id' => 55,
                'name' => 'Business Management',
                'slug' => 'business-management',
                'color' => '#CC33FF'
            ],
            [
                'id' => 56,
                'name' => 'Business Planning',
                'slug' => 'business-planning',
                'color' => '#33FF33'
            ],
            [
                'id' => 57,
                'name' => 'Business Process',
                'slug' => 'business-process',
                'color' => '#FF33FF'
            ],
            [
                'id' => 58,
                'name' => 'Business Services',
                'slug' => 'business-services',
                'color' => '#33CCFF'
            ],
            [
                'id' => 59,
                'name' => 'Business Software',
                'slug' => 'business-software',
                'color' => '#FF33CC'
            ],
            [
                'id' => 60,
                'name' => 'Business Strategy',
                'slug' => 'business-strategy',
                'color' => '#66FF33'
            ]
        ];

        foreach ($tags as $tag) {
            Tag::factory()->create($tag);
        }
    }
}
