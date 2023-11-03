<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $category = Category::factory(10)->create();

        $categories = [
            [
                'id' => 1,
                'title' => 'Technology',
                'slug' => 'technology',
                'description' => 'Jobs related to the technology industry'
            ],
            [
                'id' => 2,
                'title' => 'Healthcare',
                'slug' => 'healthcare',
                'description' => 'Jobs in the healthcare and medical sector'
            ],
            [
                'id' => 3,
                'title' => 'Finance',
                'slug' => 'finance',
                'description' => 'Jobs in banking, finance, and accounting'
            ],
            [
                'id' => 4,
                'title' => 'Education',
                'slug' => 'education',
                'description' => 'Jobs in teaching and educational services'
            ],
            [
                'id' => 5,
                'title' => 'Hospitality',
                'slug' => 'hospitality',
                'description' => 'Jobs in the hospitality and service industry'
            ],
            [
                'id' => 6,
                'title' => 'Engineering',
                'slug' => 'engineering',
                'description' => 'Jobs in various fields of engineering'
            ],
            [
                'id' => 7,
                'title' => 'Retail',
                'description' => 'Jobs in retail and sales'
            ],
            [
                'id' => 8,
                'title' => 'Marketing',
                'slug' => 'marketing',
                'description' => 'Jobs in marketing and advertising'
            ],
            [
                'id' => 9,
                'title' => 'Human Resources',
                'slug' => 'human-resources',
                'description' => 'Jobs in HR and personnel management'
            ],
            [
                'id' => 10,
                'title' => 'Arts and Design',
                'slug' => 'arts-and-design',
                'description' => 'Jobs in the creative and design industry'
            ],
            [
                'id' => 11,
                'title' => 'Automotive',
                'slug' => 'automotive',
                'description' => 'Jobs in the automotive and transportation sector'
            ],
            [
                'id' => 12,
                'title' => 'Construction',
                'slug' => 'construction',
                'description' => 'Jobs in the construction and building industry'
            ],
            [
                'id' => 13,
                'title' => 'Telecommunications',
                'slug' => 'telecommunications',
                'description' => 'Jobs in the telecommunications sector'
            ],
            [
                'id' => 14,
                'title' => 'Legal',
                'slug' => 'legal',
                'description' => 'Jobs in the legal and law services'
            ],
            [
                'id' => 15,
                'title' => 'Science',
                'slug' => 'science',
                'description' => 'Jobs in scientific research and development'
            ],
            [
                'id' => 16,
                'title' => 'Agriculture',
                'slug' => 'agriculture',
                'description' => 'Jobs related to agriculture and farming'
            ],
            [
                'id' => 17,
                'title' => 'Media',
                'slug' => 'media',
                'description' => 'Jobs in the media and entertainment industry'
            ],
            [
                'id' => 18,
                'title' => 'Sports and Recreation',
                'slug' => 'sports-and-recreation',
                'description' => 'Jobs in sports and recreational activities'
            ],
            [
                'id' => 19,
                'title' => 'Customer Service',
                'slug' => 'customer-service',
                'description' => 'Jobs in customer support and service'
            ],
            [
                'id' => 20,
                'title' => 'Pharmaceutical',
                'slug' => 'pharmaceutical',
                'description' => 'Jobs in the pharmaceutical and healthcare industry'
            ],
            [
                'id' => 21,
                'title' => 'Environmental',
                'slug' => 'environmental',
                'description' => 'Jobs related to environmental sustainability'
            ],
            [
                'id' => 22,
                'title' => 'Logistics',
                'slug' => 'logistics',
                'description' => 'Jobs in logistics and supply chain management'
            ],
            [
                'id' => 23,
                'title' => 'Aviation',
                'slug' => 'aviation',
                'description' => 'Jobs in the aviation and aerospace industry'
            ],
            [
                'id' => 24,
                'title' => 'Tourism',
                'slug' => 'tourism',
                'description' => 'Jobs in the tourism and travel sector'
            ],
            [
                'id' => 25,
                'title' => 'Architecture',
                'slug' => 'architecture',
                'description' => 'Jobs in architecture and urban design'
            ],
            [
                'id' => 26,
                'title' => 'Fashion',
                'slug' => 'fashion',
                'description' => 'Jobs in the fashion and clothing industry'
            ],
            [
                'id' => 27,
                'title' => 'Mining',
                'slug' => 'mining',
                'description' => 'Jobs in mining and resource extraction'
            ],
            [
                'id' => 28,
                'title' => 'Dental',
                'slug' => 'dental',
                'description' => 'Jobs in the dental and oral healthcare sector'
            ],
            [
                'id' => 29,
                'title' => 'Pet Care',
                'slug' => 'pet-care',
                'description' => 'Jobs in pet care and veterinary services'
            ],
            [
                'id' => 30,
                'title' => 'Real Estate',
                'slug' => 'real-estate',
                'description' => 'Jobs in real estate and property management'
            ],
            [
                'id' => 31,
                'title' => 'Insurance',
                'slug' => 'insurance',
                'description' => 'Jobs in the insurance and risk management industry'
            ],
            [
                'id' => 32,
                'title' => 'Waste Management',
                'slug' => 'waste-management',
                'description' => 'Jobs in waste management and recycling'
            ],
            [
                'id' => 33,
                'title' => 'Electricity and Power',
                'slug' => 'electricity-and-power',
                'description' => 'Jobs in the electricity and power generation sector'
            ],
            [
                'id' => 34,
                'title' => 'Childcare',
                'slug' => 'childcare',
                'description' => 'Jobs in childcare and early childhood education'
            ],
            [
                'id' => 35,
                'title' => 'Landscape Architecture',
                'slug' => 'landscape-architecture',
                'description' => 'Jobs in landscape design and architecture'
            ],
            [
                'id' => 36,
                'title' => 'Renewable Energy',
                'slug' => 'renewable-energy',
                'description' => 'Jobs in renewable energy and sustainability'
            ],
            [
                'id' => 37,
                'title' => 'Shipping',
                'slug' => 'shipping',
                'description' => 'Jobs in the shipping and maritime industry'
            ],
            [
                'id' => 38,
                'title' => 'Veterinary',
                'slug' => 'veterinary',
                'description' => 'Jobs in veterinary medicine and animal care'
            ],
            [
                'id' => 39,
                'title' => 'Emergency Services',
                'slug' => 'emergency-services',
                'description' => 'Jobs in emergency response and public safety'
            ],
            [
                'id' => 40,
                'title' => 'Social Work',
                'slug' => 'social-work',
                'description' => 'Jobs in social work and community services'
            ],
            [
                'id' => 41,
                'title' => 'Consulting',
                'slug' => 'consulting',
                'description' => 'Jobs in consulting and advisory services'
            ],
            [
                'id' => 42,
                'title' => 'Fitness',
                'slug' => 'fitness',
                'description' => 'Jobs in fitness training and physical wellness'
            ],
            [
                'id' => 43,
                'title' => 'Biotechnology',
                'slug' => 'biotechnology',
                'description' => 'Jobs in the biotechnology and life sciences field'
            ],
            [
                'id' => 44,
                'title' => 'Telecommuting',
                'slug' => 'telecommuting',
                'description' => 'Remote work opportunities across various industries'
            ],
            [
                'id' => 45,
                'title' => 'Government',
                'slug' => 'government',
                'description' => 'Jobs in government and public administration'
            ],
            [
                'id' => 46,
                'title' => 'Nonprofit',
                'slug' => 'nonprofit',
                'description' => 'Jobs in nonprofit and charitable organizations'
            ],
            [
                'id' => 47,
                'title' => 'Chemical Engineering',
                'slug' => 'chemical-engineering',
                'description' => 'Jobs in chemical engineering and related fields'
            ],
            [
                'id' => 48,
                'title' => 'Forestry',
                'slug' => 'forestry',
                'description' => 'Jobs related to forestry and natural resources management'
            ],
            [
                'id' => 49,
                'title' => 'Robotics',
                'slug' => 'robotics',
                'description' => 'Jobs in robotics and automation technology'
            ],
            [
                'id' => 50,
                'title' => 'Music and Performing Arts',
                'slug' => 'music-and-performing-arts',
                'description' => 'Jobs in music, theater, and performing arts'
            ],
        ];

        foreach ($categories as $category) {
            Category::factory()->create($category);
        }
    }
}
