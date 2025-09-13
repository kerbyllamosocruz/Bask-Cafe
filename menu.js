document.addEventListener("DOMContentLoaded", function () {
  const menuItems = document.querySelectorAll(".menu_item");
  const categoryButtons = document.querySelectorAll(".category_button");
  const searchInput = document.querySelector(".search_input");

  function filterMenu(category) {
    menuItems.forEach((item) => {
      const itemCategory = item.querySelector(".menu_item_category").textContent;
      if (category === "All" || itemCategory === category) {
        item.style.display = "flex";
      } else {
        item.style.display = "none";
      }
    });
  }

  function searchMenu(searchTerm) {
    menuItems.forEach((item) => {
      const itemName = item.querySelector(".menu_item_name").textContent.toLowerCase();
      const itemCategory = item.querySelector(".menu_item_category").textContent.toLowerCase();
      if (itemName.includes(searchTerm) || itemCategory.includes(searchTerm)) {
        item.style.display = "flex";
      } else {
        item.style.display = "none";
      }
    });
  }

  function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  categoryButtons.forEach((button) => {
    button.addEventListener("click", function () {
      categoryButtons.forEach((btn) => btn.classList.remove("active"));
      this.classList.add("active");
      filterMenu(this.textContent);
    });
  });

  // Create debounced search function
  const debouncedSearch = debounce(function (e) {
    const searchTerm = e.target.value.toLowerCase();
    searchMenu(searchTerm);
    categoryButtons.forEach((btn) => {
      if (btn.textContent.trim() === "All") {
        btn.classList.add("active");
      } else {
        btn.classList.remove("active");
      }
    });
  }, 300);

  searchInput.addEventListener("input", debouncedSearch);

  const categoryDropdown = document.querySelector(".category_dropdown");
  if (categoryDropdown) {
    categoryDropdown.addEventListener("change", function () {
      filterMenu(this.options[this.selectedIndex].text);
    });
  }

  const modal = document.getElementById("menu_modal");
  const modalImg = document.getElementById("modal_img");
  const modalTitle = document.getElementById("modal_title");
  const modalDesc = document.getElementById("modal_desc");
  const modalPrice = document.getElementById("modal_price");
  const descriptions = {
        // Non coffee
        'strawberry milk': 'Strawberry Puree & Milk.',
        'matcha latte': 'Premium Matcha Ceremonial Grade, Sweetener & Milk.',
        'berry matcha': 'Premium Matcha Ceremonial Grade, Sweetener & Milk & Strawberry Puree.',
        'biscoff latte': 'Biscoff Sauce, Sweetener, Crushed Biscoff Biscuit & Milk.',
        'swiss chocolate': 'Dark Chocolate Mix, Cocoa & Splash of Milk.',
        'strawberry chocolate': 'Dark Chocolate Mix, Strawberry Puree & Splash of Milk.',
        'milo dinosaur': 'Milo Powder, Sweetener & Milk.',  
        'soda lemonade w/ yakult': 'Lemon Juice, Water, Soda Base & Yakult.',
        'lychee': 'Lychee Syrup, Nata & Soda Base.',
        'green apple': 'Green Apple Syrup, Nata & Soda Base.',
        'strawberry': 'Strawberry Syrup, Nata & Soda Base.',

        // Coffee
        'americano': 'Shots of Espresso & Water.',
        'sweet black': 'Shots of Espresso, Sweetener & Water.',
        'café latte': 'Shots of Espresso, Sweetener & Water.',
        'spanish latte': 'Shots of Espresso, Condensed & Milk.',
        'white chocolate mocha': 'Shots of Espresso, White Chocolate Sauce, Sweetener & Milk.',
        'french vanilla': 'Shots of Espresso, French Vanilla Syrup, Sweetener & Milk.',
        'hazelnut latte': 'Shots of Espresso, Hazelnut Syrup, Sweetener & Milk.',
        'dark mocha': 'Shots of Espresso, Dark Chocolate Sauce, Sweetener & Milk.',
        'caramel macchiato': 'Shots of Espresso, Caramel Sauce, Sweetener & Milk.',
        'dirty matcha': 'Shots of Espresso, Caramel Sauce, Sweetener & Milk.',
        'biscoff-ee latte': 'Shots of Espresso, Sweetener, Biscoff Sauce & Crushed Biscoff Biscuit.',

        // Sweet
        'coffee dream cake': 'Soft, chilled cake layered with coffee cream. Light but full of flavor.',
        'chocolate mousse': 'Creamy chocolate dessert that\'s rich, smooth, and not too heavy.',
        'blueberry cheesecake': 'Classic cheesecake topped with sweet blueberry filling. Creamy and fruity.',
        'swiss chocolate cake': 'Moist chocolate cake with a rich Swiss chocolate taste.',
        'classic croissant': 'Flaky, buttery croissant. Baked fresh and perfect with coffee.',
        'biscoff croissant': 'Classic croissant filled with Biscoff spread. Sweet, crunchy, and satisfying.',
        'nutella croissant': 'Croissant filled with gooey Nutella. A chocolatey, nutty treat.',
        'classic croffle': 'Crispy waffle-pressed croissant with light sugar glaze. Simple and buttery.',
        'just biscoff croffle': 'Croffle topped with Biscoff spread and crumbs. Sweet and crunchy.',
        'just nutella croffle': 'Croffle topped with Nutella—crisp outside, gooey inside.',
        'strawberry cloud croffle': 'Croffle topped with whipped cream and strawberries. Light, sweet, and fruity.',
        'nutella alcapone croffle': 'Croffle topped with Nutella, crushed almonds, and powdered sugar.',
        'biscoff craze croffle': 'Loaded with Biscoff spread, Biscoff crumbs, and more. For serious Biscoff lovers.',

        // Main
        'truffle pasta w/ chicken': 'Fettuccine Pasta w/ Truffle Sauce, Mushroom & Chicken Bites',
        'carbonara w/ bacon bits': 'Fettuccine Pasta w/ Carbonara Sauce, Mushroom & Bacon Bits.',
        'pesto pasta w/ chicken': 'Fettuccine Pasta w/ Pesto Sauce, Mushroom & Chicken Bites',
        'honey butter katsudon': 'Chicken Karaage served with 2 Rice & Fries and with honey butter dip.',
        'honey butter snow katsudon': 'Chicken Karaage served with 2 Rice & Fries, topped with honey butter snow.',
        'soy garlic katsudon': 'Chicken Karaage served with 2 Rice & Fries and with soy garlic dip.',
        'japanese teriyaki katsudon': 'Chicken Karaage served with 2 Rice & Fries and with japanese teriyaki dip.',
        'yangnyeom katsudon': 'Chicken Karaage served with 2 Rice & Fries and with yangnyeom dip.',
        'spicy chicken steak': 'inspired with Taiwanese Fried Chicken Steak served with 2 Rice & Fries, and Spicy Mayo',
        'beef tapa': 'Deep Fried Beef Tapa with Spicy Vinegar, served with 2 Rice & Fries',
        'boneless bangus': 'Marinated Boneless Bangus with Spicy Vinegar, served with 2 Rice & Fries',
        'longganisa': 'Home-made sweet longganisa from Marinduque w/ Spicy Vinegar, served with 2 Rice & Fries',
        'cheesy hungarian': 'Hungarian with Cheese & Pork Chunks inside, served with 2 Rice & Fries',
        // Savory
        'fries': 'Crispy and golden—classic comfort food.',
        'hashbrown': 'Golden-fried hashbrown, crispy on the outside, soft inside.'
    };

  document.querySelectorAll(".menu_item").forEach((item) => {
    item.addEventListener("click", function () {
      const img = item.querySelector("img");
      const name = item.querySelector(".menu_item_name").textContent.replace(/\s+/g, ' ').trim().toLowerCase();
      const price = item.querySelector(".menu_item_price").textContent;
      const desc = descriptions[name] || "";

      modalImg.src = img.src;
      modalImg.alt = img.alt;
      modalTitle.textContent = item.querySelector(".menu_item_name").textContent.replace(/\s+/g, ' ').trim();
      modalDesc.textContent = desc;
      modalPrice.textContent = price;
      modal.style.display = "flex";
    });
  });

  modal.onclick = function (e) {
    if (e.target === modal) modal.style.display = "none";
  };
});
