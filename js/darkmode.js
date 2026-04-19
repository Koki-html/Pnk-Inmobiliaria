
const html= document.documentElement;
const darkmode = document.getElementById("Dark-Mode");
const currentTheme = localStorage.getItem('theme');


const setTheme = theme => {
    html.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
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