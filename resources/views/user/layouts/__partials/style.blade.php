<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('fontawesome-free-5.15.3-web/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}"/>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Rubik", sans-serif;
        font-style: normal;
        font-weight: 400;
    }
    body {
        background-color: #f0f0f0;
    }
    .header {
        background-color: #252525;
        height: 50px;
        line-height: 50px;
    }
    input[type="text"] {
        width: 500px;
        height: 40px;
    }
    .button-search {
        margin-left: -5px;
        margin-top: -5px;
    }
    .main {
        padding: 0px 130px;
    }
    .category:hover {
        background-color: #fff;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .category-logo {
        border-radius: 50%;
        width: 100px;
        height: 100px;
    }
    .filter-price, .sort {
        color: #288ad6;
        margin-left: 50px;
    }
    .card-text {
        background-color: #f8f9fa;
        padding: 10px 5px;
    }
    .footer__info {
        width: 100px;
        height: 2px;
        background-color: red;
    }
    a {
        text-decoration: none;
        color: #000;
    }
    a:hover {
        text-decoration: none;
    }
    ul{
        list-style: none;
    }
    ::placeholder {
        padding-left: 10px;
    }
    .user-info {
        background-color: #fff;
        margin: 50px 150px;
        padding: 40px;
    }
    .carts {
        background-color: #fff;
        margin: 50px 145px 50px 115px;
        padding: 30px;
    }
    .carts h3 {
        color: #fff;
        background-color: #243a76;
        text-transform: uppercase;
        padding: 20px;
        text-align: center;
        margin-bottom: 50px;
    }
    ul>li.star>i.fas {
        font-size:2em;
        color:#ccc;
    }
    ul>li.star.hover>i.fas {
        color:#FFCC36;
    }
    ul>li.star.selected>i.fas {
        color:#FF912C;
    }
    .progress {
        height: 10px;
        margin-top: -16px;
        margin-left: 40px;
    }
    .stars {
        position: relative;
        height: 30px;
        line-height: 30px;
    }
    li.stars i.fas {
        color:#FFCC36;
    }
    .qty_user {
        position: absolute;
        top:0px;
        right: 10px;
    }
    .qty_user_final {
        position: absolute;
        bottom: 0px;
        right: 10px;
    }
    h5.title {
        background-color: #FFCC36;
        width: 250px;
        padding: 10px;
        transform: skew(-20deg);
    }
    .item {
        padding: 0px 50px;
    }
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }
    #qty-product {
        width: 50px;
        height: 30px;
    }
    .qty-btn {
        border: 1px solid black;
    }
    .cart-summary {
        max-width: 410px;
        width: 100%;
        margin-left: auto;
    }
    .cart-summary .cart-summary-wrap {
        background-color: #ddd;
        padding: 45px 50px;
        margin-bottom: 20px;
    }
    .cart-summary .cart-summary-wrap h4 {
        font-size: 20px;
        line-height: 23px;
        text-decoration: underline;
        text-transform: capitalize;
        font-weight: 700;
        margin-bottom: 30px;
    }
    .cart-summary .cart-summary-wrap p {
        font-size: 14px;
        font-weight: 500;
        line-height: 23px;
        color: #222222;
    }
    .cart-summary .cart-summary-wrap p span {
        float: right;
    }
    .breadcrumb-area .breadcrumb-container {
        border-bottom: 1px solid #dddddd;
        padding: 20px 0;
    }
    .breadcrumb-area .breadcrumb-container ul {
        list-style: outside none none;
        margin: 0;
        padding: 0;
    }
    .breadcrumb-area .breadcrumb-container ul li {
        display: inline-block;
        padding-right: 60px;
        position: relative;
        font-size: 15px;
        line-height: 25px;
    }
    .login-form {
        background-color: #ffffff;
        padding: 30px;
        -webkit-box-shadow: 0px 5px 4px 0px rgb(0 0 0 / 10%);
        box-shadow: 0px 5px 4px 0px rgb(0 0 0 / 10%);
    }
    .login-title {
        font-size: 20px;
        line-height: 23px;
        text-decoration: underline;
        text-transform: capitalize;
        font-weight: 700;
        margin-bottom: 30px;
    }
    .login-form .row {
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
    .mb-20 {
        margin-bottom: 20px!important;
    }
    .register-button {
        display: block;
        margin-top: 40px;
        width: 140px;
        height: 36px;
        border: none;
        line-height: 24px;
        padding: 6px 20px;
        float: left;
        font-weight: 400;
        color: #ffffff;
        border-radius: 50px;
        outline: none;
    }
    .login-form input {
        width: 100%;
        background-color: transparent;
        border: 1px solid #999999;
        line-height: 23px;
        padding: 10px 20px;
        font-size: 14px;
        color: #666666;
        margin-bottom: 15px;
        outline: none;
        border-radius: 50px;
    }
    .breadcrumb-area .breadcrumb-container ul li.active {
        color: #80bb01;
    }
    .row-40 {
        margin-left: -40px;
        margin-right: -40px;
    }
    .row-40>[class*=col] {
        padding-left: 40px;
        padding-right: 40px;
    }
    .mb-40 {
        margin-bottom: 40px!important;
    }
    .checkout-title {
        font-size: 20px;
        line-height: 23px;
        text-decoration: underline;
        text-transform: capitalize;
        font-weight: 700;
        margin-bottom: 30px;
    }
    .modal-body {
        position: relative;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1rem;
    }
    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
    .mb-30 {
        margin-bottom: 30px!important;
    }
    .account-details-form input {
        display: block;
        width: 100%;
        border: 1px solid #ebebeb;
        border-radius: 50px;
        line-height: 24px;
        padding: 11px 25px;
        color: #656565;
        outline: none;
    }
    .mb-60 {
        margin-bottom: 60px!important;
    }
    .checkout-cart-total {
        padding: 45px;
    }
    .checkout-cart-total h4 {
        -ms-flex-preferred-size: 18px;
        flex-basis: 18px;
        line-height: 23px;
        font-weight: 700;
    }
    .checkout-cart-total h4:first-child {
        margin-top: 0;
        margin-bottom: 25px;
    }
    /* .checkout-cart-total ul {
        border-bottom: 1px solid #999999;
    } */
    .checkout-cart-total ul li {
        color: #666666;
        font-size: 14px;
        line-height: 23px;
        font-weight: 500;
        display: block;
        margin-bottom: 16px;
    }
    .checkout-cart-total p {
        font-size: 14px;
        line-height: 30px;
        font-weight: 600;
        color: #505050;
        padding: 10px 0;
        border-bottom: 1px solid #999999;
        margin: 0;
    }
    .checkout-cart-total h4:last-child {
        margin-top: 15px;
        margin-bottom: 0;
    }
    .place-order {
        margin-top: 40px;
        width: 140px;
        border-radius: 50px;
        height: 36px;
        border: none;
        line-height: 24px;
        padding: 6px 20px;
        float: left;
        font-weight: 400;
        color: #ffffff;
        background-color: #80bb01;
    }
    .fa-shopping-cart > small{
        background-color: red;
        border: 1px solid black;
        border-radius: 50%;
        width: 15px;
        height: 15px;
        text-align: center;
        padding: 2px;
        position: absolute;
        top: 10px;
        right: 200px;
    }
    .swiper-slide {
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .swiper-button-prev,.swiper-button-next {
        
    }
    .active_price {
        background-color: rgb(241, 43, 43);
        padding: 5px;
    }
</style>