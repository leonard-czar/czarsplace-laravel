# Czar's Place - E-commerce Application

Czar's is a e-commerce web application that allows users to buy from a diverse selection of wristwatches. Users can search for specific 
brands and features, add them to shopping cart and then make payment using Paystack. App has login system functionality. The guest user is able to browse, search and products. Checkout and payment option is available for registerd users.

The application also come with an admin dashboard where administrators of the web app can view, add, edit, delete products.

## Application Objective

The purpose of the the project is to create a e-commerce app for everyone interested in shopping online. Layout is simple and clear. Project is accesible through all modern browsers on both desktop and mobile devices. For build the front-end functionality CSS, HTML, Jquery and JavaScript is used and for back-end logic, PHP with Laravel framework is used. As it's e-commerce app payments options is available by using Paystack API.

#### User Stories

- As a user I want easily search for product - it is achieved by using search bar available on menubar
- As a user I want to find more details about product - after click on selected product user is redirected to page with all details about chosen product
- As a user I want to add product to cart - user is able to add product to cart and select quantity if required (1 is default value)
- As a user I want to update / delete items from cart - user is able to update and delete items on cart page
- As a user I want to pay for chosen product - after registration/login user is able to access checkout page
-As a user I want to see all the items i have paid for and also see their payment status- after registration/login user is able to access my ordesr page
- As a business owner I want to expand my business and increase sales
  - it is achieved by building online presence

#### Application Layout

The layout is simple and consistent through all modern browsers. The project has been designed with a mobile first approach and it is fully responsive across devices. To achieve this Bootstrap 5 components library was used along with custom styles.
Project consist following pages:

- Products(homepage)
  - page where are displayed all products in form of card with image and short info about specs and price of each product
- Product Details
  - Page include all details about selected product - image, description, main components summary, price and add to cart button with input field allowing select product quantity
- Cart page / empty cart
  - Page allows to review what is in cart - Image thumbnail is displayed along with product name and possibility for user to change quantity or delete item completely.
    Page include total price for all product placed in cart. Below that there are two buttons, one placed on right hand side and second on the left hand side of the screen allowing user to continue shopping(left button) or go to checkout(right button). When we remove all items cart icon is displayed with short info that cart is empty and user can go back shopping by clicking _Continue Shopping_ button
- Search page / no search results
  - Page displays searching results in form similar to homepage. There is a card with image and short info about specs and price of each product.
    When keyword enter into searchbox isn't match any product, search icon is displayed along with text informing user that product is not found.
- Checkout page (available after user login)
  - This Page displays shipping address and alternative phone number options here user can specify where they want their product to be    delivered. After payment user is redirected to My account page.
-My orders page
  - User can see all the products they have purchased and their date, payment status etc.
- Login
  - Page allows user to login (user get access to checkout page and payment functionality)
- Registration
  - Page allows user to create an account (user get access to login functionality)


## Features

The app can be accessible with or without user registration, but in that case some features will be available after registration only (checkout,cart,my account).
Anyone is able to perform search, view results, all details about selected product.

### General Features

- search bar - allows user to search product by keyword. Return all products where search keywords appears
- login/register system - allows user access full app functionality
- logout
- customer support- user can reach out for enquires or complaint via whatsapp
- flash messages apperars after user login/registration, add/update/delete and purchase product 
- user can't access payment page without registration/login
- after adding product to cart small badge with product quantity appears on menubar beside cart icon
- paystack payment integration
- short product info cards on homepage
- function preventing access restricted page(checkout) without registration/login


#### Admin Features
- Login
-  View all product information
-  View all orders
-  Add, delete, and modify product information
- After every successful Add, Edit, delete confirmation message will be shown on corner of
the page.
-  Logout


## Technologies used

- **[GitHub](https://github.com/)** - provides hosting for software development version control using Git.
- **[Git](https://git-scm.com/)** - version-control system for tracking changes in source code during software development.
- **[Google Fonts](https://fonts.google.com/)** - library of free licensed fonts, an interactive web directory for browsing the library, and APIs for conveniently using the fonts via CSS ('Lato' font used in this project).
- **[PHP](https://www.php.net/)** - programming language.
- **[JavaScript](https://en.wikipedia.org/wiki/JavaScript)** - used to program the behavior of Web pages.
- **[jQuery](https://jquery.com)** - JavaScript library designed to simplify HTML DOM tree traversal and manipulation
- **[HTML5](https://en.wikipedia.org/wiki/HTML5)** - standard markup language for creating Web pages.
- **[CSS3](https://en.wikipedia.org/wiki/Cascading_Style_Sheets#CSS_3)** - used to define styles for Web pages, including the design, layout and variations in display for different devices and screen sizes.
- **[VS Code](https://code.visualstudio.com/)** - code editor redefined and optimized for building and debugging modern web and cloud applications.
- **[Bootstrap 5](https://getbootstrap.com/)** - free and open-source CSS framework directed at responsive, mobile-first front-end web development.
- **[Laravel](https://laravel.com/docs/9.x)** - Laravel is a free and open-source PHP-based web framework for building high-end web applications.
- **[Paystack](https://paystack.com/ie)** - a payment company that allows individuals and businesses to make and receive payments over the Internet

## Screen Shots
### Customer

*Login For Customer*

![log](/public/images/ReadMe/login.png)
<br>

*Sign Up For Customer*

![Signup](/public/images/ReadMe/register.png)
<br>

*Home Page For Customer*

![Home page](/public/images/ReadMe/homepage1.png)
<br>

![Home page](/public/images/ReadMe/homepage2.png)
<br>

*Product Information*

![Product info](/public/images/ReadMe/product-info.png)
<br>

*Cart For Customer*

![cart](/public/images/ReadMe/cart.png)
<br>

*Check Out page*

![Check Out](/public/images/ReadMe/checkout.png)
<br>

*Paystack payment gateway*

![Paystack Geteway](/public/images/ReadMe/paystack1.png)
<br>

![Paystack Geteway](/public/images/ReadMe/paystack2.png)
<br>
<br>

*Customer Profile*

![all orders](/public/images/ReadMe/myorders.png)


### Admin
*Login For Admin*

![login admin](/public/images/ReadMe/login.png)
<br>

*Admin Home*

![admin Dashboard/Home](/public/images/ReadMe/admin-dash.png)
<br>

*view Product For Admin*

![View all products](/public/images/ReadMe/view-product.png)
<br>

*Add Product For Admin*

![Add product](/public/images/ReadMe/add-product1.png)
<hr>
<br>

![Add product page](/public/images/ReadMe/add-product2.png)
<br>

*Order Status For Admin*

![View all orders](/public/images/ReadMe/view-orders.png)

<br>

*View all Brands For Admin*

![View all Brands](/public/images/ReadMe/view-brands.png)

<br>

*All User List*

![All user](/public/images/ReadMe/view-users.png)


