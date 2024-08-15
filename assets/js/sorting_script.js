const products = [{},
    {
        name: 'Personalized Mug',
        price: 250,
        date: '2023-03-15',
        sales: 300,
        image: 'assets/images/product-img2.jpg'
    },
    {
        name: 'Photo Frame',
        price: 2096,
        date: '2023-01-10',
        sales: 150,
        image: 'assets/images/product-img5.jpg',
        id: ""
    },
    {
        name: 'Wedding Caricature',
        price: 750,
        date: '2023-02-05',
        sales: 200,
        image: 'assets/images/product-img3.jpg'
    },
    {
        name: 'LED Pillow (Heart Shape)',
        price: 750,
        date: '2023-04-01',
        sales: 100,
        image: 'assets/images/product-img4.jpg'
    },
    {
        name: 'Moon Frame',
        price: 800,
        date: '2023-05-10',
        sales: 250,
        image: 'assets/images/product-img1.jpg'
    },
    {
        name: 'Heart Clock',
        price: 1000,
        date: '2023-06-20',
        sales: 350,
        image: 'assets/images/product-img6.jpg'
    },
    {
        name: 'Polyester T-Shirt',
        price: 450,
        date: '2023-06-02',
        sales: 50,
        image: 'assets/images/product-img7.jpg'
    },
    {
        name: 'Digtal Clock',
        price: 500,
        date: '2023-06-12',
        sales: 500,
        image: 'assets/images/product-img8.jpg'
    },
    {
        name: 'Couple Lamp',
        price: 1000,
        date: '2023-04-02',
        sales: 340,
        image: 'assets/images/product-img9.jpg'
    },
    {
        name: 'Mosaic Frame',
        price: 600,
        date: '2022-04-02',
        sales: 400,
        image: 'assets/images/product-img10.jpg'
    }
];

const renderProducts = (sortedProducts) => {
    const container = document.querySelector('.pro-list');
    container.innerHTML = '';
    sortedProducts.forEach(product => {
        if(!product.name) return;
        const productElement = document.createElement('div');
        productElement.classList.add('product-container');
        productElement.innerHTML = `<div class="product">
                <a href="product" data-prod-id="${product.id}" data-cate-id="${product.category_id}"><img src="${product.image}" alt="${product.name}"></a>
                <div class="features">
                    <h5>${product.name}</h5>
                    <div class="star">
                        <span class="star-icon">&#9733;</span>
                        <span class="star-icon">&#9733;</span>
                        <span class="star-icon">&#9733;</span>
                        <span class="star-icon">&#9733;</span>
                        <span class="star-icon">&#9733;</span>
                    </div>
                    <h4 class="price" data-price="${product.price}">${product.price}</h4>
                </div>
            </div>`;
        container.appendChild(productElement);
    });
};

document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const sortType = urlParams.get('sort');

    if (sortType) {
        let sortedProducts = [...products];

        switch (sortType) {
            case 'best-selling':
                sortedProducts.sort((a, b) => b.sales - a.sales);
                break;
            case 'alphabetical-asc':
                sortedProducts.sort((a, b) => a.name.localeCompare(b.name));
                break;
            case 'alphabetical-desc':
                sortedProducts.sort((a, b) => b.name.localeCompare(a.name));
                break;
            case 'price-low-high':
                sortedProducts.sort((a, b) => a.price - b.price);
                break;
            case 'price-high-low':
                sortedProducts.sort((a, b) => b.price - a.price);
                break;
            case 'date-old-new':
                sortedProducts.sort((a, b) => new Date(a.date) - new Date(b.date));
                break;
            case 'date-new-old':
                sortedProducts.sort((a, b) => new Date(b.date) - new Date(a.date));
                break;
            default:
                break;
        }
        renderProducts(sortedProducts);
    } else {
        // renderProducts(products);
    }

    document.addEventListener('click', (event) => {
        if (!searchIcon.contains(event.target) && !searchInput.contains(event.target)) {
            searchInput.classList.remove('show'); // Hide the input if clicked outside
        }
    });


    // Search bar functionality
    let searchTimerLoop = 0,
        searchTimer = setInterval(() => {
            if (document.getElementById('search-icon')) {
                const searchIcon = document.getElementById('search-icon');
                const searchInput = document.getElementById('search-input');

                searchIcon.addEventListener('click', () => {
                    searchInput.classList.toggle('show');
                    if (searchInput.classList.contains('show')) {
                        searchInput.focus(); // Automatically focus the input when shown
                    }
                });

                searchInput.addEventListener('input', () => {
                    const query = searchInput.value.toLowerCase();
                    const products = document.querySelectorAll('.product-container');

                    products.forEach(product => {
                        const productName = product.querySelector('.features h5').textContent.toLowerCase();
                        if (productName.includes(query)) {
                            product.style.display = 'block';
                        } else {
                            product.style.display = 'none';
                        }
                    });
                });
                clearInterval(searchTimer)
            } else {
                searchTimerLoop++;
                if (searchTimerLoop == 50) clearInterval(searchTimer)
            }
        }, 500);
});