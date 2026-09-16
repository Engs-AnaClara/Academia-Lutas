# Sistema de Gerenciamento de Academia de Lutas

## Integrantes
- Ana Clara Cubas
- Samara Almeida Ferreira

## Descrição
Sistema web para gerenciar alunos e modalidades de uma academia de lutas,
com controle de acesso por papéis (admin, instrutor, aluno).

## Tecnologias
- Laravel 11
- PHP 8.2+
- PostgreSQL (Neon)
- Blade
- Laravel Breeze

## Instalação
\`\`\`bash
composer install
npm install
cp .env.example .env
php artisan key:generate
# configurar .env com DB_CONNECTION=pgsql e DB_URL do seu banco Neon
php artisan migrate:fresh --seed
npm run build
\`\`\`

## Execução
\`\`\`bash
php artisan serve
\`\`\`
Acesse http://127.0.0.1:8000
