<div class="bottom-bar" id="bottom-bar">
  <a href="/product-slider">
      <ion-icon name="fast-food-outline" class="{{ Request::is('product-slider') ? 'icons actives' : 'icons' }}" onclick="change(this)"></ion-icon>
  </a>
  <a href="/stores">
      <ion-icon name="storefront-outline" class="{{ Request::is('stores') ? 'icons actives' : 'icons' }}" onclick="change(this)"></ion-icon>
  </a>
  <a href="/home">
      <ion-icon name="home-outline" class="{{ Request::is('home') ? 'icons actives' : 'icons' }}" onclick="change(this)"></ion-icon>
  </a>
  <a href="/categories">
      <ion-icon name="restaurant-outline" class="{{ Request::is('categories') ? 'icons actives' : 'icons' }}" onclick="change(this)"></ion-icon>
  </a>
  <a href="#">
    <ion-icon name="chevron-back-outline" class="icons" onclick="window.history.back()"></ion-icon>
  </a>
</div>
