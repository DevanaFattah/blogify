<div class="navbar bg-primary text-white">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
        </label>
        <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
          <li><a>Item 1</a></li>
          <li tabindex="0">
            <a class="justify-between">
              Parent
              <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"/></svg>
            </a>
            <ul class="p-2">
              <li><a>Submenu 1</a></li>
              <li><a>Submenu 2</a></li>
            </ul>
          </li>
          <li><a>Item 3</a></li>
        </ul>
      </div>
      <a class="btn btn-ghost normal-case text-xl">Blogify</a>
    </div>
    <div class="navbar-center sm:hidden lg:flex">
      <ul class="menu menu-horizontal p-0">
        <li><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/posts">Post</a></li>
        <li><a href="/categories">Category</a></li>
      </ul>
    </div>
    <div class="navbar-end">
      @guest
      <a class="btn bg-white text-black hover:bg-blue-500 hover:text-white" href="/login">Login</a>
      @endguest 
      
      @auth  
      <a class="btn bg-white text-black hover:bg-blue-500 hover:text-white" href="/dashboard">Welcome Back, {{ auth()->user()->name }}</a>
      @endauth
    </div>
  </div>