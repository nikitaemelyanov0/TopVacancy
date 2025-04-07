<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['category_name' => 'Неполный день', 'category_type' => 'Подработка'],
            ['category_name' => 'От 4 часов в день', 'category_type' => 'Подработка'],
            ['category_name' => 'По вечерам', 'category_type' => 'Подработка'],
            ['category_name' => 'По выходным', 'category_type' => 'Подработка'],
            ['category_name' => 'Разовое задание', 'category_type' => 'Подработка'],
            ['category_name' => 'Полная занятость', 'category_type' => 'Подработка'],
            ['category_name' => 'Медицина, фармацевтика', 'category_type' => 'Отрасль'],
            ['category_name' => 'Наука, образование', 'category_type' => 'Отрасль'],
            ['category_name' => 'Продажи, обслуживание клиентов', 'category_type' => 'Отрасль'],
            ['category_name' => 'Производство, сервисное обслуживание', 'category_type' => 'Отрасль'],
            ['category_name' => 'Рабочий персонал', 'category_type' => 'Отрасль'],
            ['category_name' => 'Розничная торговля', 'category_type' => 'Отрасль'],
            ['category_name' => 'Сельское хозяйство', 'category_type' => 'Отрасль'],
            ['category_name' => 'Спортивные клубы, фитнес, салоны красоты', 'category_type' => 'Отрасль'],
            ['category_name' => 'Стратегия, инвестиции, консалтинг', 'category_type' => 'Отрасль'],
            ['category_name' => 'Автомобильный бизнес', 'category_type' => 'Отрасль'],
            ['category_name' => 'Административный персонал', 'category_type' => 'Отрасль'],
            ['category_name' => 'Безопасность', 'category_type' => 'Отрасль'],
            ['category_name' => 'Высший и средний менеджмент', 'category_type' => 'Отрасль'],
            ['category_name' => 'Добыча сырья', 'category_type' => 'Отрасль'],
            ['category_name' => 'Домашний, обслуживающий персонал', 'category_type' => 'Отрасль'],
            ['category_name' => 'Закупки', 'category_type' => 'Отрасль'],
            ['category_name' => 'Информационные технологии', 'category_type' => 'Отрасль'],
            ['category_name' => 'Искусство, развлечения, массмедиа', 'category_type' => 'Отрасль'],
            ['category_name' => 'Маркетинг, реклама, PR', 'category_type' => 'Отрасль'],
            ['category_name' => 'Страхование', 'category_type' => 'Отрасль'],
            ['category_name' => 'Строительство, недвижимость', 'category_type' => 'Отрасль'],
            ['category_name' => 'Транспорт, логистика, перевозки', 'category_type' => 'Отрасль'],
            ['category_name' => 'Туризм, гостиницы, рестораны', 'category_type' => 'Отрасль'],
            ['category_name' => 'Управление персоналом, тренинги', 'category_type' => 'Отрасль'],
            ['category_name' => 'Финансы, бухгалтерия', 'category_type' => 'Отрасль'],
            ['category_name' => 'Юристы', 'category_type' => 'Отрасль'],
            ['category_name' => 'Не требуется или не указано', 'category_type' => 'Образование'],
            ['category_name' => 'Среднее', 'category_type' => 'Образование'],
            ['category_name' => 'Среднее профессиональное', 'category_type' => 'Образование'],
            ['category_name' => 'Высшее', 'category_type' => 'Образование'],
            ['category_name' => 'Без опыта или не имеет значения', 'category_type' => 'Опыт работы'],
            ['category_name' => 'От 1 до 3 лет', 'category_type' => 'Опыт работы'],
            ['category_name' => 'От 3 до 6 лет', 'category_type' => 'Опыт работы'],
            ['category_name' => 'Более 6 лет', 'category_type' => 'Опыт работы'],
            ['category_name' => 'На месте работодателя', 'category_type' => 'Формат работы'],
            ['category_name' => 'Удаленно', 'category_type' => 'Формат работы'],
            ['category_name' => 'Гибрид', 'category_type' => 'Формат работы'],
            ['category_name' => 'Разъездной', 'category_type' => 'Формат работы'],
            ['category_name' => 'Работа вахтой', 'category_type' => 'График работы'],
            ['category_name' => '1 через 3', 'category_type' => 'График работы'],
            ['category_name' => '2 через 2', 'category_type' => 'График работы'],
            ['category_name' => '1 через 1', 'category_type' => 'График работы'],
            ['category_name' => '1 через 2', 'category_type' => 'График работы'],
            ['category_name' => '1 через 4', 'category_type' => 'График работы'],
            ['category_name' => '5 через 2', 'category_type' => 'График работы'],
            ['category_name' => 'Неполный рабочий день', 'category_type' => 'График работы'],
            ['category_name' => 'Сменный график', 'category_type' => 'График работы']
        ];

        foreach ($categories as $data) {
            Category::create($data);
        }
    }
}