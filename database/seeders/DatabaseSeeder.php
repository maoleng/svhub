<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\JobType;
use App\Enums\PostCategory;
use App\Enums\PostTag;
use App\Enums\UserRole;
use App\Models\Company;
use App\Models\Course;
use App\Models\Job;
use App\Models\Lecture;
use App\Models\Post;
use App\Models\Question;
use App\Models\User;
use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    private Generator $faker;

    public function __construct()
    {
        $this->faker = Faker::create('vi_VN');
    }

    public function run(): void
    {
        $this->createUsers(20);
        $this->createCourses(50);
        $this->createLectures();
        $this->createQuestions();
        $this->createPosts(1);
        $this->createCompanies();
        $this->createJobs(50);
    }

    public function createJobs($count)
    {
        $company_ids = Company::query()->inRandomOrder()->get()->pluck('id')->toArray();
        $tech_tags = [
            'NodeJS', 'PHP', 'AWS', 'MySQL', 'Laravel', 'OOP', 'Software Architecture', 'Javascript', 'Java', 'Asp NET MVC',
        ];
        $finance_tags = [
            'Accounting/Auditing', 'General Accounting', 'Finance and Accounting', 'Tax', 'Accounting', 'Financial Reporting',
        ];

        $jobs = [];
        for ($i = 3; $i <= $count; $i++) {
            $title = $this->faker->jobTitle;
            $jobs[] = [
                'id' => Str::uuid(),
                'title' => $title,
                'slug' => Str::slug($title),
                'location' => 'District '.random_int(1, 10),
                'type' => JobType::getRandomValue(),
                'tags' => json_encode($this->faker->randomElements(random_int(0, 1) === 0 ? $tech_tags : $finance_tags, random_int(3, 5))),
                'salary' => random_int(10, 50) * 1000000,
                'description' => preg_replace('/<input.*">/U', '', $this->faker->randomHtml(10, 10)),
                'size' => '1000+',
                'country' => 'Viet Nam',
                'working_time' => 'Monday - Friday',
                'company_id' => $this->faker->randomElement($company_ids),
                'created_at' => $this->faker->dateTimeBetween('-1 year'),
            ];
        }

        Job::query()->insert($jobs);
    }

    public function createCompanies()
    {
        $companies = [
            [
                'name' => 'CHAILEASE',
                'avatar' => 'https://images.vietnamworks.com/logo/chailease_vip_111632.jpg',
            ],
            [
                'name' => 'TEK EXPERTS',
                'avatar' => 'https://images.vietnamworks.com/logo/tekex_vip1_101558.png',
            ],
            [
                'name' => 'NGÂN HÀNG TMCP BẮC Á',
                'avatar' => 'https://images.vietnamworks.com/logo/bacabank_vip1_117492.png',
            ],
            [
                'name' => 'TẬP ĐOÀN CITYLAND',
                'avatar' => 'https://images.vietnamworks.com/logo/cityland_vip_124712.png',
            ],
            [
                'name' => 'CAPGEMINI VIỆT NAM',
                'avatar' => 'https://images.vietnamworks.com/logo/capge_vip_124731.png',
            ],
        ];
        $companies = array_map(function ($company) {
            $company['id'] = Str::uuid();
            $company['created_at'] = $this->faker->dateTimeBetween('-1 year');
            return $company;
        }, $companies);

        Company::query()->insert($companies);
    }

    public function createPosts($count)
    {
        $user_ids = User::query()->inRandomOrder()->get()->pluck('id')->toArray();
        $posts = [];
        for ($i = 1; $i <= $count; $i++) {
            $title = $this->faker->sentence;
            $posts[] = [
                'id' => Str::uuid(),
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => preg_replace('/<input.*">/U', '', $this->faker->randomHtml(10, 10)),
                'user_id' => $this->faker->randomElement($user_ids),
                'category' => PostCategory::getRandomValue(),
                'tag' => PostTag::getRandomValue(),
                'created_at' => $this->faker->dateTimeBetween('-1 year'),
            ];
        }

        Post::query()->insert($posts);
    }

    public function createQuestions()
    {
        $user_ids = User::query()->where('role', UserRole::STUDENT)->get()->pluck('id')->toArray();
        $lecture_ids = Lecture::query()->get()->pluck('id')->toArray();

        $questions = [];
        foreach ($lecture_ids as $lecture_id) {
            foreach ($user_ids as $user_id) {
                $times = $this->faker->randomElement([0, 0, 0, 1, 1, 2, 3]);
                for ($i = 0; $i <= $times; $i++) {
                    $questions[] = [
                        'id' => Str::uuid(),
                        'content' => $this->faker->sentence(10),
                        'lecture_id' => $lecture_id,
                        'user_id' => $user_id,
                        'created_at' => now(),
                    ];
                }
            }
        }

        Question::query()->insert($questions);
    }

    private function createUsers($count): void
    {
        $users = [];
        for ($i = 3; $i <= $count; $i++) {
            $email = $this->faker->email;
            $users[] = [
                'id' => Str::uuid(),
                'name' => $this->faker->name(),
                'email' => $email,
                'password' => '$2y$10$y05/OqLoH0/1uQdbL2FhmeQHZXVDbbw/k45w0O49JhN69emKYuBTO',
                'avatar' => 'https://i.pinimg.com/736x/b7/03/e8/b703e86875fc4642fb4a40a30df868a4.jpg',
                'role' => random_int(1, 2),
                'token' => $email,
                'created_at' => $this->faker->dateTimeBetween('-2 years', '-1 year'),
            ];
        }
        User::query()->create([
            'name' => 'Admin',
            'email' => 'admin',
            'password' => '1234',
            'avatar' => 'https://media.istockphoto.com/id/160231072/photo/gold-crown.jpg?s=612x612&w=0&k=20&c=zHY9w7ujhZCg-uKTHEeLyFc6SZVXaolE9YCRY58FbTA=',
            'role' => UserRole::ADMIN,
            'token' => 'admin',
            'created_at' => now(),
        ]);
        User::query()->create([
            'name' => 'Teacher',
            'email' => 'teacher',
            'password' => '1234',
            'avatar' => 'https://media.istockphoto.com/id/160231072/photo/gold-crown.jpg?s=612x612&w=0&k=20&c=zHY9w7ujhZCg-uKTHEeLyFc6SZVXaolE9YCRY58FbTA=',
            'role' => UserRole::TEACHER,
            'token' => 'teacher',
            'created_at' => now(),
        ]);
        User::query()->create([
            'name' => 'Student',
            'email' => 'student',
            'password' => '1234',
            'avatar' => 'https://media.istockphoto.com/id/160231072/photo/gold-crown.jpg?s=612x612&w=0&k=20&c=zHY9w7ujhZCg-uKTHEeLyFc6SZVXaolE9YCRY58FbTA=',
            'role' => UserRole::STUDENT,
            'token' => 'student',
            'created_at' => now(),
        ]);
        User::query()->insert($users);
    }

    private function createCourses($count): void
    {
        $user_ids = User::query()->where('role', UserRole::TEACHER)->get()->pluck('id')->toArray();
        $courses = [];
        for ($i = 3; $i <= $count; $i++) {
            $name = $this->faker->sentence(8);
            $courses[] = [
                'id' => Str::uuid(),
                'name' => $name,
                'category' => $this->faker->randomElement(['IT', 'Specialized subjects', 'Business', 'Other', 'English', 'Other']),
                'slug' => Str::slug($name),
                'thumbnail' => $this->faker->imageUrl,
                'title' => $this->faker->sentence(12),
                'description' => $this->faker->sentence(300),
                'preview_video' => 'oFgg7K2tpfk',
                'duration' => random_int(15, 25).' hours',
                'price' => random_int(100, 500) * 1000,
                'user_id' => $this->faker->randomElement($user_ids),
                'is_verify' => true,
                'rating' => (float) (random_int(3, 4).'.'.random_int(1, 9)),
                'created_at' => $this->faker->dateTimeBetween('-2 years'),
            ];
        }
        $name_and_thumbnails = [
            'The Complete HTML & CSS Bootcamp 2023 Edition' => [
                'img' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-27-590x430.webp',
                'category' => 'IT',
            ],
            'English for Career Development' => [
                'img' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-32-590x430.webp',
                'category' => 'English',
            ],
            'The Complete Guide to Build RESTful API Application' => [
                'img' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-38-590x430.webp',
                'category' => 'IT',
            ],
            'Master of Business Administration (iMBA)' => [
                'img' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-30-590x430.webp',
                'category' => 'Business',
            ],
            'Foundations of Project Management' => [
                'img' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-39-590x430.webp',
                'category' => 'Business',
            ],
            'Learning How To Write As A Professional Author' => [
                'img' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-33-590x430.webp',
                'category' => 'Specialized subjects',
            ],
            'Educating Through Christ to Learn And to Serve' => [
                'img' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/01/course-02-2-590x430.webp',
                'category' => 'Specialized subjects',
            ],
            'Web Development Masterclass & Certifications' => [
                'img' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-37-590x430.webp',
                'category' => 'IT',
            ],
            'The Complete Python Bootcamp From Zero to Hero' => [
                'img' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-26-590x430.webp',
                'category' => 'IT',
            ],
            'Advanced Java Programming with Eclipse' => [
                'img' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-35-590x430.webp',
                'category' => 'IT',
            ],
            'Ultimate AWS Certified Cloud Practitioner – 2023' => [
                'img' => 'https://eduvibe.devsvibe.com/main/wp-content/uploads/2023/03/course-34-590x430.webp',
                'category' => 'IT',
            ],
        ];
        foreach ($name_and_thumbnails as $name => $data) {
            $courses[] = [
                'id' => Str::uuid(),
                'name' => $name,
                'category' => $data['category'],
                'slug' => Str::slug($name),
                'thumbnail' => $data['img'],
                'title' => $this->faker->sentence(12),
                'description' => $this->faker->sentence(300),
                'preview_video' => 'oFgg7K2tpfk',
                'duration' => random_int(15, 25).' hours',
                'price' => random_int(100, 500) * 1000,
                'user_id' => $this->faker->randomElement($user_ids),
                'is_verify' => true,
                'rating' => (float) (random_int(3, 4).'.'.random_int(1, 9)),
                'created_at' => now()->subMinutes(random_int(1, 10)),
            ];
        }
        Course::query()->insert($courses);
    }


    private function createLectures(): void
    {
        $course_ids = Course::query()->get()->pluck('id')->toArray();
        $lectures = [];
        foreach ($course_ids as $course_id) {
            $count_lectures = random_int(5, 12);
            for ($i = 1; $i <= $count_lectures; $i++) {
                $name = $this->faker->sentence(random_int(6, 8));
                $lectures[] = [
                    'id' => Str::uuid(),
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'document' => $this->faker->randomHtml(6),
                    'video' => 'wVboOz_O8rE',
                    'order' => $i,
                    'study_minutes' => random_int(20, 90),
                    'course_id' => $course_id,
                    'created_at' => $this->faker->dateTimeBetween('-2 years'),
                ];
            }
        }

        Lecture::query()->insert($lectures);
    }


}
