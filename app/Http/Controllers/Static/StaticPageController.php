<?php

namespace App\Http\Controllers\Static;
use App\Http\Controllers\Controller;

class StaticPageController extends Controller
{
  
  public function analytics_dashboard()
  {
    $page_title = 'Analytics Dashboard';
    $page_description = 'Some description';
  
    $action = __FUNCTION__;

    return view('static.dashboard.analytics', compact(['page_title', 'page_description','action']));
  }

  public function ecommerce_dashboard()
  {
    $page_title = 'Ecommerce Dashboard';
    $page_description = 'Some description';
  
    $action = __FUNCTION__;
  
    return view('static.dashboard.ecommerce', compact('page_title', 'page_description','action'));
  }

  public function calendar()
  {
    $page_title = 'Calendar';
    $page_description = 'Some description';
  
    $action = __FUNCTION__;
  
    return view('static.calendar', compact('page_title', 'page_description','action'));
  }


  /////
  public function chat()
  {
    $page_title = 'Chat';
    $page_description = 'Some description';
  
    $action = __FUNCTION__;
  
    return view('chat', compact('page_title', 'page_description','action'));
  }

  public function kanban_board()
  {
    $page_title = 'Kanban Board';
    $page_description = 'Some description';
  
    $action = __FUNCTION__;
  
    return view('kanban-board', compact('page_title', 'page_description','action'));
  }


  public function ecommerce_add_product()
  {
    $page_title = 'Ecommerce - Add Product';
    $page_description = 'Some description';
  
    $action = __FUNCTION__;
  
    return view('ecommerce.add-product', compact('page_title', 'page_description','action'));
  }

  public function ecommmerce_checkout()
  {
    $page_title = 'Ecommerce - Checkout';
    $page_description = 'Some description';
  
    $action = __FUNCTION__;
  
    return view('ecommerce.checkout', compact('page_title', 'page_description','action'));
  }

  public function ecommmerce_invoice()
  {
    $page_title = 'Ecommerce - Invoice';
    $page_description = 'Some description';
  
    $action = __FUNCTION__;
  
    return view('ecommerce.invoice', compact('page_title', 'page_description','action'));
  }

  

  public function ecommmerce_customers()
  {
    $page_title = 'Ecommerce - Customers';
    $page_description = 'Some description';
  
    $action = __FUNCTION__;
  
    return view('ecommerce.customers', compact('page_title', 'page_description','action'));
  }

  public function ecommmerce_order_detail()
  {
    $page_title = 'Ecommerce - Order Detail';
    $page_description = 'Some description';
  
    $action = __FUNCTION__;
  
    return view('ecommerce.order-detail', compact('page_title', 'page_description','action'));
  }

  public function ecommmerce_orders()
  {
    $page_title = 'Ecommerce - Orders';
    $page_description = 'Some description';
  
    $action = __FUNCTION__;
  
    return view('ecommerce.orders', compact('page_title', 'page_description','action'));
  }

  public function ecommmerce_product_detail()
  {
    $page_title = 'Ecommerce - Product Detail';
    $page_description = 'Some description';
  
    $action = __FUNCTION__;
  
    return view('ecommerce.product-detail', compact('page_title', 'page_description','action'));
  }

  public function ecommmerce_products()
  {
    $page_title = 'Ecommerce - Products';
    $page_description = 'Some description';
  
    $action = __FUNCTION__;
  
    return view('ecommerce.products', compact('page_title', 'page_description','action'));
  }

  public function ecommmerce_shopping_cart()
  {
    $page_title = 'Ecommerce - Shopping Cart';
    $page_description = 'Some description';
  
    $action = __FUNCTION__;
  
    return view('ecommerce.shopping-cart', compact('page_title', 'page_description','action'));
  }
}