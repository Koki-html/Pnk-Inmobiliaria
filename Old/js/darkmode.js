
const html = document.documentElement;
const darkmode = document.getElementById("Dark-Mode");
const currentTheme = localStorage.getItem('theme');


const setTheme = theme => {
    html.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
    updateIconVisibility(theme);
};

const updateIconVisibility = theme => {
    const darkIcon = document.getElementById('Dark-Mode-Icon');
    const lightIcon = document.getElementById('Light-Mode-Icon');

    if (darkIcon && lightIcon) {
        if (theme === 'light') {
            darkIcon.style.opacity = '1';
            darkIcon.style.pointerEvents = 'auto';
            darkIcon.style.display = 'block';
            lightIcon.style.opacity = '0';
            lightIcon.style.pointerEvents = 'none';
            lightIcon.style.display = 'none';
        } else {
            darkIcon.style.opacity = '0';
            darkIcon.style.pointerEvents = 'none';
            darkIcon.style.display = 'none';
            lightIcon.style.opacity = '1';
            lightIcon.style.pointerEvents = 'auto';
            lightIcon.style.display = 'block';
        }
    }
};

const savedTheme = localStorage.getItem('theme');

if (savedTheme) {
    setTheme(savedTheme);
} else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    setTheme('dark');
} else {
    setTheme('light');
}

darkmode.addEventListener('click', () => {
    const current = html.getAttribute('data-theme');
    const newTheme = current === 'dark' ? 'light' : 'dark';
    setTheme(newTheme);
});