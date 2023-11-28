Welcome to company dashboard!!! <br>
@if (
Auth::guard('company')->user()->logo == '' || 
Auth::guard('company')->user()->description == '' || 
Auth::guard('company')->user()->website == '' || 
Auth::guard('company')->user()->address == '' || 
Auth::guard('company')->user()->phone == '' || 
)


    {{ Auth::guard('company')->user()->name }} please update your profile. <br> 
    <a href="//" class="text-blue-600 ml-3 ">Update</a>
@else
    {{ Auth::guard('company')->user()->email }} welcome. <br>

@endif
    
