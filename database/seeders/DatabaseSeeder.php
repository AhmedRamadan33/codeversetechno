<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $password = Str::random(12);

        User::updateOrCreate(
            ['email' => 'ahmed.ramadan.abdelaaty5@gmail.com'],
            ['name' => 'Ahmed Ramadan', 'password' => $password]
        );

        $this->command->warn("Admin login -> email: ahmed.ramadan.abdelaaty5@gmail.com | password: {$password}");

        Company::updateOrCreate(['id' => 1], [
            'name' => 'CodeVerse',
            'industry' => 'Software Development & Digital Solutions',
            'tagline' => 'We design and build scalable, secure, and high-performance web applications.',
            'about' => "CodeVerse is a software development company specializing in Laravel, PHP, and MySQL, with a proven track record of building scalable, secure, and high-performance web applications. We design and develop RESTful APIs, integrate third-party services, optimize database performance, and implement secure authentication, authorization, and Role-Based Access Control (RBAC) for our clients. Our team follows MVC architecture, Object-Oriented Programming (OOP), and modern software design principles, with hands-on experience in real-time applications using Pusher and Livewire. We are passionate about writing clean, maintainable code, solving complex technical challenges, and delivering reliable, production-ready backend solutions.",
            'mission' => 'To help businesses grow by building reliable, scalable, and secure software tailored to their needs.',
            'vision' => 'To be a trusted technology partner known for engineering excellence and long-term client relationships.',
            'founded_year' => 2020,
            'email' => 'info@codeversetechno.com',
            'phone' => '+20 150 561 1560',
            'location' => 'Zagazig, Egypt',
            'github_url' => 'https://github.com/AhmedRamadan33?tab=repositories',
            'linkedin_url' => 'https://www.linkedin.com/in/ahmed-ramadan-9565011a2/',
            'whatsapp_url' => 'https://wa.me/+201505611560',
        ]);

        $skills = [
            ['name' => 'PHP', 'category' => 'backend', 'level' => 100],
            ['name' => 'Laravel', 'category' => 'backend', 'level' => 100],
            ['name' => 'MySQL', 'category' => 'database', 'level' => 100],
            ['name' => 'REST APIs', 'category' => 'backend', 'level' => 100],
            ['name' => 'JavaScript', 'category' => 'frontend', 'level' => 95],
            ['name' => 'Tailwind CSS', 'category' => 'frontend', 'level' => 95],
            ['name' => 'Bootstrap', 'category' => 'frontend', 'level' => 100],
            ['name' => 'Git', 'category' => 'tools', 'level' => 95],
        ];
        foreach ($skills as $i => $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill + ['order' => $i]);
        }

        $projects = [
            [
                'title' => 'ERP System',
                'industry' => 'Enterprise & Business',
                'description' => 'A large-scale Enterprise Resource Planning (ERP) solution supporting end-to-end business operations across finance, accounting, inventory, procurement, sales, CRM, HR, payroll, POS, and business analytics. Financial workflows include invoicing, payments, expenses, journal entries, tax management, and reporting. Inventory and supply chain modules cover warehouses, stock movements, purchasing, suppliers, and order processing, with configurable RBAC-driven workflows and integrated third-party services.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST API', 'Bootstrap'],
                'github_url' => 'https://github.com/AhmedRamadan33/erp.codeverse',
                'live_url' => 'https://erp.codeversetechno.com/',
                'featured' => true,
                'order' => 0,
            ],
            [
                'title' => 'Edvora LMS',
                'industry' => 'Education',
                'description' => 'A full-featured e-learning platform with course management, enrollments, exams, certificates, progress tracking, and role-based access control. Integrated with multiple payment gateways (Stripe, Paymob, PayTabs, PayPal, Fawry), VdoCipher for secure video streaming, and Zoom/Google Meet for live classes, alongside notifications, student–instructor chat, and RESTful APIs.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST API', 'Bootstrap'],
                'github_url' => 'https://github.com/AhmedRamadan33/edvora-lms',
                'live_url' => 'https://edvora.codeversetechno.com/',
                'featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'TimeDoc EG – Clinic Management System',
                'industry' => 'Healthcare',
                'description' => 'A comprehensive clinic management platform with bilingual Arabic/English support and role-based access control. Modules cover patient management, appointments, visits, doctors, schedules, medical records, invoices/payments, and diagnostic tests. Built with service/repository-based business logic, role-specific dashboards, appointment collision validation, and RESTful APIs using Laravel Sanctum.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST API', 'Bootstrap'],
                'github_url' => 'https://github.com/AhmedRamadan33/timedoc-eg',
                'live_url' => 'https://timedoc-eg.codeversetechno.com',
                'featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'LexOffice – Legal Office Management System',
                'industry' => 'Legal',
                'description' => 'A multi-branch legal management platform with role-based access control and Arabic/English localization. Modules cover clients, cases, sessions, courts, tasks, invoices/payments, expenses, documents, and activity logging, including a client portal and CMS for firm content management with branch-based data scoping.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST API', 'Bootstrap'],
                'github_url' => 'https://github.com/AhmedRamadan33/lexOffice',
                'live_url' => 'https://lexoffice.codeversetechno.com/',
                'featured' => true,
                'order' => 3,
            ],
        ];
        foreach ($projects as $project) {
            Project::updateOrCreate(['title' => $project['title']], $project);
        }

        $testimonials = [
            [
                'client_name' => 'Ahmed Mostafa',
                'rating' => 5,
                'quote' => 'CodeVerse helped us turn our idea into a complete web platform. The team understood our requirements quickly and delivered a clean, reliable solution.',
            ],
            [
                'client_name' => 'Omar Hassan',
                'rating' => 5,
                'quote' => 'We needed a custom management system for our business, and CodeVerse built exactly what we needed. Communication was clear and the support after delivery was excellent.',
            ],
            [
                'client_name' => 'Mahmoud Adel',
                'rating' => 5,
                'quote' => 'Very professional team. They were flexible when our requirements changed and always focused on finding practical solutions instead of overcomplicating the project.',
            ],
            [
                'client_name' => 'Youssef Samir',
                'rating' => 4,
                'quote' => 'CodeVerse developed our appointment and management platform and made a big difference in how we handle our daily operations. The system is simple and easy for our team to use.',
            ],
            [
                'client_name' => 'Mariam Khaled',
                'rating' => 5,
                'quote' => 'The team did a great job building our learning platform. They were responsive throughout the project and paid close attention to the details we requested.',
            ],
            [
                'client_name' => 'Karim Nabil',
                'rating' => 5,
                'quote' => 'We worked with CodeVerse on our e-commerce platform. The development process was organized, and the final result gave us a much better experience for both customers and staff.',
            ],
            [
                'client_name' => 'Hassan Ibrahim',
                'rating' => 4,
                'quote' => 'A reliable development team with strong technical skills. They helped us automate several manual processes and built the system around the way our business actually works.',
            ],
            [
                'client_name' => 'Sara Mohamed',
                'rating' => 5,
                'quote' => 'From the first discussion to the final delivery, the team was easy to work with. They took our requirements seriously and delivered a modern solution that fits our business.',
            ],
        ];

        foreach ($testimonials as $i => $testimonial) {
            Testimonial::updateOrCreate(
                [
                    'client_name' => $testimonial['client_name'],
                ],
                $testimonial + ['order' => $i]
            );
        }
    }
}
