  
@if (session('success'))  
<div style="z-index: 1000" id="pop" class="pop">
    <div class="pop-img">
        <img class="register-img" id="profile" src="https://i.pravatar.cc/300" alt="Profile Image">
    </div>
    <div class="pop-content">
        <h4>{{session('success')}}</h4>
    </div>
</div>
@endif

@if (session('status'))  
<div id="pop" style="z-index: 2000" class="pop">
    <div class="pop-img">
        <img class="register-img" id="profile" src="https://i.pravatar.cc/300" alt="Profile Image">
    </div>
    <div class="pop-content">
        <h4>{{session('status')}}</h4>
    </div>
</div>
@endif

@if (session('message'))  
<div id="pop" style="z-index: 10000" class="pop">
    <div class="pop-img">
        <img class="register-img" id="profile" src="https://i.pravatar.cc/300" alt="Profile Image">
    </div>
    <div class="pop-content">
        <h4>{{session('message')}}</h4>
    </div>
</div>
@endif

@if ($errors->any())
    <div id="pop" style="z-index: 10000" class="pop">
        <div class="pop-img">
            <img class="register-img" id="profile" src="https://i.pravatar.cc/300" alt="Profile Image">
        </div>
        <div class="pop-content">
            <h4>{{$errors->first()}}</h4>
        </div>
    </div>
@endif