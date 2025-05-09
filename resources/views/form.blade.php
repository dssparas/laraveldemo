@include('header')
<form action="{{url('/')}}/register" method="post">
    @csrf
    <div class="container">
        <h1 class="test-center">Registration</h1>
        <div class="form-group">
            <label for="name">Name</label>
            <input class="border border-black" type="text" name="name" id="name" value="{{old('name')}}" class="form-control" />
            <span class="text-danger">
                @error('name')
                {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="border border-black" type="email" name="email" id="email" value="{{old('email')}}" class="form-control" />
            <span class="text-danger">
                @error('email')
                {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="dob">dob</label>
            <input class="border border-black" type="date" name="dob" id="dob" value="{{old('dob')}}" class="form-control" />
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <div class="col-md-6">
                <input class="border border-black" type="radio" name="gender" value="M" {{ old('gender') == 'M' ? 'checked' : '' }}> Male<br>
                <input class="border border-black" type="radio" name="gender" value="F" {{ old('gender') == 'F' ? 'checked' : '' }}> Female<br>              
                <input class="border border-black" type="radio" name="gender" value="O" 
                    {{ old('gender', 'O') == 'O' ? 'checked' : '' }}> Other<br> 
            </div>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input class="border border-black" type="text" name="address" id="address" value="{{old('address')}}" class="form-control" />
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input class="border border-black" type="text" name="country" id="country" value="{{old('country')}}" class="form-control" />
        </div>
        <div class="form-group">
            <label for="state">state</label>
            <input class="border border-black" type="text" name="state" id="state" value="{{old('state')}}" class="form-control" />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="border border-black" type="password" name="password" id="password" class="form-control" />
            <span class="text-danger">
                @error('password')
                {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input class="border border-black" type="password" name="password_confirmation" id="password_confirmation"  class="form-control" />
            <span class="text-danger">
                @error('password_confirmation')
                {{$message}}
                @enderror
            </span>
        </div>
        <button class="btn btn-primary">
            Submit
        </button>
    </div>
</form>
@include('footer')