function switchMainBarVisibility() {
    const sideNav = document.getElementById("sideNav");
    if (sideNav.classList.contains("open")) {
        sideNav.classList.remove("open");
    } else {
        sideNav.classList.add("open");
    }
}

function showSearchInputMobile() {
    const searchBox = document.getElementById('mobileSearchBox');
    if (searchBox.style.display === 'none' || searchBox.style.display === '') {
        searchBox.style.display = 'block';
    } else {
        searchBox.style.display = 'none';
    }
}

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
            target.classList.add('blurEffect');
            setTimeout(() => {
                target.classList.remove('blurEffect');
            }, 400);
        }
    });
});

document.getElementById('resultSearch').addEventListener('input', function () {
    const searchValue = this.value.toLowerCase();
    const filteredProducts = products.filter(product => {
        return product.name.toLowerCase().includes(searchValue)
    });

    const container = document.getElementById('searchResults');
    container.innerHTML = filteredProducts.map(product => {
        return `<div>${product.name}</div><div>${product.description}</div>`;
    }).join('');
    
});

var myCarousel = document.querySelector('#carouselExampleDark');
var carousel = new bootstrap.Carousel(myCarousel, {
    interval: 5000,
    ride:'carousel'
});