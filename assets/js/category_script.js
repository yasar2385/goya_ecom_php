document.addEventListener('DOMContentLoaded', function() {
    const hidBtn = document.querySelector('.hid-btn');
    const closeBtn = document.querySelector('.close-btn');
    const leftSection = document.querySelector('.left-side');
    const body = document.body;

    if (hidBtn) {
        hidBtn.addEventListener('click', function() {
            leftSection.classList.toggle('active');
            body.classList.toggle('active-left-side');
        });
    } else {
        console.error("Element with class 'hid-btn' not found.");
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            leftSection.classList.remove('active');
            body.classList.remove('active-left');
        });
    } else {
        console.error("Element with class 'close-btn' not found.");
    }


    const productContainer = document.querySelector('.pro-list');
    const sidebar = document.querySelector('.left-side');
    /*
    const fetchProducts = [
        fetch('inputs/categories.json')
        .then(response => response.json())
        .then(data => {
            try {
                data.items.forEach(item => {
                    if (!item.title) return;
                    // Create dropdown container
                    const dropdown = document.createElement('div');
                    dropdown.classList.add('dropdown');
                    // Create button
                    const button = document.createElement('button');
                    button.classList.add(item.subItems.length > 0 ? 'dropbtn' : 'button');
                    button.innerHTML = item.subItems.length > 0 ? `${item.title}<span class="dropdown-icon">&#9662;</span>` : '';
                    // Create dropdown content
                    if (item.subItems.length > 0) {
                        const dropdownContent = document.createElement('div');
                        dropdownContent.classList.add('dropdown-content');
                        item.subItems.forEach(subItem => {
                            const link = document.createElement('a');
                            link.href = '#';
                            link.textContent = subItem;
                            dropdownContent.appendChild(link);
                        });
                        dropdown.appendChild(dropdownContent);
                    } else {
                        const link = document.createElement('a');
                        link.href = '#';
                        link.textContent = item.title;
                        button.appendChild(link);
                    }
                    dropdown.appendChild(button);
                    sidebar.appendChild(dropdown);
                    // Add line separator
                    const hr = document.createElement('hr');
                    hr.classList.add('line');
                    sidebar.appendChild(hr);
                });
            } catch (err) {
                console.error(err.message);
            }
        })
        .catch(error => console.error('Error loading JSON:', error)),
        */
        // products rendering 
        /* fetch('inputs/products.json')
        .then(response => response.json())
        .then(data => {
            data.featuredProducts.forEach(product => {
                // Create product container
                const productContainerDiv = document.createElement('div');
                productContainerDiv.classList.add('product-container');

                // Create product
                const productDiv = document.createElement('div');
                productDiv.classList.add('product');

                // Create product link and image
                const productLink = document.createElement('a');
                productLink.href = product.link;
                const productImg = document.createElement('img');
                productImg.src = product.imageSrc;
                productImg.alt = product.name;
                productLink.appendChild(productImg);

                // Create features
                const featuresDiv = document.createElement('div');
                featuresDiv.classList.add('features');

                const productName = document.createElement('h5');
                productName.textContent = product.name;
                featuresDiv.appendChild(productName);

                // Create stars
                const starDiv = document.createElement('div');
                starDiv.classList.add('star');
                for (let i = 0; i < product.rating; i++) {
                    const starIcon = document.createElement('span');
                    starIcon.classList.add('star-icon');
                    starIcon.innerHTML = '&#9733;';
                    starDiv.appendChild(starIcon);
                }
                featuresDiv.appendChild(starDiv);

                // Create price
                const productPrice = document.createElement('h4');
                productPrice.textContent = product.price;
                featuresDiv.appendChild(productPrice);

                // Append features to product
                productDiv.appendChild(productLink);
                productDiv.appendChild(featuresDiv);

                // Append product to product container
                productContainerDiv.appendChild(productDiv);

                // Append product container to the main product list
                productContainer.appendChild(productContainerDiv);
            });

            // Handle dropdown and filter button interactions
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    content.style.display = content.style.display === 'block' ? 'none' : 'block';
                });
            });
        })
        .catch(error => console.error('Error loading JSON:', error)) */
    // ];
    // Execute all promises concurrently

    // Promise.all(fetchProducts)
    //     .then(() => {
    //         console.log('All products loaded successfully.');
    //     })
    //     .catch(error => {
    //         console.error('Error loading products:', error);
    //     });
});