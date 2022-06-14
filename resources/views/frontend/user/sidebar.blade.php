<div class="my-account-navigation mb-50">
    <ul>
        <li class="{{Request::is('user/dashboard*')? 'active': ''}}"><a href="{{route('user.dashboard')}}">Dashboard</a></li>
        <li class="{{Request::is('user/order*')? 'active': ''}}"><a href="{{route('user.order')}}">Orders</a></li>
        <li class="{{Request::is('user/address*')? 'active': ''}}"><a href="{{route('user.address')}}">Addresses</a></li>
        <li class="{{Request::is('user/account-details*')? 'active': ''}}"><a href="{{route('user.accountDetails')}}">Account Details</a></li>
        <li ><a href="login.html">Logout</a></li>
    </ul>
</div>