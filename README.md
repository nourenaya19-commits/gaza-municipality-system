# نظام إدارة مخازن البلدية - Warehouse Management System

نظام متكامل لإدارة أصناف المخزن، تم تطويره باستخدام إطار العمل Laravel.

## الميزات الرئيسية:
- **إدارة كاملة (CRUD):** إضافة، عرض، تعديل، وحذف الأصناف بسهولة.
- **الأمن والحماية:** نظام مصادقة (Authentication) مدمج يمنع الوصول غير المصرح به.
- **تنظيم البيانات:** تصنيف الأصناف (Categories) والوحدات (Units) مع روابط علاقات (Relationships).
- **أداء عالٍ:** استخدام Pagination لتصفح فعال للبيانات.
- **تنبيهات ذكية:** نظام عرض للرسائل عند تنفيذ العمليات بنجاح.

## التقنيات المستخدمة:
- Laravel Framework
- Tailwind CSS
- MySQL Database
- Git/GitHub

  🚀 دليل تشغيل المشروع:
  composer install
  npm install
  cp .env.example .env
  php artisan key:generate
  php artisan migrate --seed
  php artisan storage:link
  php artisan serve
  
