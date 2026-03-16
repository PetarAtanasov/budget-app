Installation

Clone the repository:

git clone <your-repo-url>
cd <your-repo-folder>

Install dependencies:

composer install
npm install

Copy .env file and generate app key:

cp .env.example .env
php artisan key:generate

Run database migrations:

php artisan migrate

Start development server:

npm run dev
php artisan serve
🖥️ Frontend Structure

Login.vue & Register.vue

Pastel, light-colored design (Login and Register share the same style)

Background: bg-blue-50 (light blue)

Rounded inputs and buttons (rounded-lg / rounded-xl)

Hover effects on buttons

Links for “Forgot your password?” and “Register”

Dashboard.vue

Consistent style with Login/Register

Light blue background bg-blue-50

Budget summary cards: Total Income, Total Expenses, Balance

“Add Transaction” button with hover effect

Placeholder for coin icon (yellow) instead of Laravel logo

Layouts / Navigation.vue

Removed default Laravel logo

Replaced with custom yellow coin icon

Navigation header shows logged-in user name and links to profile / logout

Responsive mobile menu included

🎨 Color Palette

Background: bg-blue-50 (#eff6ff)

Main text: text-gray-800

Buttons (Login / Register): bg-blue-400 hover:bg-blue-500

Cards:

Income: text-green-500

Expenses: text-red-500

Balance: text-blue-500

⚙️ Notes

Ensure no conflicting Tailwind classes override (.bg-blue-50) in custom CSS.

After CSS/JS changes, run npm run dev to recompile assets.

Uses Inertia.js + Vue 3 for a smooth SPA experience in Laravel.

📌 Next Steps

Add CRUD functionality for transactions

Filtering for Income / Expenses

Charts and visual budget summaries

Customizable themes (light / dark mode)