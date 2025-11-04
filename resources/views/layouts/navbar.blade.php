<nav class="navbar">  
    <ul class="nav-links">
        <li><a id="tambahtransaksi" style="background-color: aqua;" href="#">tambah teransaksi</a></li>  
    </ul> 
    
    <div class="items">
        <div class="profile-dropdown">
            <img class="profile-img" id="profile" src="{{ $authUser && $authUser->image ? asset('storage/' . $authUser->image->url) : asset('m/INTP.jpeg') }}" alt="Profile Image">
            <div class="dropdown-menu" id="dropdownmenu">
                <a href="{{ url('/profil') }}">Profile</a>
                <a href="#">Settings</a>
                <a href="{{ url('/logout') }}">Logout</a>
            </div>
        </div>
    </div>   
</nav>




<nav class="mobile-nav" id="mobile-nav">
    <ul class="nav-links-mobile">
    <li><a href="{{ url('/transaction') }}"><i class="fa-solid fa-house"></i></a></li>
    <li><a id="tambah-mobilee" href="{{ url('/transaction/create') }}"><i class="fa-solid fa-plus"></i></a></li>
    <li><a href="{{ url('/transaction/hasil') }}" ><i class="fa-solid fa-calculator"></i></a></li>  
    </ul>
</nav>