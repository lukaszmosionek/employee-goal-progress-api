# 🎯 Employee Goal Progress API

API do rejestrowania postępu realizacji celów pracowników. Projekt zbudowany w Laravel 10/11.

---

## 📦 Wymagania

- PHP 8.1+
- Composer
- Laravel 10/11
- SQLite / MySQL (do wyboru)

---

## ⚙️ Instalacja

```bash
git clone https://github.com/lukaszmosionek/employee-goal-progress-api.git
cd employee-goal-progress-api

composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

## ✅ Testy
```bash
php artisan test
```

## ▶️ Endpoint API

POST /api/progress

🔸 Example Body JSON
{
  "employee_id": 1,
  "goal_id": 2,
  "progress": 85
}

