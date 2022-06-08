<form class="form-inline mt-2 mt-md-0">
    <input 
    name= "search" 
    class="form-control mr-sm-2" 
    type="text" 
    placeholder="Search by Name" 
    value="{{ request()->input('search') }}" 
    aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>