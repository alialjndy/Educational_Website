document.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('.nav-link');

    links.forEach(link => {
        link.addEventListener('click', (event) => {
            // إزالة الصنف 'active' من جميع الروابط
            links.forEach(l => l.classList.remove(active));

            // إضافة الصنف 'active' للرابط الذي تم النقر عليه
            link.classList.add(active);
        });
    });
});
//
//
//
document.getElementById('hamburgerButton').addEventListener('click', function() {
    const menu = document.getElementById('menu');
    const hamburger = this;

    // تبديل حالة القائمة بين العرض والاختفاء
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';

    // تبديل حالة الزر
    hamburger.classList.toggle('active');
});
